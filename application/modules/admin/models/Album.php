<?php

class Admin_Model_Album extends Zend_Db_Table_Abstract

{

    public $_name='tbl_album';
    
    public function addAlbum($album_info)
    {
        if($this->insert($album_info))
           return true;
       else 
           return flase;
    }
    public function editAlbum($album_info)
    {
        $arr['album_name']=$album_info['album_name'];
        $where = $this->getAdapter()->quoteInto('id = ?', $album_info['album-id']);
        $bool = $this->update($arr,$where);
        return $bool;
        
    }
    public function deleteAlbum($album_id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $album_id);
        
        $bool= $this->delete($where);
        return $bool;
    }
    public function getAlbumById($album_id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $album_id);
        
        $album_info=$this->fetchRow($where)->toArray();
        return $album_info;
    }
    public function listAlbum()
    {
        $result=$this->fetchAll()->toArray();
        return $result;
    }
    

}

