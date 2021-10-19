<?php include_once "config.php";
require_once "header.php";

?>
<div class="main">
    <div class="left">
        <div class="profile-part">
            <?php 
                $mail = $_SESSION['email'];
                $showUser = new Dbase();
                $showUser->showProfil($mail);
            ?>
        </div><br><br><br>
        <div class="insert-data-part">
            <form action="" method="post" enctype="multipart/form-data">
                <input id="name" type="text" name="pr_name" placeholder="Name" required><br><br>
                <input id="price" type="text" name="price" placeholder="Price" required><br><br>
                <input id="image" type="file" name="image" required><br><br>
                <button id="add" type="submit">Add</button>
            </form>
        </div>
        <script>
            $(".add").click(function(){
			let name = $("#name").val();
            let price = $("#price").val();
            let image = $("#image").val();
			$.post("config.php", {
				name : name,
                price: price,
                image: image 
			}).done(function(data){
				$("#table").html(data);
			})
		});
        </script>
    </div>
    <div class="right">
    <table id="table" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><img class="img-pr" src="./image/default.png" alt=""></th>
      <td></td>
      <td></td>
      <td>Azn</td>
    </tr>
  </tbody>
</table>
    </div>
</div>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>