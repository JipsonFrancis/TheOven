<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>The Oven</title>
</head>
<body>
	<?php

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		include_once 'connect.php';

		$name=$_POST['Name'];
		$password=$_POST['password'];

		$sql_2="SELECT * FROM Administrators WHERE Name= '$name'";
		$result_2=mysqli_query($conn,$sql_2);


		if (mysqli_num_rows($result_2) == 0) {
			echo  "<script> document.location = '../user/login.php#account'  </script>";
				exit();

				}
		else{

		while ($row=mysqli_fetch_assoc($result_2)) {

			$Host_id= $row['Host_Host_ID'];
			$_SESSION['name']=$row['Name'];



			if ($name!=$row['Name'] or $password!=$row['Password']) {
				echo  "<script> document.location = '../user/login.php#wrong'  </script>";
					exit();
			}

			else
			{
				$sql_2="SELECT Img_Location FROM Host WHERE Host_ID='$Host_id'";
				$result_1=mysqli_query($conn,$sql_2);
				while ($row_2=mysqli_fetch_assoc($result_1)) {
					$_SESSION['imagelocation']=$row_2['Img_Location'];
				}
				$_SESSION['host_id']=$Host_id;
				header('Location:../admin/adminDashboard.php');
			}


		}
	}
	}




	  ?>
</body>
</html>
