<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/reg.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
<script src="../js/myJS.js"></script>
  <div class="header">
    <h1>G6 RESTURENT</h1>
  </div>
  <?php include "navbar.php" ?>

  <?php

  include "../control/db.php";
  $username = $name = $email = $password = $confirmpassword = $address = $phone = $gender = $dateofbirth = " ";
  $usernameerror = "";
  $nameerror = "";
  $emailerror = "";
  $passworderror = "";
  $confirmpassworderror = "";
  $addresserror = "";
  $phoneerror = "";
  $msg = "";
  $gendererror = "";
  $doberror = "";
  if (isset($_REQUEST['submit'])) {

    if (empty($_POST['username'])) {
      $usernameerror = "please insert correct username";
    } else {

      $username = $_POST['username'];
    }
    if (empty($_POST['name'])) {
      $nameerror = "please insert correct name";
    } else {
      $name = $_POST['name'];
    }
    if (empty($_POST['email'])) {
      $emailerror = "please insert correct email";
    } else {
      $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
      $passworderror = "please insert correct password";
    } else {
      $password = $_POST['password'];
    }
    if (empty($_POST['confirmpassword'])) {
      $confirmpassworderror = "please insert correct cp";
    } else {
      $confirmpassword = $_POST['confirmpassword'];
    }
    if (empty($_POST['address'])) {
      $addresserror = "please insert correct address";
    } else {
      $address = $_POST['address'];
    }
    if (empty($_POST['phone'])) {
      $phoneerror = "please insert correct phone number";
    } else {
      $phone = $_POST['phone'];
    }

    if (empty($_POST['gender'])) {
      $gendererror = "please select your gender";
    } else {
      $gender = $_POST['gender'];
    }
    if (empty($_POST['dateofbirth'])) {
      $doberror = "please insert your DOB";
    } else {
      $dateofbirth = $_POST['dateofbirth'];
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = "raiyan";
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['dateofbirth'];
   $emailsql = "SELECT email FROM $table";

    $sql = "INSERT INTO $table VALUES ('$username', '$name', '$email', '$password', '$address', '$phone', '$gender', '$dateofbirth')";

    $conn = new db();

    $allEmails = $conn->Query($emailsql)->fetch_all();

    $isEmailPresent = false;
    foreach ($allEmails as $key => $value) {
      if ($value[0] == $email) {
        $isEmailPresent = true;
      }
    }

    if ($isEmailPresent) {
      $msg = "Email Already Exists!!";
    } else {
      $res = $conn->Query($sql);

      if ($res) {
        $msg = "Registration Successful";
      } else {
        $msg = "Registration Failed";
      }
    }
  } else $msg = "";

  ?>

  <div class="container">
  <div class="card">

<h2 class="card-header">Register Here</h2>

 <div class="card-body">

       <div id="errors" style="padding:10px; color: red; background: #fcfcfc">
       <?php if ($msg) : echo $msg;
      endif; ?>
    </div>

   <form action="" method="post">
  <div>
        <label for="username">USERNAME</label><br>
        <input type="text" onkeyup="validateUsername(this.value)" name="username" id="username" required><?php echo $usernameerror ?>
     <span id="username_validation"></span>
</div>
       <div>
       <label for="name">NAME</label><br>
       <input type="text" name="name" id="name" required><?php echo $nameerror ?>
   </div>

   <div>
       <label for="email">EMAIL</label><br>
       <input type="email" name="email" id="email" required><?php echo $emailerror ?>
  </div>

     <div>
       <label for="password">PASSWORD</label><br>
      <input type="password" onkeyup="validatePassword(this.value)" name="password" id="password" minlength="8" required><?php echo $passworderror ?>
       <span id="password_validation"></span>
      </div>

      <div>
       <label for="confirmpassword">CONFIRM PASSWORD</label><br>
       <input type="password" onkeyup="validatePasswordConfirmation()" name="confirmpassword" id="confirmpassword" required><?php echo $confirmpassworderror ?>
       <span id="password_stat"></span>
      </div>

      <div>
      <label for="address">ADDRESS</label><br>
      <textarea rows="15" cols="30" name="address" id="address" required></textarea>
       <br>
     <?php echo $addresserror ?>
     </div>

       <div>
     <label for="phone">PHONE</label><br>
     <input type="number" name="phone" id="phone" required><?php echo $phoneerror ?>
    </div>

    <div>
    <label for="gender">Gender</label><br>
    <input type="radio" name="gender" id="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<input type="radio" name="gender" value="Other" required>Other<br><?php echo $gendererror; ?>
    </div>
    <div>
   <label for="dateofbirth">Date Of Birth</label><br>
     <input type="date" id="dateofbirth" name="dateofbirth" min="1950-12-31" required><?php echo $doberror ?>
     </div>
     <button type="submit" name="submit">Register</button>
   </form>

    <div style="padding-top: 10px;">
    Already have an account? <a href="login.php">Login</a>
   </div>

  </div>

 </div>

  </div>
  
</body>

</html>