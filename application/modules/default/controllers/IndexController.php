<?php

class Default_IndexController extends Zend_Controller_Action
{
    public $home;
    public function init()
    {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('home');
        $this->home=new Default_Model_Post();
    }

    public function indexAction()
    {
        // action body
        $homeInfo=$this->home->getHome();
        $aboutSidebar=$this->home->getSidebar('about-us');
        $newsSidebar=$this->home->getSidebar('news');
        $contact=$this->home->getSidebar('contact');
        
        $this->view->homeInfo=$homeInfo;
        $this->view->aboutSidebar=$aboutSidebar;
        $this->view->newsSidebar=$newsSidebar;
        $this->view->contact=$contact;
    }


}

