<?php
include('../control/logincheck.php');

if (isset($_SESSION['username'])) {
    header("location: homepageone.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="../js/myjs.js"></script>
</head>

<body>
    <div class="header">
        <h1>G6 RESTURENT</h1>
    </div>
    <?php include 'navbar.php' ?>
    <div class="container">

        <div class="card">
            <h3 class="card-header">Login</h3>
            <div class="card-body">
                <div class="error">
                    <?php if ($error) : echo $error;
                    endif; ?>
                </div>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td> NAME</td>
                            <td> <input type="text" name="username" placeholder="Enter your username" required></td>
                        </tr>
                        <tr>
                            <td> PASSWORD </td>
                            <td><input type="password" name="password" placeholder="Enter your password" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input name="submit" type="submit" value="LOGIN">
                                <div>
                                    Don't have an account? <a href="reg2.php">Registration</a>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>