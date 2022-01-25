<?php session_start(); ?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_SESSION['session_username'])) {
        header("Location: intropage.php");
    }

    if(isset($_POST['login'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $query = mysqli_query($con, "SELECT * FROM `usertbl` WHERE username='$username' AND passwor='$password'");
            $numrows = mysqli_num_rows($query);

            if($numrows != 0) {
                while($row=mysqli_fetch_assoc($query)) {
                    $dbusername = $row['username'];
                    $dbpassword = $row['passwor'];
                }

                if ($username ==  $dbusername && $password == $dbpassword) {
                    $_SESSION['session_username'] = $username;

                    header("Location: intropage.php");
                }
            } else {
                echo "Invalid username or password";
        }
        } else {
            $message = "All fields are required";
        }
    }
?>

<body>
    <div class="container mlogin">
        <div id="login">
            <h1>Input</h1>
            <form action="" id="loginform" method="post"name="loginform">
                <p><label for="user_login">Name user<br>
                <input class="input" id="username" name="username"size="20"
                    type="text" value=""></label></p>
                <p><label for="user_pass">Password<br>
                <input class="input" id="password" name="password"size="20"
                    type="password" value=""></label></p> 
            	<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
            	<p class="regtext">Not registered?<a href= "register.php">Registration</a>!</p>
            </form>
         </div>
    </div>
<?php include("includes/footer.php") ?>