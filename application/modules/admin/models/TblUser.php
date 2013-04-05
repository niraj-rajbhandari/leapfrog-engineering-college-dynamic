<?php

class Admin_Model_TblUser extends Zend_Db_Table_Abstract
{
    public $_name='tbl_user';
    
    public function AddUser($userInfo)
    {
       if($this->insert($userInfo))
           return true;
       else 
           return flase;
    }

    public function EditUser($UserId,$UserInfo)
    {
        $where=array('id'=>$UserId);
        $update=$this->update($UserInfo, $where);
        if($update){
            return true;
        }
        else{
            return FALSE;
        }
    }
    Public function DeleteUser($UserId)
    {
       $where=array('id'=>$UserId);
        $this->delete($where);
    }
    
    public function GetUserById($userId)
    {
        $where=array('id'=>$userId);
        $userInfo=$this->fetchRow($where)->toArray();
        return $userInfo;
    }
    
    public function GetUser()
    {
        $userList=$this->fetchAll()->toArray();
        
        return $userList;
    }
    

}

