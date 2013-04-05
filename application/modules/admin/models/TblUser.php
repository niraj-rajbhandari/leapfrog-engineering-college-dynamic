<?php

class Admin_Model_TblUser extends Zend_Db_Table_Abstract
{
    public $_name='tbl_user';
    
    public function AddUser($userInfo)
    {
        
        $this->insert($userInfo);
    }

    public function EditUser($UserId,$UserInfo)
    {
        $where=  $this->getAdapter()->quoteInto('id = ?', $UserId);
        $update=$this->update($UserInfo, $where);
        return $update;
    }
    Public function DeleteUser($UserId)
    {
        $where=$where=array('id'=>$UserId);
        $this->delete($where);
    }
    
    public function GetUserById($userId)
    {
        
        $where=  $this->getAdapter()->quoteInto('id = ?', $userId);
        $userInfo=$this->fetchRow($where)->toArray();
        
        return $userInfo;
    }
    
    public function GetUser()
    {
        $userList=$this->fetchAll()->toArray();
        
        return $userList;
    }
    public function ChangePassword($userId, $password)
    {
            $where=  $this->getAdapter()->quoteInto('id = ?', $userId);
            $bool=$this->update(array('password'=>$password), $where);
            return $bool;
    }
    public function CheckPassword($userId, $password){
          $where="id=$userId and password='$password'";
          
          $data=$this->fetchAll($where)->toArray();
          $count=count($data) ;
          return $count;
        
    }

}

