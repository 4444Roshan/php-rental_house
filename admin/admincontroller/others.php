<?php
  include_once 'admincontroller/Admincontroller.php';

  class Others extends Admincontroller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function getMessage()
    {
      $read = 0;
      $sql = "select * from tbl_message where read_message=:read";
      $query = $this->db->link->prepare($sql);
      $query->bindValue(':read',$read);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countmsg()
    {
      $read =0;
      $sql = "select count(*) as msg_num from tbl_message where read_message=:read";
      $query = $this->db->link->prepare($sql);
      $query->bindValue(':read',$read);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function countowner()
    {
      $type = 'owner';
      $sql = "select count(*) as owner from tbl_user where user=:user";
      $query = $this->db->link->prepare($sql);
      $query->bindValue(':user',$type);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function counttenant()
    {
      $type = 'tenant';
      $sql = "select count(*) as tenant from tbl_user where user=:user";
      $query = $this->db->link->prepare($sql);
      $query->bindValue(':user',$type);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function countall()
    {
      $sql = "select count(*) as alls from tbl_user";
      $query = $this->db->link->prepare($sql);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
  }

 ?>
