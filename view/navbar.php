<div class="topnav">
    <div class="container" style="display:flex; justify-content:center;">
     <?php
 if (!isset($_SESSION)) {
     session_start();
      }
        
  if (isset($_SESSION['username'])) :
 ?>
    <a href="homepageone.php">Home</a>
    <a href="reservationpagetwo.php">Reservation</a>
    <a href="takeawaypagethree.php">Takeaway</a>
     <a href="myprofile.php"><?php echo $_SESSION['username'] ?></a>
    <a href="../control/logout.php">Logout</a>
    <?php else : ?>
   <a href="login.php">Login</a>
   <a href="reg2.php">Register</a>
  <?php endif; ?>
    </div>
</div>