<?php

class Default_ContactController extends Zend_Controller_Action {
    private $contact;
    public function init() {
        /* Initialize action controller here */
//        $this->_layout = Zend_Layout::getMvcInstance();
//        $this->_layout->setLayout('contact');
        $this->contact=new Default_Model_Post();
    }

    public function indexAction() {
        // action body
        $newsSidebar=$this->contact->getSideBar('news');
        $academicSidebar=$this->contact->getSidebar('academic');
        $contact=$this->contact->getSidebar('contact');
        
        $this->view->newsSidebar=$newsSidebar;
        $this->view->academicSidebar=$academicSidebar;
        $this->view->contact=$contact;
    }

    public function feedbackAction() {
        // action body
        // set smtp mail transport server
        //set filters and validators for Zend_Filter_Input
        if ($this->getRequest()->isPost()) {

            $filters = array(
                'inputName' => array('StripTags', 'StringTrim'),
                'inputEmail' => array('StripTags', 'StringTrim'),
            );

            $validators = array(
                'inputName' => array('NotEmpty'),
                'inputEmail' => array('NotEmpty', 'EmailAddress'),
                'inputFeedback' => array('NotEmpty')
            );

            //assign Input
            $input = new Zend_Filter_Input($filters, $validators);
            $input->setData($this->getRequest()->getParams());
            if ($input->isValid()) {
                $sendMail=$this->getRequest()->getParams();
               
                //set smtp default mail transport zend_mail
                $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
                    'auth' => 'login',
                    'username' => 'lcoenepal@gmail.com',
                    'password' => 'leapfrogcollege',
                    'port' => '587',
                    'ssl' => 'tls',
                ));
                Zend_Mail::setDefaultTransport($mailTransport);

                //send mail 
                $mail = new Zend_Mail();
                $mail->setFrom($sendMail['inputEmail'], $sendMail['inputName']);
                $mail->setBodyHtml($sendMail['inputFeedback']);
                $mail->addTo('nareshmaharjan@lftechnology.com', 'Naresh Maharjan');
                $mail->addCc('sudippudasaini@lftechnology.com', 'Sudip Pudasaini');
                $mail->addCc('nirajrajbhandari@lftechnology.com', 'Niraj Rajbhandari');
                $mail->setSubject('Feedback');
                if ($mail->send()) {
                    $msg = "Your feedback has been successfully collected. WE will get back to you as soon as possible.";
                    $this->_redirect('contact/index');
                }
                
            }
        }
    }

}

