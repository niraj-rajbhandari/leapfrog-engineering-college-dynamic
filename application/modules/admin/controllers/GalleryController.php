<?php

class Admin_GalleryController extends Zend_Controller_Action {

    private $albumModel = null;
    private $galleryModel = null;
    private $Alabum_id=null;
    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
        $this->albumModel = new Admin_Model_Album();
        $this->galleryModel = new Admin_Model_Gallery();
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL . 'admin/index/login');
        }
    }

    public function indexAction() {
        // action body
        $albumList=  $this->albumModel->listAlbum();
        $this->view->albumlist=$albumList;

    }

    public function addAlbumAction() {


        if ($this->getRequest()->isPost()) {
            $value = $this->getRequest()->getParams();
            $albumInfo['album_name'] = $value['album_name'];

            $check = $this->albumModel->addAlbum($albumInfo);
            if ($check == 1) {
                $this->_helper->flashMessenger->clearMessages();
                $this->_helper->flashMessenger->addMessage('album added');
//                    #$this->_redirect('/index/user-data');
                $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
            } else {
                $this->_helper->flashMessenger->clearMessages();
                $this->_helper->flashMessenger->addMessage('error occured please try again!!');
                $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
            }
            $this->_redirect(BASE_URL . 'admin/gallery');
        }
        
    }

    public function editAlbumAction() {
        $albumId = $this->_getParam('album-id');
        $albumValues = $this->albumModel->getAlbumById($albumId);
        $this->view->albumValues = $albumValues;

        if ($this->getRequest()->isPost()) {
            $value = $this->getRequest()->getParams();
            $albumInfo['album-id'] = $value['album-id'];
            $albumInfo['album_name'] = $value['album_name'];
            $check = $this->albumModel->editAlbum($albumInfo);

            if ($check == 1) {
                $this->_helper->flashMessenger->clearMessages();
                $this->_helper->flashMessenger->addMessage('album updated :)');
                $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
            } else {
                $this->_helper->flashMessenger->clearMessages();
                $this->_helper->flashMessenger->addMessage('error occured please try again!!');
                $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
            }


//           echo '<pre>';
//           print_r($albumInfo);
//           exit;
        
            $this->_redirect(BASE_URL . 'admin/gallery');
            }
        
    }

    public function deleteAlbumAction() {
        $albumId = $this->_getParam('album-id');
        $image_list=$this->galleryModel->listImage($albumId);
        foreach ($image_list as  $value) {
            
            //echo $value['name'].'<br/>';
            unlink(BASE_PATH.'img/uploads/'.$value['name']);
        }
        
        $check = $this->albumModel->deleteAlbum($albumId);
        
//        if ($check == 1) {
//            $this->_helper->flashMessenger->clearMessages();
//            $this->_helper->flashMessenger->addMessage('album deleted');
////                    #$this->_redirect('/index/user-data');
//            $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
//        } else {
//            $this->_helper->flashMessenger->clearMessages();
//            $this->_helper->flashMessenger->addMessage('error occured please try again!!');
//            $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
//        }
        $this->_redirect(BASE_URL . 'admin/gallery');
    }

    public function listPhotosAction() {
        // action body
        $Alabum_id = $this->_getParam('album-id');
        
        $photoList = $this->galleryModel->listImage($Alabum_id);
        $this->view->imageList = $photoList;
        if ($this->getRequest()->isPost()) {
            
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->setDestination($_SERVER['DOCUMENT_ROOT'] . '/img/uploads')
                    ->addValidator('Extension', false, 'jpg,jpeg,png,gif,bmp,ico')
                    ->addValidator('Size', FALSE, 512000)
                    ->addValidator('Count', false, 1);


            $upload = new Zend_File_Transfer();
            $files = $upload->getFileInfo();
//            echo '<pre>';
//            print_r($files);
//            exit;

            if ($adapter->isValid())
            {
                
                if($adapter->receive()) {
                   
                $date = date("Y-m-d H:i:s");
                $value = $this->getRequest()->getParams();
               
                $photoInfo['album_id'] = $Alabum_id;
                $photoInfo['image_caption'] = $value['photo_caption'];
                $photoInfo['created_date'] = $date;
                $photoInfo['name'] = $files['post_image']['name'];
//                echo '<pre>';
//                print_r($photoInfo);
//                exit;
                $check = $this->galleryModel->addImage($photoInfo);

                if ($check) {
//                    $this->_helper->flashMessenger->clearMessages();
//                    $this->_helper->flashMessenger->addMessage('photo added');
////                    #$this->_redirect('/index/user-data');
//                    $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
                    $this->_redirect(BASE_URL . 'admin/gallery/list-photos/album-id/'.$Alabum_id);
                } 
                }
                }
                
            }
            
        }
    

    public function editPhotosAction() {
        // action body
        $image_id=  $this->_getParam('id');
        
        $details= $this->galleryModel->getImageById($image_id);
        $album_id=$details['album_id'];
        
        $this->view->image_details=$details;
        if ($this->getRequest()->isPost()) {
            $postData = $this->getRequest()->getParams();
            
            $posted = ($postData['active'] == 'Yes') ? 1 : 0;
            $image_info['image_caption']=$postData['caption'];
            $image_info['post']=$posted;
            $check=  $this->galleryModel->editImage($image_info,$image_id);
            if($check)
                 $this->_redirect(BASE_URL . 'admin/gallery/list-photos/album-id/'.$album_id);
            else {
                    echo 'error';
                }
        }
//        echo '<pre>';
//        print_r($details);
//        exit;
    }

    public function deletePhotosAction() {
        // action body
        $image_id=  $this->_getParam('id');
        
        $details= $this->galleryModel->getImageById($image_id);
        $album_id=$details['album_id'];
        $check=  $this->galleryModel->deleteImage($image_id);
        if($check)
        {
            unlink(BASE_PATH.'img/uploads/'.$details['name']);    
            $this->_redirect(BASE_URL . 'admin/gallery/list-photos/album-id/'.$album_id);
        }
                 else {
                    echo 'error';
                }
    }

}

