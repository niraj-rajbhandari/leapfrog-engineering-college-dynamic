<?php

class Default_AcademicController extends Zend_Controller_Action
{
    private $academic;
    public function init()
    {
        /* Initialize action controller here */
        $this->academic=new Default_Model_Post();
    }

    public function indexAction()
    {
         // action body
        $academicInfo=$this->academic->getAcademic();
        $newsSidebar=$this->academic->getSidebar('news');
        $facilitiesSidebar=$this->academic->getSidebar('facilities');
        $contact=$this->academic->getSidebar('contact');
        
        $this->view->academicInfo=$academicInfo;
        $this->view->facilitiesSidebar=$facilitiesSidebar;
        $this->view->contact=$contact;
        $this->view->newsSidebar=$newsSidebar;
    }


}

