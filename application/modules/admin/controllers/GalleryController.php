<?php

class Admin_GalleryController extends Zend_Controller_Action
{

    private $albumModel = null;

    private $galleryModel = null;

    public function init()
    {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
        $this->albumModel = new Admin_Model_Album();
        $this->galleryModel=new Admin_Model_Gallery();
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL . 'admin/index/login');
        }
        
    }

    public function indexAction()
    {
        // action body
        $albumList=  $this->albumModel->listAlbum();
        $this->view->albumlist=$albumList;

    }

    public function addAlbumAction()
    {
        
                
       if ($this->getRequest()->isPost()) {
           $value=$this->getRequest()->getParams();
           $albumInfo['album_name']=$value['album_name'];
           
           $check= $this->albumModel->addAlbum($albumInfo);
           if($check==1){
            $this->_helper->flashMessenger->clearMessages();
               $this->_helper->flashMessenger->addMessage('album added');
//                    #$this->_redirect('/index/user-data');
                   $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
           }
           else{
               $this->_helper->flashMessenger->clearMessages();
               $this->_helper->flashMessenger->addMessage('error occured please try again!!');
               $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
               
           }   
           
       
    
    
    }
    }
    public function editAlbumAction()
    {
        $albumId = $this->_getParam('album-id');
        $albumValues = $this->albumModel->getAlbumById($albumId);
        $this->view->albumValues = $albumValues;
        
       if ($this->getRequest()->isPost()) {
           $value=$this->getRequest()->getParams();
           $albumInfo['album-id']=$value['album-id'];
           $albumInfo['album_name']=$value['album_name'];
           $check=$this->albumModel->editAlbum($albumInfo);
           
           if($check==1){
               $this->_helper->flashMessenger->clearMessages();
                $this->_helper->flashMessenger->addMessage('album updated :)');
                $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
           }
           else{
               $this->_helper->flashMessenger->clearMessages();
               $this->_helper->flashMessenger->addMessage('error occured please try again!!');
               $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
               
           }
          
           
//           echo '<pre>';
//           print_r($albumInfo);
//           exit;
       }
        
    }

    public function deleteAlbumAction()
    {
        $albumId = $this->_getParam('album-id');
        $check= $this->albumModel->deleteAlbum($albumId);
        if($check==1){
            $this->_helper->flashMessenger->clearMessages();
               $this->_helper->flashMessenger->addMessage('album deleted');
//                    #$this->_redirect('/index/user-data');
                   $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
           }
           else{
               $this->_helper->flashMessenger->clearMessages();
               $this->_helper->flashMessenger->addMessage('error occured please try again!!');
               $this->view->messages = $this->_helper->flashMessenger->getCurrentMessages();
               
           }    
    }

    public function listPhotosAction()
    {
        // action body
    }

    public function editPhotosAction()
    {
        // action body
    }

    public function deletePhotosAction()
    {
        // action body
    }


}













