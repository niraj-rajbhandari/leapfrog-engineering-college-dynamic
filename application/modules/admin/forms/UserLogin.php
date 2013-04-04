<?php

class Admin_Form_UserLogin extends Zend_Form
{

    public function init()
    {
        //Set action and method of the form 
        $this->setAction(BASE_URL.'admin/index/login')
                ->setMethod('post');
       
        // create text input with label
        $UserName = new Zend_Form_Element_Text('user_name');
        $UserName->setLabel('Username:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $UserName->addErrorMessage('Please enter username');
        
        //create password input with label
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $password->addErrorMessage('Please enter username');
        
        $submit=new Zend_Form_Element_Submit('submit',array('value'=>'Log In','class'=>'btn btn-info btn-small'));
        
        $this->addElement($UserName);
        $this->addElement($password);
        $this->addElement($submit);
    }


}

