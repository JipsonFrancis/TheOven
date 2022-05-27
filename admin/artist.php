<?php
 include '../php/connect.php';
 session_start();

 $result = mysqli_query($conn, 'SELECT * from Artist');
 if(!$result){
   echo "<br /> error selecting ARTISTS " . mysqli_error($conn);
   exit();
 }
 while($row = mysqli_fetch_array($result)){
   $artists[] = $row['Artist_Name'];
 }

 ?>
 <!DOCTYPE html>

 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>The Oven Adminstrator</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../css/AdminMod.min.css">

   <link rel="stylesheet" href="../css/skins/skin-yellow.min.css">
    <style>
       
          .users-list>li img {
          border-radius :50%;
          max-width:100px;
          height:100px;
          }
        
        .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);

    box-shadow: none;
    border-color: #eee;
    text-shadow: 2px 3px 0px black;
    box-shadow: 2px 4px 6px black;
    text-shadow: 0 0 0px black;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
    </style>

   <!-- Google Font -->
   <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>

 <body class="hold-transition skin-yellow sidebar-mini">
 <div class="wrapper">

   <!-- Main Header -->
   <header class="main-header">

     <!-- Logo -->
     <a href="index2.html" class="logo">

       <span class="logo-lg"><b>THE</b>OVEN</span>
     </a>

     <!-- Header Navbar -->
     <nav class="navbar navbar-static-top" role="navigation">
       <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
       </a>
       <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">

           <!-- User Account Menu -->
           <li class="dropdown user user-menu">
             <!-- Menu Toggle Button -->
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <!-- The user image in the navbar-->
               <img src="<?php echo $_SESSION['imagelocation']; ?>" class="user-image" alt="User Image">
               <!-- hidden-xs hides the username on small devices so only the image appears. -->
               <span class="hidden-xs"><?php echo $_SESSION['name']?></span>
             </a>
             <ul class="dropdown-menu">
               <!-- The user image in the menu -->
               <li class="user-header">
                 <img src="<?php echo $_SESSION['imagelocation']; ?>" class="img-circle" alt="User Image">

                 <p>
                   <?php echo $_SESSION['name']?> - host
                   <small>Member since 2019</small>
                 </p>
               </li>
               <!-- Menu Body -->

               <!-- Menu Footer-->
               <li class="user-footer">
                 <div class="pull-left">
                   <a href="#" class="btn btn-default btn-flat">Profile</a>
                 </div>
                 <div class="pull-right">
                   <a href="#" class="btn btn-default btn-flat">Sign out</a>
                 </div>
               </li>
             </ul>
           </li>
          
         </ul>
       </div>
     </nav>
   </header>
   <!-- Left side column. contains the logo and sidebar -->
   <aside class="main-sidebar">

     
     <section class="sidebar">



       <!-- Sidebar Menu -->
       <ul class="sidebar-menu" data-widget="tree">
         <li class="header">PAGES</li>
         <!-- Optionally, you can add icons to the links -->
         <li><a href="adminDashboard.php"><i class="fa fa-link"></i> <span>add adminstrator</span></a></li>
         <li class="active"><a href="#"><i class="fa fa-link"></i> <span>add artists</span></a></li>
         <li><a href="adminstratorTask.php"><i class="fa fa-link"></i> <span>adminstrator task</span></a></li>

       </ul>
       <!-- /.sidebar-menu -->
     </section>
     <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Artists
         <small>add Artist</small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
         <li class="active">Here</li>
       </ol>
     </section>
    

     <!-- Main content -->
     <section class="content container-fluid">
<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- adminssssssssssssssssssssssssssssssssssssssssss -->
  <div>
            <!-- admin list -->
            <div class="box box-warning col-md-12">
              <div class="box-header with-border">
                <h3 class="box-title">All Artists</h3>

                <div class="box-tools pull-right">

                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                   <?php  foreach ($artists as $artist): ?>
                  <?php $sql_3="SELECT Img_Location FROM Artist WHERE Artist_Name='$artist'";
                  $result_2=mysqli_query($conn,$sql_3);
                  while($row_2 = mysqli_fetch_array($result_2)){
                         $image=$row_2['Img_Location'];
                        } ?>
                  <li>
                    <img src=" <?php echo $image; ?>" alt="User Image">
                    <a class="users-list-name" href="#tohisvideoprobably"><?php echo $artist; ?></a>
                    <a href="?delete<?php echo $artist; ?>" class="fa fa-close" ></a>
                  </li>
                   <?php endforeach; ?>

                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
<!-- enter adminsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss -->

<div class="box box-warning col-md-6">
            <div class="box-header with-border">
              

                 
                      <h3 class="box-title">add an Artist</h3>
                  
                  <!-- </li> -->
              

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="../php/addArtist.php" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="InputName">Artist-Name</label>
                  <input type="name" name="InputName" class="form-control" id="InputName" placeholder="Enter Full Name">
                </div>

                <div class="form-group">
                  <label for="InputInstaLink">InstaHandle</label>
                  <input type="name" class="form-control" name="InputInstaLink" id="InputInstaLink" placeholder="Enter Instagram link">
                </div>

                <div class="form-group">
                  <label for="InputTwitter">TwitterHandle</label>
                  <input type="name" class="form-control" name="InputTwitter" id="InputTwitter" placeholder="Enter Twitter handle">
                </div>

                <div class="form-group">
                  <label for="Facebook">FaceBookHandle</label>
                  <input type="name" class="form-control" name="Facebook" id="Facebook" placeholder="Enter facebookLink">
                </div>

                <div class="form-group">
                  <label for="ContactNumber">ContactNumber</label>
                  <input type="name" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="Enter phone number">
                </div>

                 <div class="form-group">
                  <label for="Art">Art</label>
                  <input type="name" class="form-control" name="Art" id="art" placeholder="Enter Your Art">
                </div>
                
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                </div>

                
                <div class="form-group">
                  <label for="artFile">image source</label>
                  <input type="file" name="artFile" id="artFile">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning add">add</button>
                <button type="submit" disabled class="btn btn-success add">update</button>
              </div>
            </form>

            <div class="form-group">
                  <label>Select Art</label>
                  <select multiple="" class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
          </div>
        






<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">

<a href="mailto:princefranklinemwase@gmail.com"> <strong>UI HEXED &copy; 2019 .</strong></a>
</footer>



   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 3 -->
 <script src="../js/jquery.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/admin.min.js"></script>


 </body>
 </html>
