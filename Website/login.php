<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "home.css">
		<style>
			body {
				background-image: url("Images/login/login.png");
			}

			#det {
				color: white;
				margin-top: 100px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id="header">
			<table>
				<tr>
					<td class="navmenu"> 
						<a href="home.html"><img src="Logos/logoAT.png" style="height:15%; width:auto; display: block;"/></a>
					</td>
					<td class="navmenu">
						<a href="bmi.html"> Fitness Evaluation	</a>
					</td>
					<td class="navmenu">
						<a href="tdee.html"> Nutrition </a>
					</td>
					<td class="navmenu">
						<a href="stats.html"> Fitness </a>
					</td>
					<td class="navmenu">
						<a href="account.html"> Login/Signup </a>
					</td>
					<td class="navmenu">
						<a href="music.html"> Music </a>
					</td>
					<td class="navmenu">
						<a href = "about.html"> About Us </a>
					</td>
				</tr>
			</table>
		</div>
		<div id="det">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "hello";
			$dbname = "wt";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error) {
				echo "<h1>FAILED</h1>";
				die("Connection failed : ".$conn->connect_error);
			}

			extract($_POST);

			$sql = "SELECT * FROM data";
			$result = $conn->query($sql);

			$found = false;

			while($row = $result->fetch_assoc()) {
				if($row["user"] == $uname) {
					$found = true;
					break;
				}
			}

			if($found) {
				if($row["pass"] == $pwd) {
					echo "<h1>Welcome ".$row["user"]."!</h1><h2>Your last recorded weight was ".$row["weight"]."</h2>";
					echo "<h1>Your current weight is ".$weight."</h1>";

					$sql = "UPDATE data SET weight=".$weight." WHERE user='".$uname."'" ;
					$conn->query($sql);
				}
				else {
					echo "<h1>Incorrect password!</h1>";
				}
			}
			else {
				echo "<h1>Invalid username and password!</h1>" ;
			}


		?>
		</div>
	</body>
</html>