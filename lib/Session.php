<?php

  class Session
  {
    public static function init(){
      session_start();
    }
    // set the value  of a specific key in the $_SESSION array.
    public static function set($key,$value){
      $_SESSION[$key] = $value;
    }
    //retrive the  value of a specific key in the SESSION array
    public static function get($key){
      if(isset($_SESSION[$key])){
        return $_SESSION[$key];
      }
      else{
        return false;
      }
    }
    //if logout  is called, destroy all session data
    public static function checkSession(){
      
      if(self::get('login') == false){
        self::sessionDestroy();
      }
    }
    //check admin  .
    public static function checkAdmin(){
      if(self::get('user') != 'admin'){
        session_destroy();
        Header('Location:login.php');
      }
    }
    public static function sessionDestroy(){
      session_destroy();
      Header('Location:index.php');
    }
    public function sessionDestroyadmin()
    {
      session_destroy();
      Header('Location:index.php');
    }
  }



 ?>
