<?php include '../php/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>The Oven</title>

    <!-- Styles -->
    <link href="../css/page.css" rel="stylesheet">
    <link href="../css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <script type="text/javascript" src="../js/Modal_js.js"></script>
    

    <!-- Favicons -->
<style>
  .vanish{
    display: none;

  }
  .h-150 {
    height: 100% !important;
}
.backdrop-navbar {
    background-color: #ffba0000;
    z-index: 1001;
}
.navbar-expand-lg .navbar-mobile {

    background-color: #eba116;
}
.detail{
    overflow: overlay;
    max-height: 400px;
	min-height: 400px;
}
.pagenation{
  background-color: #eba116;
  border-style: none;
  box-shadow: 3px 3px 4px 0px black;
}
 .pagenation:hover{
  background-color: #eba116;
  border-style: none;
  box-shadow: 0px 0px 4px 0px black;
} 
.pagenation:active{
  background-color: #161b35;
    border-color: #161b35;
}
.latest{
  background-color:transparent;
  border-style: none;
}
.latest:hover{
    box-shadow: 0px 0px black;
    cursor: default;
  background-color:transparent;
  border-style: none;
}
.latest:active{

background-color:none;
}
.slidesearch{
  opacity: 0;
  padding: 0px;
    width: 0;
  /* width: 120px; */
    height: 30px;
    margin-top: 10px;
    background-color: #eba116;
    border-color: black;
    border-radius: 0px;

}
.slidesearch:focus{
  background-color: transparent;
  border-color: black;
  
}

</style>

  </head>

  <body onload="modal_process()" id="theOven">


     <?php 

//Getting page number
   if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } 
    else {
        $pageno = 1;
      }
//Number of records to be shown per page
  $no_of_records_per_page = 4;
  $offset = ($pageno-1) * $no_of_records_per_page;
//Get total Number of pages
  $total_pages_sql = "SELECT COUNT(Artist_Name) FROM artist";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
//Selecting query for pagination
  $sql = "SELECT * FROM artist LIMIT $offset, $no_of_records_per_page";

  $result = mysqli_query($conn,$sql);
             if(!$result){
               echo "<br /> error selecting Artists " . mysqli_error($conn);
               exit();
               }
             while($row = mysqli_fetch_array($result)){
               $artists[] = $row['Artist_Name'];
                }


  ?>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" data-navbar="fixed" >
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="./index.html">
            <img class="logo-dark" src="./img/LO.png" alt="logo" width="80px" >
          </a>
        </div>

        <section class="navbar-mobile">
          <nav class="nav nav-navbar ml-auto">
            <a class="nav-link" href="./index.html#headlines">headlines</a>
            <a class="nav-link" href="./talents.php">talents</a>
            <!-- <a class="nav-link" href="#">artists</a> -->
            <a class="nav-link" href="./index.html#videos">videos</a>
            <a class="nav-link" href="#">feedback</a>
            <a class="nav-link" href="#">contact</a>
            <a class="nav-link fa fa-search"  id="sIcon" href="#" data-toggle="offcanvas" data-target="#offcanvas-search-3"></a>

          </nav>
        </section>

      </div>
    </nav><!-- /.navbar -->




    <!-- Main Content -->
    <main class="main-content">

        <section class="section p-0">
            <div class="container">

              <div class="row">
                <div class="col-md-12 col-xl-12 mx-auto">





                  <hr style="color:transparent;     border-top-color: #b37b7b00;">
                  <hr style="color:transparent;     border-top-color: #b37b7b00;">
                  <hr style="color:transparent;     border-top-color: #b37b7b00;">
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="tester"></div>
    <div class="row gap-y gap-1" >

      <?php  foreach ($artists as $artist): ?>
                  <?php $sql_3="SELECT Img_Location FROM artist WHERE Artist_Name='$artist'";
                  $result_2=mysqli_query($conn,$sql_3);
                  while($row_2 = mysqli_fetch_array($result_2)){
                         $image=$row_2['Img_Location'];
                        }?>

      <div class="col-6 col-lg-3">
        <div class="card shadow-1 hover-shadow-6">
          <a class="p-1" href="#" data-toggle="modal" data-target="#modal-register-3">
            <img class="" src="<?php echo $image; ?>" alt="screenshot">
          </a>
          <div class="card-body flexbox">
            <h6 class="mb-0">
              <a class="small" href="#" data-toggle="modal" data-target="modal-register-3" id="give_name"> <?php echo $artist; ?></a>

            </h6>
            <div>
    <a class="text-inherit small-2" href="#"><i class="fa fa-facebook pr-1 opacity-60"></i> </a>
    <a class="text-inherit small-2" href="#"><i class="fa fa-twitter pr-1 opacity-60 "></i> </a>
    <a class="text-inherit small-2" href="#"><i class="fa fa-instagram pr-1 opacity-60 "></i> </a>
    </div>
          </div>
        </div>
         
      </div>
      <?php endforeach; ?>
     </div>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


                  <hr>



                </div>
              </div>

