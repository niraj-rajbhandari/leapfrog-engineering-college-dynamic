<?php

class Default_AboutUsController extends Zend_Controller_Action
{
    private $about;
    public function init()
    {
        /* Initialize action controller here */
            $this->about=new Default_Model_Post();
    }

    public function indexAction()
    {
        // action body
        $about=$this->about->getAbout();
        $newsSidebar=$this->about->getSidebar('news');
        $academicSidebar=$this->about->getSidebar('academic');
        $contact=$this->about->getSidebar('contact');
        
        $this->view->about=$about;
        $this->view->newsSidebar=$newsSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
    }


}

