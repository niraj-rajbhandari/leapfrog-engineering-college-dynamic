<?php

class Default_NewsController extends Zend_Controller_Action
{

    private $news = null;

    public function init()
    {
        /* Initialize action controller here */
        $this->news=new Default_Model_Post();
    }

    public function indexAction()
    {
        // action body
        $newsInfo=$this->news->getNews();
        $facilitiesSidebar=$this->news->getSideBar('facilities');
        $academicSidebar=$this->news->getSideBar('academic');
        $contact=$this->news->getSideBar('contact');
        
        $this->view->facilitiesSidebar=$facilitiesSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
        $this->view->newsInfo=$newsInfo;
    }

    public function newsPostAction()
    {
        // action body
        $postId=$this->_getParam('id');
        $news=$this->news->getPostById($postId);
        $academicSidebar=$this->news->getSideBar('academic');
        $contact=$this->news->getSideBar('contact');
        $newsSidebar=$this->news->getSidebar('news');
        
        $this->view->newsSidebar=$newsSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
        $this->view->news=$news;
    }


}



