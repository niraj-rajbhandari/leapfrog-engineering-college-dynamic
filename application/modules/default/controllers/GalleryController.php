<?php

class Default_GalleryController extends Zend_Controller_Action
{

    private $albumModel = null;

    private $galleryModel = null;

    private $postModel = null;

    public function init()
    {
        $this->albumModel = new Default_Model_Album();
        $this->galleryModel = new Default_Model_Gallery();
        $this->postModel=new Default_Model_Posts();
    }

    public function indexAction()
    {
        // action body
        $ids;
        $images;
        $i=0;
        $album_list=  $this->albumModel->listAlbum();
        $this->view->album_list=$album_list;
       foreach ($album_list as $value) {
            $ids[$i]=$value['id'];
            $images[$i]=  $this->galleryModel->listImage($ids[$i]);
            $i++;
        }
//        echo '<pre>';
//        print_r($images);
//        exit;
//        while($i<  count($ids))
//        {
//        echo '<pre>';
//        print_r($images[1]);
//        exit;
//        $i++;
//        }
        
        //$images=  $this->galleryModel->listImage($id);
        //$posts=$this->postModel->getPostByType("Gallery");
        $this->view->images=$images;
        $this->view->album=$ids;
    }

    public function listimagesAction()
    {
        // action body
        $album_id = $this->_getParam('album-id');
        
        $photoList = $this->galleryModel->listImage($album_id);
        $this->view->imageList = $photoList;
    }


}



