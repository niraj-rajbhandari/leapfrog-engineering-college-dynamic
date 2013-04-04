<?php

class Admin_Model_Post extends Zend_Db_Table_Abstract {

    public $_name = 'tbl_posts';

    public function AddPost($postInfo) {
        $bool = $this->insert($postInfo);
        return $bool;
    }
    
    public function EditPost($postId,$postInfo) {
        $where=array('id'=>$postId);
        $bool = $this->update($postInfo,$where);
        return $bool;
    }
    
    public function DeletePost($postId){
        $where=array('id'=>$postId);
        $bool=$this->delete($where);
        return $bool;
    }
    
    public function ListPost()
    {
        $postList=$this->fetchall()->toArray();
        return $postList;
    }
    
    public function GetPostById($postId)
    {
        $where=array('id'=>$postId);
        $postInfo=$this->fetchRow($where)->toArray();
        return $postInfo;
    }

}

