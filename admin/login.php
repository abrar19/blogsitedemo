<?php include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		
		<?php 
			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$username = $fm->validation($_POST['username']);
				$password = $fm->validation(md5($_POST['password']));
				
				$username = mysqli_real_escape_string($db->link, $username);
				$password = mysqli_real_escape_string($db->link, $password);

				$query = "select * from tbl_user where username = '$username' and password = '$password'";
				$result = $db->select($query);
				if($result!=false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row>0){
						Session::set("login", true);
						Session::set("username", $value['username']);
						Session::set("userID", $value['id']);
						header("Location:index.php");
					}else{
						echo"<span style='color:red;font-size:18px;'>No results found!!</span>";
					}
				}else{
					echo"<span style='color:red;font-size:18px;'>Incorrect Password!!</span>";
				}

			}
		?>

		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#"><span style="font-style:italic;color:orange;">Designed by </span>Abrar Haque</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>