<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$servername = "oniddb.cws.oregonstate.edu";
$username = "jungjo-db";
$password = "NH3L80XY5GDhtIZc";
$dbname = "jungjo-db";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submitted'])){
	$un = $_POST["userid"];
	$pw = $_POST["password"];

	$query = mysqli_query($con, "SELECT * FROM users WHERE username='$un' AND passwd = '$pw'"); 

	if(mysqli_num_rows($query) > 0){
		header("Location: main.html");
	}
	else{
		echo '<script type="text/javascript">alert("Invalid log-in information");
		</script>';
	}
	
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "utf-8">
<title>Header for Message Board</title>
<link href = "header.css" rel = "stylesheet">
<body>
	<div class = "header"><header class = "blog-title">To-Do List: Log In</header></div>
	<p>
		<?php
		echo "<h4>You don't have an account? Click on Register below to get a free account.";
		if(isset($_SESSION['first_name']))
		{
		echo ", {$_SESSION['first_name']}!";
		}

		echo '</h4>';
		if(isset($_SESSION['user_id']) AND (substr($_SERVER['PHP_SELF'], -10) != 'logout.php'))
		{
		echo '<a href= "logout.php">Logout</a><br />';
		}
		else{		
		echo '<a href = "Reg.php">Register</a><br />';
		}		
	?>
	</p>
	</div>
	<h2></h2>
	<form action = "login.php" method = "POST">
		<fieldset>
		<p>User Name: <input type = "text" name = "userid" size = "20" maxlength = "20"></p>
		<p>Password: <input type = "password" name = "password" size = "20"></p>
		</fieldset>
		<div align = "center"><input type = "submit" name = "submit" value = "Log In"></div>
		<input type = "hidden" name = "submitted" value = "TRUE"/>
	</form>
	</div>
	<footer class ="footer"></footer>
</body>
</html>
