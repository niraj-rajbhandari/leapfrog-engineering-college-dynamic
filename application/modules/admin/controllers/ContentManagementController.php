<?php

class Admin_ContentManagementController extends Zend_Controller_Action {

    private $postModel;

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
            $adapter->setDestination($_SERVER['DOCUMENT_ROOT'] . '/img/uploads')
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
                $postInfo = $this->getRequest()->getParams();
                $postInfo['post_image'] = $files['post_image']['name'];
                $postInfo['user_id'] = $UserId;
               
                $bool = $this->postModel->AddPost($postInfo);
                if ($bool) {
                    echo"hello";
                    exit;
                    //success
                    //redirect to post list
                } else {
                    //display error
                }
            } else {
                echo "error";
                exit;
            }
        }
    }

    public function editPostAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        $UserId = $auth->getIdentity()->id;
        $PostId = $this->_getParam('post-id');
        $postForm = new Admin_Form_AddPost();
        if ($this->getRequest()->isPost()) {
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination($_SERVER['DOCUMENT_ROOT'] . '/img/uploads')
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
                $postInfo = $this->getRequest()->getParams();
                $postInfo['post_image'] = $files['post_image']['name'];
                $postInfo['user_id'] = $UserId;

                $bool = $this->postModel->EditPost($PostId, $postInfo);
                if ($bool) {
                    echo"hello";
                    exit;
                    //success
                    //redirect to post list
                } else {
                    echo "db_error";
                    exit;
                    //display error
                }
            } else {
                echo "error";
                exit;
            }
        }

        $postValues = $this->postModel->GetPostById($PostId);

        $postForm->populate($postValues);
        $this->view->postForm = $postForm;
    }

    public function deletePostAction() {
        // action body
        $PostId = $this->_getParam('post-id');
        $bool = $this->postModel->DeletePost($PostId);
        if ($bool) {
            //success
            //redirect to post list
        } else {
            //display error
        }
    }

    public function postListAction() {
        // action body
        $postList = $this->postModel->ListPost();
        $this->view->postList = $postList;
    }
    
    //naresh
    
    
    //sudip
    
    
    //niraj

}

