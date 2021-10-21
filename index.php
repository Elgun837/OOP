<?php
include_once "config.php";



if (!(@$_SESSION['login'])) {
?>
    <center>

        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Your email" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Login</button><br><br>
            <a href="register.php">Register</a><br><br>
        </form>
    </center>

<?php } else {
    echo "<center><h1>You are logged</h1></center><script>setTimeout(function(){ window.location.href = 'home.php'; }, 2000)</script>";
}
