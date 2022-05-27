
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
.users-list>li img {
   border-radius: 50%;
   max-width: 100px;
   height: 100px;
}
   </style>

  <!-- Google Font -->
  <link rel="stylesheet"        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        <li class="header">PAGES</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="adminDashboard.php"><i class="fa fa-link"></i> <span>add adminstrator</span></a></li>
        <li><a href="artist.php"><i class="fa fa-link"></i> <span>add artists</span></a></li>
        <li class="active"><a href="adminstratorTask.php"><i class="fa fa-link"></i> <span>adminstrator task</span></a></li>

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
        Adminstrator
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

 
    <!-- Main content -->
<section class="content">
<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- adminssssssssssssssssssssssssssssssssssssssssss -->
<div class="col-md-12">
           <!-- admin list -->
           <div class="box box-warning ">
             <div class="box-header with-border">
               <h3 class="box-title">headLine images</h3>

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
                   <a class="users-list-name fa fa-close" href="#deleteTheImage"></a>
                 </li>

               </ul>
               <!-- /.users-list -->
             </div>
             <!-- /.box-body -->
            
             <!-- /.box-footer -->
           </div>
           <!--/.box -->
         </div>
<!-- enter adminsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss -->

<div class="col-md-6">
    <!-- image input//////////////////////////// -->
    <div class="box box-primary">
            
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
          <div class="box-body">
            
            
            <div class="form-group">
              <label for="exampleInputFile">enter headline image</label>
              <input type="file" name="image" id="exampleInputFile">
            </div>
            
          </div>
          <!-- /.box-body -->
    
          <div class="box-footer">
            <button type="submit" class="btn btn-warning">Submit</button>
          </div>
        </form>
      </div>
    <!-- image input//////////////////////////// -->
    
    <!-- ////////////////////////// headline form -->
    
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Headline Text data</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Title</label>
    
              <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Title">
              </div>
            </div>
            <div class="form-group">
              <label for="content" class="col-sm-2 control-label">content</label>
    
              <div class="col-sm-10">
               
                <textarea name="content" id="" style="width: -webkit-fill-available" rows="5"></textarea>
              </div>
            </div>
    
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-warning pull-right">Update</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    <!-- ////////////////////////// headline form -->
    
    
      
</div>

<div class="col-md-6">

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
<script src="../js/bootstrap.min.js"></script>
<script src="../js/admin.min.js"></script>
<script src="../js/admin.main.js"></script>

</body>
</html>