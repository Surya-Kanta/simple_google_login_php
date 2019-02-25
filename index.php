<?php
	require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		$gClient->setAccessToken($_SESSION['access_token']);
	} else if (isset($_GET['code'])) {
		$gClient->authenticate($_GET['code']);
		$token = $gClient->getAccessToken();
		$_SESSION['access_token'] = $token;
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login With Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-3">
			<img style="width: 80%;" src="<?php echo $_SESSION['picture'] ?>">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td>ID</td>
						<td><?php echo $_SESSION['id'] ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['givenName'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['familyName'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email'] ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $_SESSION['gender'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<a class="btn btn-warning col-4" style="float: right;" href="logout.php">Logout</a>
</div>
</body>
</html>