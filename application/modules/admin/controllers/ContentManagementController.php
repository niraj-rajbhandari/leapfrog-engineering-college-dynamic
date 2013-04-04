<?php

class Admin_ContentManagementController extends Zend_Controller_Action {

    private $postModel;

    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
        $this->postModel = new Admin_Model_Post();
        $session = new Zend_Session_Namespace('Zend_Auth');
        if(!isset($session->id))
        {
            $this->_redirect(BASE_URL.'admin/index/login');
        }
    }

    public function indexAction() {
        // action body
    }

    public function addPostAction() {
        // action body
        if ($this->getRequest()->isPost()) {
           

            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination($_SERVER['DOCUMENT_ROOT'] . '/img/uploads');
            
            // Returns all known internal file information
            $upload = new Zend_File_Transfer();
            $files = $upload->getFileInfo();

            if ($adapter->receive()) {
                $postInfo = $this->getRequest()->getParams();
                $postInfo['post_image']=$files['post_image']['name'];
                
                $bool = $this->postModel->AddPost($postInfo);
                if ($bool) {
                    echo"hello";
                    //success
                    //redirect to post list
                } else {
                    //display error
                }
            }
        }
       
    }

    public function editPostAction() {
        // action body
        $PostId = $this->_getParam('post-id');
        $postForm = new Admin_Form_AddPost();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if (($postForm->isValid($formData)) && $postForm->post_image->receive()) {
                $postInfo = $postForm->getValues();
                echo "<pre>";
                print_r($postInfo);
                exit;
                $bool = $this->postModel->EditPost($PostId, $postInfo);
                if ($bool) {
                    //success
                    //redirect to post list
                } else {
                    //display error
                }
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

}

