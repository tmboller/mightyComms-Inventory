<?php
require_once 'php_action/db_connect.php';

session_start();

if (isset($_SESSION['userId'])) {
	//header('location: http://localhost:8080/stock/dashboard.php');
	header('location: http://localhost:8080/login/dashboard.php');
}

$errors = array();

if ($_POST) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) || empty($password)) {
		if ($username == "") {
			$errors[] = "Username is required";
		}

		if ($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if ($result->num_rows == 1) {
			//$password = md5($password);
			$password = $password;
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if ($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				$_SESSION['userId'] = $user_id;

				//header('location: http://localhost:9080/stock/dashboard.php');
				header('location: http://localhost:8080/login/dashboard.php');
			} else {

				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {
			$errors[] = "Username doesnot exists";
		} // /else
	} // /else not empty username // password

} // /if $_POST
?>

<!DOCTYPE html>
<html>

<head>
	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

	<!-- custom css -->
	<link rel="stylesheet" href="custom/css/custom.css">

	<!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
	<!-- jquery ui -->
	<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	<script src="assests/jquery-ui/jquery-ui.min.js"></script>

	<!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	
	<style>

	body
{

background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(220,220,220,1) 0%, rgba(235,42,52,1) 0%, rgba(77,29,29,1) 0%, rgba(190,78,78,1) 100%);
</style>
</head>

<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Admin Sign In</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if ($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
								}
							} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button><br>
									</div>
								<button style = "margin-left:280px; margin-top:0px;"  class="btn btn-default"><a href="techlog.php" > Technician Sign In</a></button>
									</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->
</body>

</html>