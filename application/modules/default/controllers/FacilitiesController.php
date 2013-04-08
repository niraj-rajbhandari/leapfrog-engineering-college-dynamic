<?php

class Default_FacilitiesController extends Zend_Controller_Action
{

    private $facilities = null;

    public function init()
    {
        /* Initialize action controller here */
        $this->facilities=new Default_Model_Post();
    }

    public function indexAction()
    {
        // action body
        $facilitiesInfo=$this->facilities->getFacilities();
        $newsSidebar=$this->facilities->getSidebar('news');
        $academicSidebar=$this->facilities->getSidebar('academic');
        $contact=$this->facilities->getSidebar('contact');
        
        $this->view->facilitiesInfo=$facilitiesInfo;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
        $this->view->newsSidebar=$newsSidebar;
    }

    public function facilityAction()
    {
        // action body
        $postId=$this->_getParam('id');
        $facilitiesSidebar=$this->facilities->getSidebar('facilities');
        $academicSidebar=$this->facilities->getSidebar('academic');
        $contact=$this->facilities->getSidebar('contact');
        $facility=$this->facilities->getPostByID($postId);
        
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
        $this->view->facilitiesSidebar=$facilitiesSidebar;
        $this->view->facility=$facility;
    }


}



