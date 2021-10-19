<?php

require_once "config.php";


class UserChek extends Dbase
{
    public function __construct()
	{
		parent::__construct();
	}

	public function chekLogin($password)
	{
		if(!isset($_SESSION['login'])){
            
            if(!empty($_POST)){
            $mail = $_POST['email'];
        
            $mail_find = $this->connect->prepare("SELECT `email` FROM `user_table` WHERE email = ?"); 
            $mail_find -> execute([$mail]);
                if($mail_find->rowCount() === 1){
                    $password = md5(sha1($_POST['password']));
                    $select = $this->connect->query("SELECT * FROM `user_table` WHERE `email` = '$mail'")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($select as $key => $value) {
                                                                  
                    if($value['password'] == $password){
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['email'] = $mail;
                        echo "<center><h1>You are logged</h1></center><script>setTimeout(function(){ window.location.href = 'home.php'; }, 2000)</script>";
                    }else{
                        echo "<center><h1>Wrong password</h1></center><script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000)</script>";
                    }
                }
                }else{
                    echo "<center><h1>This email was not found</h1></center><script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000)</script>";
                }
            }else{
                echo "Please type mail and password";
            }
        }
        else{
            header("location:home.php");
        }
            
	}
}

$Cheklogin = new UserChek;

@$name = $_POST['user_name'];
@$email = $_POST['email'];
@$password = $_POST['password'];

$Cheklogin->chekLogin($name, $email, $password);
