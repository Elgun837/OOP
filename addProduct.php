<?php
require_once "config.php";
require_once "header.php";

class Add extends Dbase
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    public function Store($pr_name,$price,$image){
        $filename = $image['name'];
        $fileTmp = $image['tmp_name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        $newName = rand()."-".time().'.'.$ext;
        $myPath = 'image/'.$newName;
        if(move_uploaded_file($fileTmp,$myPath)){
        $addPR = $this->connect->prepare("INSERT INTO `products`(`pr_name`,`price`,`img`) VALUES (?,?,?)");
        $addPR = $addPR->execute([
            $pr_name,
            $price,
            $newName            
        ]);
        $this->ShowTable();
        
        }

    }
}

$pr_name = $_POST['pr_name'];
$price = $_POST['price'];
$image = $_FILES['image'];




$add = new Add();
$add->Store($pr_name,$price,$image);


?>

