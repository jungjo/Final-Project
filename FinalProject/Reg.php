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

//session_start();
if(isset($_POST['submitted'])){
	$fn = $_POST["firstname"];	
	$ln = $_POST["lastname"];
	$un = $_POST["userid"];
	$pw = $_POST["password"];

	$query = mysqli_query($con, "SELECT * FROM users WHERE username = '".$un."'");
	
	if(mysqli_num_rows($query) > 0){
			echo '<script type="text/javascript">alert("Someone already has that username.");
		</script>';		
	}
	else{
		mysqli_query($con, "INSERT INTO users (username, passwd, first_name, last_name) 
		VALUES ('$un', '$pw', '$fn', '$ln')");	
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
	<div class = "header"><header class = "blog-title">To-Do List: Registration</header></div>
	<p>
		<?php
		echo '<h4>Already have an account? Click on log in to Journal keep another day.';
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
		echo '<a href = "login.php">Login</a><br />';
		}		
	?>
	</p>
	</div>
	<h2></h2>
	<form action = "Reg.php" method = "POST">
		<fieldset>
		<p>First Name: <input type = "text" name = "firstname" size = "30"></p>
		<p>Last Name: <input type = "text" name = "lastname" size = "30"></p>
		<p>User Name: <input type = "text" name = "userid" size = "20" maxlength = "20"></p>
		<p>Password: <input type = "password" name = "password" size = "20"></p>
		</fieldset>
		<div align = "center"><input type = "submit" name = "submit" value = "Register"></div>
		<input type = "hidden" name = "submitted" value = "TRUE"/>
	</form>
	</div>
	<footer class ="footer"></footer>
</body>
</html>
	
