<?php

class Admin_Model_Gallery extends Zend_Db_Table_Abstract

{

    public $_name='tbl_gallery';
    
    


    public function addImage($image_info)
    {
        if($this->insert($image_info))
            return true;
        else 
            return false;
    }
    public function editImage($image_info,$image_id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $image_id);
        $bool = $this->update($image_info,$where);
        return $bool;
    }
    public function deleteImage($id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        
        $bool= $this->delete($where);
        return $bool;
    }
    
    public function getImageById($image_id)
    {
        $where = $this->getAdapter()->quoteInto('id = ? ', $image_id);
        
        $imageInfo=$this->fetchRow($where)->toArray();
        return $imageInfo;
    }
    public function listImage($album_id)
    {
        $where = $this->getAdapter()->quoteInto('album_id = ?', $album_id);
        $album_info=$this->fetchAll($where)->toArray();
        return $album_info;
    }
    


}

