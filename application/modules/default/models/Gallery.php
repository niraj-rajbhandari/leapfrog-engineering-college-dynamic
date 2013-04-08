<?php

class Default_Model_Gallery extends Zend_Db_Table_Abstract

{

    public $_name='tbl_gallery';
    
    


   public function listImage($album_id)
    {
        $where = $this->getAdapter()->quoteInto('album_id = ? ', $album_id);
        $images=$this->fetchAll($where)->toArray();
        return $images;
    }
    


}

