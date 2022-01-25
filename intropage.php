

<?php
session_start();

if(!isset($_SESSION['session_username'])):
    header('Location: login.php');
else:
?>

<?php include("includes/header.php"); ?>

<?php include("includes/header.php"); ?>
<div id="welcome">
 <h2>We glad to see you, <span><?php echo $_SESSION['session_username']; ?></span>!</h2>
	<p><a href="logout.php">logout</a> из системы</p>
</div>

<?php include("includes/footer.php"); ?>

<?php endif; ?>
