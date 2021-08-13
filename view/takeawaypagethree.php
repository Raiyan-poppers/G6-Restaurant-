<?php
session_start();
if (empty($_SESSION["username"])) // Destroying All Sessions
{
  header("Location: login.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/takeaway.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
  <div class="header">
    <h1>Menu</h1>
  </div>

  <?php include("navbar.php"); ?>

  <div class="container">
   <div class="card">
   <h5 class="card-header">Takeaway</h5>

   <div class="card-body">
   <p>Click on items to choose.</p>

 <p id="status"></p>
    </div>

  <table width="100%" id="takeout">
          <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Price</td>
          <td>Add</td>
        </tr>

   <?php
      include "../control/db.php";

    $db = new db();
      $conn = $db->OpenCon();

  $res = $conn->query("SELECT * FROM menu")->fetch_all();

  foreach ($res as $key => $value):
   $id = $value[0];
     $name = $value[1];
   $price = $value[2];
  ?>
     <tr onclick="add('<?php echo $name ?>', <?php echo $price ?>)">
         <td>
       <?php echo $id; ?>
        </td>
         <td>
       <?php echo $name; ?>
       </td>
         <td>
      <?php echo $price; ?>
        </td>
         <td>
          Order
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

    </div>

    <div class="card" id='chose' style="display: none;">
     <div class="card-header">My Choices</div>
     <div class="card-body">
      <table id="chose-table" width="100%"></table>
      <div class="card-body">
      <a href="confirmationpagefour.php"><button>Checkout</button></a>
     </div>
     </div>
    </div>


    <div class="card">
    <div class="card-body">
     Find Food: <input type="text" id="uname" onkeyup="showmyuser()">
     <p id="mytext"></p>
   </div>
 </div>
  </div>

  <script>
  function showmyuser() {
    var uname = document.getElementById("uname").value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          var res = JSON.parse(this.responseText);
          
          var searchRes = []

          res.forEach(element => {
            var food = element[1];
            
            if(food.includes(uname))
              searchRes.push(food);
          });
          
          if(searchRes.length)
          {
            var objt = '<ul>'
            searchRes.forEach(each=> {
              objt+= '<li>' + each  + "</li>";
            });

            objt+= "</ul>";

            document.getElementById("mytext").innerHTML = objt;
          }
          else
          {
            document.getElementById("mytext").innerHTML = "Nothing Found";
          }
        } else {
          document.getElementById("mytext").innerHTML = this.status;
        }
      };
      xhttp.open("POST", "../control/getfood.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("uname=" + uname);
    }
  </script>

  <script src="../js/takeout.js"></script>
</body>

</html>