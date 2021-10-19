<?php
class Dbase{
    private $host = "localhost";
	private $db = "pcp";
	private $user = "root";
	private $password = "";
	public $connect;

	public function __construct()
    {
        $this->connect = new PDO("mysql:host=".$this->host.";dbname=".$this->db , $this->user, $this->password);
    }

    public function showProfil($par){

            $select = $this->connect->query("SELECT * FROM `user_table` WHERE `email` = '$par'")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($select as $key => $value) {
               echo "<div class='profile'>
                <img class='img-prof' src='".$value['image']."'>
                <button>Edit profile</button>
            </div>
            <div class='profil-info'>
                <p>Name:".$value['user_name'] ."</p>
                <p>Email:".$value['email'] ."</p>
                <div class='logout'>
                    <button id='logout'>Logout</button>
                </div>
            </div>";
            }

    }



    public function addProduct($pr_name, $price, $img){

    }
}

@$pr_name = $_REQUEST['name'];
@$pice = $_REQUEST['price'];
@$image = $_REQUEST['image'];