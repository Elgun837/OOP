<?php 
require_once "config.php";


class userLogout extends Dbase
{
    public function __construct()
	{
		parent::__construct();
	}
    public function Logout(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
}
$userLogout = new userLogout();
$userLogout->Logout();