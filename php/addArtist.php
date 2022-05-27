<?php 
	include 'connect.php';

	$name=$_POST['InputName'];
	$instahandle=$_POST['InputInstaLink'];
	$twitterhandle=$_POST['InputTwitter'];
	$facebookprofile=$_POST['Facebook'];
	$contactnumber=$_POST['ContactNumber'];
	$description =$_POST['description'];
	$art=$_POST['Art'];

	$lower_art=strtolower($art);
    $normal_art=ucwords($lower_art);

    


	$image_name=$_FILES['artFile']['name'];
    $tmp_name=$_FILES['artFile']['tmp_name'];
    $image_size=$_FILES['artFile']['size'];
    $location='../uploads/images/artist/';
    $image_location=$location.$image_name;

    //-------------------------------ArtistCHEck------------------------------------------------
    $valsql="SELECT * FROM Artist";
    $valresult=mysqli_query($conn,$valsql);

    while ($valrow=mysqli_fetch_array($valresult)) {
        if ($contactnumber==$valrow['ContactNumber']) {
            die("Contact number already exists");
        }
        elseif ($name==$valrow['Artist_Name']) {
            die("Host Name already exists");
        }elseif ($instahandle==$valrow['InstaHandle']) {
            die("Instagram Handle already registered with");
        }
        elseif ($twitterhandle==$valrow['TwitterHandle']) {
            die("Twitter Handle already registered with");
        }
        elseif ($facebookprofile==$valrow['FacebookProfile']) {
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

	if(!mysqli_query($conn,$sql_4)){
	echo "err " . mysqli_error($conn);
	}

   // mysqli_query($conn,$sql_4);
    $art_id = mysqli_insert_id($conn);
    $sql_2="INSERT INTO Artist (Artist_Name,InstaHandle,TwitterHandle,FacebookProfile,ContactNumber,Img_Location,description) 
    VALUES('$name','$instahandle','$twitterhandle','$facebookprofile','$contactnumber','$image_location','$description');";
    if(!mysqli_query($conn,$sql_2)){
	echo "err " . mysqli_error($conn);
	}

    $sql_3="INSERT INTO Artist_has_Art_Form (Artist_Name,Art_ID) VALUES('$name','$art_id')";
    //mysqli_query($conn,$sql_3);
	if(!mysqli_query($conn,$sql_3)){
	echo "err " . mysqli_error($conn);
	}

   






 ?>
