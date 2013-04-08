<?php

class Default_Model_Album extends Zend_Db_Table_Abstract

{

    public $_name='tbl_album';
    
    public function listAlbum()
    {
        $result=$this->fetchAll()->toArray();
        return $result;
    }
    
    public function getAlbumByName($album_name)
    {
        $where = $this->getAdapter()->quoteInto('album_name = ?', $album_name);
        
        $album_info=$this->fetchRow($where)->toArray();
        $id=$album_info['id'];
        return $id;
    }
    public function getAlbumById($album_id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $album_id);
        
        $album_info=$this->fetchRow($where)->toArray();
        return $album_info;
    }

}

