<?php
	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

	
		

		//echo '<name>';
		
		
		//echo '</name>';

		echo '<img_location>';
		include '../php/connect.php';
		$namein=$_GET['namein'];
		$getdata_sql="SELECT Artist_Name,Img_Location,description FROM artist WHERE Artist_Name = '$namein'";
		$getdata_result=mysqli_query($conn,$getdata_sql);
		while ($row=mysqli_fetch_array($getdata_result)) {
			$name=$row['Artist_Name'];
			$Img_Location=$row['Img_Location'];
			$description=$row['description'];
		}
		
		echo $Img_Location; 

		 

		echo'</img_location>';

//		echo '<description>'. $description .'</description>';

	

?>