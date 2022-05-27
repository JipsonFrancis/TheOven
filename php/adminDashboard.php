<?php
 require_once 'connect.php';
 $conn = mysqli_query($link, 'SELECT HOST_Name from Host');
 if(!$result){
   echo "<br /> error selecting HOSTS " . mysqli_error($conn);
   exit();
 }
 while($row = mysqli_fetch_array($conn)){
   $hosts[] = $row['HOST_Name'];
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
               <img src="../img/mash.jpg" class="user-image" alt="User Image">
               <!-- hidden-xs hides the username on small devices so only the image appears. -->
               <span class="hidden-xs">Mic Mash</span>
             </a>
             <ul class="dropdown-menu">
               <!-- The user image in the menu -->
               <li class="user-header">
                 <img src="../img/mash.jpg" class="img-circle" alt="User Image">

                 <p>
                   Mic Mash - host
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
           <!-- Control Sidebar Toggle Button -->
           <li>
             <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
         <li class="header">HEADER</li>
         <!-- Optionally, you can add icons to the links -->
         <li class="active"><a href="#"><i class="fa fa-link"></i> <span>add adminstrator</span></a></li>
         <li><a href="artist.php"><i class="fa fa-link"></i> <span>add artists</span></a></li>
         <li><a href="#"><i class="fa fa-link"></i> <span>adminstrator stuff</span></a></li>

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
         Adminstrators
         <small>add admin</small>
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
<div class="col-md-6">
            <!-- admin list -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">All Members</h3>

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

                  <li>
                    <img src="../img/mash.jpg" alt="User Image">
                    <a class="users-list-name" href="#tohisvideoprobably">Mic Mash</a>
                  </li>

                  <?php  foreach ($hosts as $host): ?>
                  <li>
                    <img src="../img/mash.jpg" alt="User Image">
                    <a class="users-list-name" href="#tohisvideoprobably"> <?php echo $host; ?> </a>
                  </li>
                  <?php endforeach; ?>

                </ul>
                <!-- /.users-list -->
              </div>

              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
<!-- enter adminsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss -->

<div class="box box-primary col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">add a HOST</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="?" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="InputName">Host-Name</label>
                  <input type="name" class="form-control" name="InputName" id="InputName" placeholder="Enter Name">
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
                  <input type="name" class="form-control" name="ContantNumber" id="ContantNumber" placeholder="Enter phone number">
                </div>
                <div class="form-group">
                  <label for="InputPassword1">Password</label>
                  <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="InputFile">image source</label>
                  <input type="file" name="InputFile" id="InputFile">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary add">add</button>
              </div>
            </form>
          </div>






<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- Main Footer -->
   <footer class="main-footer">
     <!-- To the right -->
     <div class="pull-right hidden-xs">
       hariis, jipi
     </div>
     <!-- Default to the left -->
     <strong>UI HEXED &copy; 2019 <a href="#">Company</a>.</strong> our craftman ship
   </footer>



   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 3 -->
 <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/admin.min.js"></script>
 <script src="../js/admin.main.js"></script>


 </body>
 </html>
