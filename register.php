<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<body>
<div class="container mregister">
    <div id="login">
     <h1>Registration</h1>
        <form action="register.php" id="registerform" method="post"name="registerform">
            <p><label for="user_login">Name<br>
                <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
            <p><label for="user_pass">User name<br>
                <input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Password<br>
                <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
            	<p class="regtext">You registered? <a href= "login.php">Enter user name</a>!</p>
        </form>
    </div>
</div>
<?php include("includes/footer.php") ?>

<?php 

if (isset($_POST['register'])) {
    if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $full_name = htmlspecialchars($_POST['full_name']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $query = mysqli_query($con, "SELECT * FROM usertbl WHERE username='".$username."'");
        $numrows = mysqli_num_rows($query);

        if ($numrows == 0)
        {
            $sql = "INSERT INTO usertbl
            (full_name, email, username, passwor)
            VALUES ('$full_name', '$email', '$username', '$password')";
            
            $result = mysqli_query($con, $sql);
            
            if ($result) {
                $messsage = "Account succesfully created";
            } else {
                echo "FAILED to insert data information";
            }
        } else {
            $message = "That username already exists! Please try another one!";
        }
    } else {
        $message = "All fields are required!";
    }
}

?>

<?php 
if (!empty($message)) {
    echo "<p class=<error> . MESSAGE: '". $message ."' </p>";
} 
?>