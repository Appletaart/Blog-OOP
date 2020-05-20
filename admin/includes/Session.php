<?php

class Session
{
    private $signed_in = false; // set false as default
    public $user_id;
    public $username;

    function __construct()
    {
        session_start();
        $this->visitor_count(); // this session now count all when i have refresh try another way
        $this->check_the_login();
        $this->check_message();

    }

    public function visitor_count(){
        if(isset($_SESSION['count'])){
            return $this->count =$_SESSION['count']++;
        }else{
            return $_SESSION['count'] = 1;
        }
    }

    // begin login method
    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->username = $_SESSION['username'] = $user->username;
            $this->signed_in = true;
        }
    }

    // begin log out method
    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }
   

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        }
        else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    // message
    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }
        else{
            return $this->message;
        }
    }

    private function check_message(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else{
            $this->message = "";
        }
    }
}

$session = new Session();

?>

<!--__construct
to run the method in the first time for the object we did not have a value yet
&
__destruct() clean up the class/object-->
