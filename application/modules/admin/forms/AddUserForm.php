<?php

class Admin_Form_AddUserForm extends Zend_Form {

    public function init() {
        $this->setAction(BASE_URL . 'admin/user/add-user')
                ->setMethod('post');

        // create text input with label
        $FirstName = new Zend_Form_Element_Text('first_name');
        $FirstName->setLabel('First Name:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $FirstName->addErrorMessage('Please enter your firstname');

        $MiddleName = new Zend_Form_Element_Text('middle_name');
        $MiddleName->setLabel('Middle Name:')
                ->setOptions(array('size' => '255'))
                ->addFilter('StringTrim');

        $LastName = new Zend_Form_Element_Text('last_name');
        $LastName->setLabel('Last Name:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $LastName->addErrorMessage('Please enter your Last name');

        $address = new Zend_Form_Element_Text('address');
        $address->setLabel('Address:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $address->addErrorMessage('Please enter your Address');

        $phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Phone:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addValidator('Digits')
                ->addFilter('StringTrim');
        $phone->addErrorMessage('Please enter a valid phone number');

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addValidator('EmailAddress', true)
                ->addFilter('StringTrim');
        $email->addErrorMessage('Please enter a valid email address');

        $ProfilePic = new Zend_Form_Element_File('profile_pic');
        $ProfilePic->setLabel('Profile Picture:');


        $username = new Zend_Form_Element_Text('user_name');
        $username->setLabel('Username:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addValidator('EmailAddress', true)
                ->addFilter('StringTrim');
        $username->addErrorMessage('Please enter a valid username');


        //create password input with label
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
                ->setOptions(array('size' => '255'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $password->addErrorMessage('Please enter a valid password');

        //create submit button with value and class defined
        $submit = new Zend_Form_Element_Submit('submit', array('value' => 'Add User', 'class' => 'btn btn-info'));

        //Display all the elements created above
        $this->addElement($FirstName);
        $this->addElement($MiddleName);
        $this->addElement($LastName);
        $this->addElement($address);
        $this->addElement($phone);
        $this->addElement($email);
        $this->addElement($ProfilePic);
        $this->addElement($username);
        $this->addElement($password);
        $this->addElement($submit);

       
    }

}

