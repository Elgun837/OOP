<?php

require_once "config.php";


class UserInsert extends Dbase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userInsert($name, $email, $password)
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $select = $this->connect->prepare("SELECT * FROM `user_table` WHERE `email`= ?");
            $select->execute([$email]);
            $result = $select->rowCount();
            if ($result === 0) {
                $name = $_POST['user_name'];
                $mail = $_POST['email'];
                $password = md5(sha1($_POST['password']));

                $add_user = $this->connect->prepare("INSERT INTO `user_table`(`user_name`, `email`, `password`) VALUES (?,?,?)");
                $result = $add_user->execute([
                    $name,
                    $mail,
                    $password
                ]);
                if ($result) {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $mail;
                    echo "Your are successfully registered <script>setTimeout(function(){ window.location.href = 'home.php'; }, 2000)</script>";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "This email reserved by other user";
            }
        }
    }
}

$UserInsert = new UserInsert;

@$name = $_POST['user_name'];
@$email = $_POST['email'];
@$password = $_POST['password'];

$UserInsert->userInsert($name, $email, $password);

?>
<center>

    <form action="" method="POST">
        <input type="text" name="user_name" placeholder="Your Name"><br><br>
        <input type="email" name="email" placeholder="Your email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button><br><br>
        <a href="index.php">Login</a><br><br>
    </form>
</center>