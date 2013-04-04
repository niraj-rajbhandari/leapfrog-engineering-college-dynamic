<?php

class Admin_IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_layout->setLayout('admin');
    }

    public function indexAction() {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect(BASE_URL.'admin/index/login');
        }
        
    }

    public function loginAction() {
        // action body
        $userModel = new Admin_Model_TblUser;
        $AuthTable = $userModel->_name;
        $loginForm = new Admin_Form_UserLogin();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if ($loginForm->isValid($formData)) {
                $DbAdapter = Zend_Db_Table::getDefaultAdapter();
                $adapter = new Zend_Auth_Adapter_DbTable(
                        $DbAdapter, $AuthTable, 'user_name', 'password', 'MD5(?)'
                );
                $adapter->setIdentity($formData['user_name']);
                $adapter->setCredential($formData['password']);
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
                if ($result->isValid()) {
                    $result = $adapter->getResultRowObject(array('id', 'user_name'));

                    $auth->getStorage()->write($result);

                    $this->_redirect(BASE_URL . 'admin');
                } else {
                    $msg = 'Incorrect Username or Password';
                    $this->view->msg = $msg;
                }
            }
        }
        $this->view->LoginForm = $loginForm;
    }

    public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $auth->clearIdentity();
            $this->_redirect(BASE_URL.'admin/index/login');
            
        }
    }

}