<!-- -------------------------------------------------------paging buttons start------------------------------------------------->
              <nav class="flexbox mb-2">
                  <a class="<?php if($pageno <= 1){ echo 'btn btn-primary  latest'; } else {echo "btn btn-primary pagenation";} ?>" href="<?php if($pageno>1){ echo '?pageno=1';} else{echo '#';} ?>"><i class="fa fa-angle-left mr-1"></i>First</a>
                <a class="<?php if($pageno <= $total_pages && $pageno>1){ echo 'btn btn-primary pagenation'; } else {echo "btn btn-primary  latest";}?>" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous <i class="fa fa-angle-left ml-1"></i></a>
                <span><?php echo $pageno; ?>|<?php echo $total_pages; ?></span>
                <a class="<?php if($pageno >=$total_pages){echo 'btn btn-primary latest';} else{ echo 'btn btn-primary pagenation';} ?>" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-angle-right mr-1"></i> Next</a>

                <a class="<?php if($pageno == $total_pages){echo 'btn btn-primary latest';} else{ echo 'btn btn-primary pagenation';} ?>" href="<?php if($pageno<$total_pages){ echo '?pageno='.$total_pages;} else{echo '#';} ?>">Last <i class="fa fa-angle-right ml-1"></i></a>
              </nav>
<!-- -------------------------------------------------------paging buttons end------------------------------------------------->              
              <nav class="flexbox mb-2">


              </nav>

            </div>
          </section>

    </main>


    <!--



     -->

    <!-- Footer -->
    <footer class="footer text-white bg-img bg-fixed" style="background-image: url(../assets/img/vector/9.jpg)" data-overlay="8">

      <hr>

      <div class="container">
        <div class="row gap-y">

          <div class="col-md-6 text-center text-md-left">
            <small class="opacity-70">© UI hexed. </small>
          </div>

          <div class="col-md-6 text-center text-md-right">
            <div class="social">
              <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="social-youtube" href="#"><i class="fa fa-youtube"></i></a>
              <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->

<?php  foreach ($artists as $artist): ?>

       <?php $sql_3="SELECT Img_Location,description FROM artist WHERE Artist_Name='$artist'";
                  $result_2=mysqli_query($conn,$sql_3);
                  while($row_2 = mysqli_fetch_array($result_2)){
                         $image=$row_2['Img_Location'];
                         $description=$row_2['description'];
                        }
                        ?>


    <!-- modal ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="modal fade" id="modal-register-3" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-body p-md-0">
              <div class="row no-gutters" id="modal_image">
                

                <div class="col-md-8 col-xl-5 mx-auto detail">
                  <div id="modal_name">

                  <div id="modal_description">
                  <div>
                    <a class="text-inherit small-2" href="#"><i class="fa fa-facebook pr-1 opacity-60"></i> </a>
                    <a class="text-inherit small-2" href="#"><i class="fa fa-twitter pr-1 opacity-60 "></i> </a>
                    <a class="text-inherit small-2" href="#"><i class="fa fa-instagram pr-1 opacity-60 "></i> </a>
                  </div>

          </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- end modal //////////////////////////////////////////////////////////////////////////////////////-->

    <!-- canvas //////////////////////////////////////////////////////////////////////////////////////-->
    <div id="offcanvas-search-3" class="offcanvas text-white h-150" data-animation="slide-down" style="background-color: rgba(0,0,0,0.95)">

      <div class="row align-items-center text-center h-100">
        <div class="col-md-8 mx-auto ">
          <div class="row">

            <div class="col">

                <input class="form-control form-control-lg border-0 lead-3" id="search" type="text" name="search" placeholder="search here...">

            </div>

            <div class="col-auto">
              <button type="button" class="close position-static" data-dismiss="offcanvas" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?> 

    <!-- canvas //////////////////////////////////////////////////////////////////////////////////////-->



    <!-- Scripts -->
	<script src="../js/TweenMax.min.js"></script>
    <script src="../js/TimelineMax.min.js"></script>
    <script src="../js/page.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/main.js"></script>
    <script>


      jQuery("#search").keydown((e)=>{



        if(!$("#search").val() == ""){


          if(e.key == "Enter" )
          for(let card in jQuery(".col-6")){

            if(!jQuery(".col-6")[card].innerText.includes($("#search").val())){


                jQuery(".col-6")[card].classList.toggle("vanish");



            }


        }


        }
        jQuery(".close").click(()=>{
            if (!$("#search").val() == "")
            for(let card in jQuery(".col-6")){

            if(!jQuery(".col-6")[card].innerText.includes($("#search").val())){


                jQuery(".col-6")[card].classList.toggle("vanish");



            }

          }
          })
    })
    </script>
  </body>
</html>
