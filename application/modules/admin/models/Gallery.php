<?php

class Admin_Model_Gallery extends Zend_Db_Table_Abstract

{

    public $_name='tbl_gallery';
    
    


    public function addImage($image_info)
    {}
    public function editImage($image_info,$image_id)
    {}
    public function deleteImage($image_id)
    {}
    public function getImageById($album_id,$image_id)
    {}
    public function listImage($album_id)
    {}
    


}

