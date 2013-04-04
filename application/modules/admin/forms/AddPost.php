<?php

class Admin_Form_AddPost extends Zend_Form {

    public function init() {
        /* Form Elements & Other Definitions Here ... */
        $this->setAction(BASE_URL . 'admin/content-management/add-post')
                ->setMethod('post');

        // create text input with label
        $postTitle = new Zend_Form_Element_Text('post_title');
        $postTitle->setLabel('Title:')
                ->setOptions(array('size' => '200'))
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $postTitle->addErrorMessage('Please enter the post title');


        //create fileupload input with label
        $postImage = new Zend_Form_Element_File('post_image');
        $postImage->setLabel('Post Image:')
                  ->setOptions(array('size' => '50'))
                  ->addValidator('Count', false, 1)
                  ->addValidator('Size', false, 512000)
                  ->addValidator('Extension', false, 'jpg,png,jpeg,gif');
        

        //create textarea input with label
        $postBody = new Zend_Form_Element_Textarea('post_body', array('id' => 'post_body'));
        $postBody->setLabel('Post Content:')
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addFilter('StringTrim');
        $postBody->addErrorMessage('Please enter content of the post');

        $postActive = new Zend_Form_Element_Radio('active');
        $postActive->addMultiOptions(array(1 => 'yes', 0 => 'No'))
                   ->setLabel('Publish');
        //create submit button with value and class defined
        $submit = new Zend_Form_Element_Submit('submit', array('value' => 'Add User', 'class' => 'btn btn-info'));

        $this->addElement($postTitle);
        $this->addElement($postImage);
        $this->addElement($postBody);
        $this->addElement($postActive);
        $this->addElement($submit);
    }

}

