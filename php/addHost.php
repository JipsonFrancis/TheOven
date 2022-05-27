<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>addHost</title>
</head>
<body>
<?php
  include_once 'connect.php';


  if($_SERVER['REQUEST_METHOD']=="POST"){
    $ContactNumber=$_POST['ContactNumber'];
    $InstaHandle=$_POST['InstaHandle'];
    $TwitterHandle=$_POST['TwitterHandle'];
    $FaceBookHandle=$_POST['FaceBookHandle'];
    $Art=$_POST['Art'];

    $lower_art=strtolower($Art);
    $normal_art=ucwords($lower_art);
    $Host_Name=$_POST['Host-Name'];
    $Password=$_POST['Password'];



	 // -------------------------------------------Image Validation-------------------------------------------
    //set variables
    $image_name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $image_size=$_FILES['image']['size'];
    $location='../uploads/images/host/';
    $image_location=$location.$image_name;


    //-------------------------------HostCHEck------------------------------------------------
    $valsql="SELECT * FROM host";
    $valresult=mysqli_query($conn,$valsql);
		echo "die";
    while ($valrow=mysqli_fetch_array($valresult)) {

        if ($ContactNumber==$valrow['ContactNumber']) {
            die("Contact number already exists");
        }
        elseif ($Host_Name==$valrow['Host_Name']) {
            die("Host Name already exists");
        }elseif ($InstaHandle==$valrow['InstaHandle']) {
            die("Instagram Handle already registered with") ;
        }
        elseif ($TwitterHandle==$valrow['TwitterHandle']) {
            die("Twitter Handle already registered with");
        }
        elseif ($FaceBookHandle==$valrow['FacebookProfile']) {
            die("Facebook account already registered with");
        }
        elseif ($image_location==$valrow['Img_Location']) {
            die("please, change the image name... Sorry");
        }

    }

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg",
        "gif"
    );

    // Get image file extension
    $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (! file_exists($tmp_name)) {
       $response = die("error,Choose image file to upload.");
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
         $response =die("error, Upload valid images. Only PNG, JPEG, JPG AND GIF are allowed.");

    }    // Validate image file size
    else if (($image_size > 20000000)) {
         $response = die("error,Image size exceeds 20MB");
    } else {
        if (move_uploaded_file($tmp_name, $image_location)) {
             echo $response ="success, Image uploaded successfully.";
        } else {
           	 $response = die("error, Problem in uploading image files.");
        }
    }





//--------------------------------------------DataInPut----------------------------------------------
    $sql_4="INSERT INTO Art_Form (Art) VALUES('$normal_art')";
    echo "on data insert <br>\n";
    echo $Host_Name;

    mysqli_query($conn,$sql_4);
    $art_id = mysqli_insert_id($conn);
    $sql_2="INSERT INTO Host (Host_Name,Art_ID,InstaHandle,TwitterHandle,FacebookProfile,ContactNumber,Img_Location)
    VALUES('$Host_Name','$art_id','$InstaHandle','$TwitterHandle','$FaceBookHandle','$ContactNumber','$image_location');";
    
    if(!mysqli_query($conn,$sql_2)){
        echo "\n error 1  " . mysqli_error($conn);
    }
    $host_id= mysqli_insert_id($conn);
    $sql_3="INSERT INTO Administrators (Name,Password,Host_Host_ID) VALUES('$Host_Name','$Password','$host_id')";

    //mysqli_query($conn,$sql_3);
    if(!mysqli_query($conn,$sql_3)){
        echo "\n error 2  " . mysqli_error($conn);
    }






  }


 ?>
</body>
</html>
