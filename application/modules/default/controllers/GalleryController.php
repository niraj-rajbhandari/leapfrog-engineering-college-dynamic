<?php

class Default_GalleryController extends Zend_Controller_Action
{

    private $albumModel = null;

    private $galleryModel = null;
    private $post;

    

    public function init()
    {
        $this->albumModel = new Default_Model_Album();
        $this->galleryModel = new Default_Model_Gallery();
        $this->post=new Default_Model_Post();
        
    }

    public function indexAction()
    {
        // action body
        $ids=array();
        $images=array();
        $i=0;
        $album_list=  $this->albumModel->listAlbum();
        $newsSidebar=$this->post->getSidebar('news');
        $academicSidebar=$this->post->getSidebar('academic');
        $contact=$this->post->getSidebar('contact');
        
        $this->view->newsSidebar=$newsSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->album_list=$album_list;
        $this->view->contact=$contact;
       foreach ($album_list as $value) {
            $ids[$i]=$value['id'];
            $images[$i]=  $this->galleryModel->listImage($ids[$i]);
            $i++;
        }

        $this->view->images=$images;
        $this->view->album=$ids;
    }

    public function listimagesAction()
    {
        // action body
        $album_id = $this->_getParam('album-id');
        
        $photoList = $this->galleryModel->listImage($album_id);
        $newsSidebar=$this->post->getSidebar('news');
        $academicSidebar=$this->post->getSidebar('academic');
        $contact=$this->post->getSidebar('contact');
        $album=$this->albumModel->getAlbumById($album_id);
        
        $this->view->imageList = $photoList;
        $this->view->newsSidebar=$newsSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
        $this->view->album=$album;
    }


}



