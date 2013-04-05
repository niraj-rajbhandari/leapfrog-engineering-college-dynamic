<?php

class Admin_UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL . 'admin/index/login');
        }
    }

    public function indexAction() {
        // action body
    }

    public function addUserAction() {
        // action body
        $addForm = new Admin_Form_AddUserForm();
        $objData = new Admin_Model_TblUser();
        $this->view->addForm = $addForm;

        if ($this->getRequest()->isPost()) {
            if ($addForm->isValid($this->getRequest()->getPost())) {
                $userInfo = $addForm->getValues();

                $request = $objData->AddUser($userInfo);

                if ($request) {
                    $this->_helper->flashMessenger->addMessage('sucessfully inserted');
                    $this->view->message = $this->_helper->flashMessenger->getMessages();
                } else {
                    echo 'you have done mistake!!';
                }
            }
        }
    }

    public function editUserAction() {
        // action body
        $EditForm = new Admin_Form_EditUserForm();
        $auth = Zend_Auth::getInstance();
        $UserId = $auth->getIdentity()->id;


        $userModel = new Admin_Model_TblUser();
        $EditInfo = $userModel->GetUserById($UserId);
        $this->view->editInfo = $EditInfo;
        if ($this->getRequest()->isPost()) {
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination($_SERVER['DOCUMENT_ROOT'] . '/img/uploads')
                    ->addValidator('Extension', false, 'jpg,jpeg,png,gif,bmp,ico')
                    ->addValidator('Size', FALSE, 512000)
                    ->addValidator('Count', false, 1);


            // Returns all known internal file information
            $upload = new Zend_File_Transfer();
            $files = $upload->getFileInfo();
          
            //check validation if post image is edited
            $imageReceive = TRUE;
            if ($files['file']['error'] != 4) {
                if (!$adapter->receive() && !$adapter->isValid()) {
                    $imageReceive = FALSE;
                }
            }

            //set filters and validators for Zend_Filter_Input
            $filters = array(
                'first_name' => array('StripTags', 'StringTrim'),
                'middle_name' => array('StripTags', 'StringTrim'),
                'last_name' => array('StripTags', 'StringTrim'),
                'address' => array('StripTags', 'StringTrim'),
                'email' => array('StripTags', 'StringTrim'),
                'phone' => array('StripTags', 'StringTrim'),
                
            );

            $validators = array(
                'first_name' => array('NotEmpty'),
                'last_name' => array('NotEmpty'),
                'address' => array('NotEmpty'),
                'email' => array('NotEmpty','EmailAddress'),
                'phone'=>array('NotEmpty','Digits')
            );

            //assign Input
            $input = new Zend_Filter_Input($filters, $validators);
            $input->setData($this->getRequest()->getParams());
            

            if ($imageReceive && $input->isValid()) {
                $postData = $this->getRequest()->getParams();
                $editData['first_name']=$postData['first_name'];
                $editData['middle_name']=$postData['middle_name'];
                $editData['last_name']=$postData['last_name'];
                $editData['address']=$postData['address'];
                $editData['phone']=$postData['phone'];
                $editData['email']=$postData['email'];
                $editData['image_name']=$files['file']['name'];
                
                $bool = $userModel->EditUser($UserId, $editData);
                if ($bool) {
                    echo "successfully edited";
                    exit;
                } else {
                    echo "cannot edit ";
                    exit;
                }
            }
            else{
                echo "error";
                exit;
            }
        }

        $EditForm->populate($EditInfo);
        $this->view->editForm = $EditForm;
    }

    public function userListAction() {
        // action body
        $userModel = new Admin_Model_TblUser();
        $userList = $userModel->GetUser();
        $this->view->UserList = $userList;
    }

    public function profileAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity()->id;
        $userModel = new Admin_Model_TblUser();
        $userProfile = $userModel->GetUserById($userId);
//        echo '<pre>';
//        print_r($userProfile)
//        exit();
        $this->view->Userprofile = $userProfile;
    }

    public function changePasswordAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity()->id;
        $userModel = new Admin_Model_TblUser();
        if ($this->getRequest()->isPost()) {
            $passwordForm = $this->getRequest()->getParams();
            $oldPassword = md5($passwordForm['old_password']);
            $newPassword = md5($passwordForm['new_password']);
            $count = $userModel->CheckPassword($userId, $oldPassword);
            if ($count != 0) {
                $bool = $userModel->ChangePassword($userId, $newPassword);
                if ($bool) {
                    $msg = "password has been successfully updated";
                } else {
                    $msg = "password could not be changed. Please try again";
                }
            } else {
                $msg = "incorrect password. Please enter a correct old password";
            }
        }


        //$this->view->ChangePassword = $userPassword;
    }

}

