<?php

class Admin_ContentManagementController extends Zend_Controller_Action {

    private $postModel = null;

    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
        $this->postModel = new Admin_Model_Post();
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL . 'admin/index/login');
        }
    }

    public function indexAction() {
        // action body
    }

    public function addPostAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        $UserId = $auth->getIdentity()->id;
        if ($this->getRequest()->isPost()) {
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination(BASE_PATH. 'img/uploads')
                    ->addValidator('Extension', false, 'jpg,jpeg,png,gif,bmp,ico')
                    ->addValidator('Size', FALSE, 512000)
                    ->addValidator('Count', false, 1);


            // Returns all known internal file information
            $upload = new Zend_File_Transfer();
            $files = $upload->getFileInfo();

            //set filters and validators for Zend_Filter_Input
            $filters = array(
                'post_title' => array('StripTags', 'StringTrim')
            );

            $validators = array(
                'post_title' => array('NotEmpty'),
                'post_body' => array('NotEmpty')
            );

            //assign Input
            $input = new Zend_Filter_Input($filters, $validators);
            $input->setData($this->getRequest()->getParams());

            if ($adapter->receive() && $adapter->isValid() && $input->isValid()) {
                $postData = $this->getRequest()->getParams();
                $active = ($postData['active'] == 'Yes') ? 1 : 0;

                $postInfo['post_title'] = $postData['post_title'];
                $postInfo['post_type'] = $postData['post_type'];
                $postInfo['post_image'] = $files['post_image']['name'];
                $postInfo['post_body'] = $postData['post_body'];
                $postInfo['user_id'] = $UserId;
                $postInfo['active'] = $active;


                $bool = $this->postModel->AddPost($postInfo);
                if ($bool) {
                    //success
                    //redirect to post list
                    $msg = "Post was successfully added";
                    $this->_redirect(BASE_URL . 'admin/content-management/post-list');
                } else {
                    //display error
                    $msg = "Post could not be added. Please try again";
                }
            }
        }
    }

    public function editPostAction() {
        // action body
        //get authentic user id
        $auth = Zend_Auth::getInstance();
        $UserId = $auth->getIdentity()->id;

        //get post id from the url
        $PostId = $this->_getParam('post-id');

        if ($this->getRequest()->isPost()) {
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination(BASE_PATH. 'img/uploads')
                    ->addValidator('Extension', false, 'jpg,jpeg,png,gif,bmp,ico')
                    ->addValidator('Size', FALSE, 512000)
                    ->addValidator('Count', false, 1);


            // Returns all known internal file information
            $upload = new Zend_File_Transfer();
            $files = $upload->getFileInfo();

            //check validation if post image is edited
            $imageReceive = TRUE;
            if ($files['post_image']['error'] != 4) {
                if (!$adapter->receive() && !$adapter->isValid()) {
                    $imageReceive = FALSE;
                }
            }
            //set filters and validators for Zend_Filter_Input
            $filters = array(
                'post_title' => array('StripTags', 'StringTrim')
            );

            $validators = array(
                'post_title' => array('NotEmpty'),
                'post_body' => array('NotEmpty')
            );
            

            //assign Input
            $input = new Zend_Filter_Input($filters, $validators);
            $input->setData($this->getRequest()->getParams());

            if ($imageReceive && $input->isValid()) {
                $postData = $this->getRequest()->getParams();

                $active = ($postData['active'] == 'Yes') ? 1 : 0;

                $postInfo['post_title'] = $postData['post_title'];
                $postInfo['post_type'] = $postData['post_type'];
                if ($files['post_image']['error'] != 4) {
                   
                    //delete the old image if image is edited
                    $postImage=$this->postModel->GetPostById($PostId);
                    unlink(BASE_PATH.'img/uploads/'.$postImage['post_image']);
                    //----------------------------------------------------------
                    
                    $postInfo['post_image'] = $files['post_image']['name'];
                }
                $postInfo['post_body'] = $postData['post_body'];
                $postInfo['user_id'] = $UserId;
                $postInfo['active'] = $active;

                $bool = $this->postModel->EditPost($PostId, $postInfo);
                if ($bool) {
                    //success
                    $msg = "Post was successfully edited";
                    $this->_redirect(BASE_URL . 'admin/content-management/post-list');
                } else {
                    //display error
                    $msg = "Post could not be edited. Try Again";
                }
            }
        }
        $postValues = $this->postModel->GetPostById($PostId);
        $this->view->postValues = $postValues;
    }

    public function deletePostAction() {
        // action body
        $PostId = $this->_getParam('post-id');
        $postInfo=$this->postModel->GetPostById($PostId);
        
        $bool = $this->postModel->DeletePost($PostId);
        if ($bool) {
            //success
            $msg = "successfuly deleted";
            //remove image of the post being deleted
            unlink(BASE_PATH.'img/uploads/'.$postInfo['post_image']);
            //redirect to post list
            $this->_redirect(BASE_URL . 'admin/content-management/post-list');
        } else {
            //display error
            $msg = "The post could not be deleted. Please try again";
        }
    }

    public function postListAction() {
        // action body
        //pagination
        
        //------------------------------------------
        $postList = $this->postModel->ListPost();
        $this->view->postList = $postList;
    }

    public function updatePublishPostAction() {
        // action body
        print_r($this->getRequest()->getPost());
        exit;
    }

}

