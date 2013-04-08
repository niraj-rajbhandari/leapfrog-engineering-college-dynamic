<?php

class Default_Model_Album extends Zend_Db_Table_Abstract

{

    public $_name='tbl_album';
    
    public function listAlbum()
    {
        $result=$this->fetchAll()->toArray();
        return $result;
    }
    

}

