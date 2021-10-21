<?php
class Dbase
{
    private $host = "localhost";
    private $db = "pcp";
    private $user = "root";
    private $password = "";
    public $connect;

    public function __construct()
    {
        $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->password);
    }

    public function showProfil($par)
    {

        $select = $this->connect->query("SELECT * FROM `user_table` WHERE `email` = '$par'")->fetch(PDO::FETCH_ASSOC);

        echo "<div class='profile'>
                <img class='img-prof' src='" . $select['img'] . "'>
                <button>Edit profile</button>
            </div>
            <div class='profil-info'>
                <p>Name:" . $select['user_name'] . "</p>
                <p>Email:" . $select['email'] . "</p>
                <div class='logout'>
                    <a href='logout.php'><button id='logout'>Logout</button></a>
                </div>
            </div>";
    }

public function ShowTable(){
    $show_pr = $this->connect->query("SELECT * FROM `products`")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($show_pr as $key => $value) {
            echo "
            <tr>
              <th scope='row'><img class='img-pr' src='./image/". $value["img"]  ."' alt=''''></th>
              <td>".$value["id"] ."</td>
              <td>".$value["pr_name"] ."</td>
              <td>".$value["price"]. "  Azn</td>
            </tr>
          </tbody>";
        }
}
}


$Db = new Dbase();
