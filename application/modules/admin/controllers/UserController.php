<?php

class Admin_UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
    }

    public function indexAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL . 'admin/index/login');
        }
    }

    public function addUserAction() {
        // action body
        $addForm = new Admin_Form_AddUserForm();
        $this->view->addForm = $addForm;
    }

    public function editUserAction() {
        // action body
        $EditForm = new Admin_Form_EditUserForm();
        $UserId = $this->_getParam('user-id');

        $userModel = new Admin_Model_TblUser();
        $EditInfo = $userModel->GetUserById($UserId);

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($EditForm->isValid($formData)) {
                $formValues = $EditInfo->getValues();
                $editdata = $userModel->EditUser($UserId, $formValues);
                if ($editdata) {
                    
                } else {
                    
                }
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

}

