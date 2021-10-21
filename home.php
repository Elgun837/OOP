<?php include_once "config.php";
require_once "header.php";
session_start();


?>
<div class="main">
  <div class="left">
    <div class="profile-part">
      <?php
      $mail = $_SESSION['email'];
      $Db->showProfil($mail);
      ?>
    </div><br><br><br>
    <div class="insert-data-part">
      <form  id="Form-data" enctype="multipart/form-data">
        <input id="name" type="text" name="pr_name" placeholder="Name" required><br><br>
        <input id="price" type="text" name="price" placeholder="Price" required><br><br>
        <input id="image" type="file" name="image" required><br><br>
        <button id="add" type="submit">Add</button>
      </form>
    </div>

  </div>
  <div class="right">
    <table id="table" class="table table-dark">
    <thead>
            <tr>
              <th scope='col'>Image</th>
              <th scope='col'>#</th>
              <th scope='col'>Name</th>
              <th scope='col'>Price</th>
            </tr>
          </thead>
          <tbody>
      <?php  $Db->showTable(); ?>
    </table>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $("#Form-data").submit(function(e) {
    e.preventDefault();
    let name = $("#name").val();
    let price = $("#price").val();
    let image = $("#image").val();
    $.ajax({
      url:'addProduct.php',
      type:'POST',
      data:  new FormData(this),
      contentType: false,
         cache: false,
   processData:false,
    }).done(function(data) {
      $("#table").html(data);
      Swal.fire(
    'Təbriklər!',
    'Məhsul əlavəsi uğurlu oldu',
    )
    })
  });
  
</script>