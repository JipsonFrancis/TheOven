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
    <!-- <link rel="stylesheet" href="./css/main.css"> -->

    <!-- Favicons -->

  </head>
  <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" data-navbar="fixed" >
                <div class="container">

                  <div class="navbar-left">
                    <button class="navbar-toggler" type="button">&#9776;</button>
                    <a class="navbar-brand" href="#theOven">
                      <img class="logo-dark" src="./img/LO.png" alt="logo" width="80px" >
                    </a>
                  </div>

                  <section class="navbar-mobile">
                    <nav class="nav nav-navbar ml-auto">
                      <a class="nav-link" href="./index.html#headlines">headlines</a>
                      <a class="nav-link" href="./talents.php">talents</a>
                      <!-- <a class="nav-link" href="#">artists</a> -->
                      <a class="nav-link" href="./index.html#videos">videos</a>
                      <a class="nav-link" href="./feedback.html">feedback</a>
                      <a class="nav-link" href="./index.html#team">Our team</a>
                    </nav>
                  </section>

                </div>
              </nav><!-- /.navbar -->

    <main class="main-content">
            <section class="section text-white py-11" style="background-image: url(./img/bk.png)" data-overlay="7">
                <div class="container" >
                  <div class="row">
                    <div class="col-md-8 mx-auto">

                      <h2 class="text-center mb-8">THE OVEN</h2>

                      <form class="row gap-y input-line"  style="background-image: linear-gradient(180deg, #fba30031 0%, #eba014de 0%, transparent 100%);" method="POST" action="../php/login.php">
                        <div class="col-md-4 ml-auto">
                          <input type="text" class="form-control" id="name" placeholder="Name" name="Name">
                        </div>

                        <div class="col-md-4 mr-auto">
                          <input type="password" class="form-control" id="password" placeholder="password" name="password">
                        </div>

                        <div class="col-12 text-center">
                          <button id="login" class="btn btn-lg btn-warning" type="submit" href="..php/login.php">LOGIN</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </section>

              <div id="popup-slide-up" class="popup col-6 col-md-4 " data-animation="slide-up" style="    background: none;    border-style: none;    color: red;">
              <button type="button" class="close" data-dismiss="popup" aria-label="Close">
               
              </button>
              <div class="media">
                <div class="media-body">
                  
                  <p class="mb-0">Please enter correct details</p>
                </div>
              </div>
            </div>

    </main>

<script src="../js/TweenMax.min.js"></script>
    <script src="../js/TimelineMax.min.js"></script>
  <script src="../js/page.min.js"></script>
  <script src="../js/script.js"></script>
  <script>
    if (window.location.hash != "")
        $(".popup").toggleClass("show")

      
    let logiVer = ()=>{
       $("#login").click((event)=>{
        $(".popup").toggleClass("show")
           if($("#name").val() === ""){
        
               TweenMax.from($("#name"), 2, {x:-20, ease:Elastic.easeOut})
               event.preventDefault();
           }else if($("#password").val() === ""){

               TweenMax.from($("#password"), 2, {x:20, ease:Elastic.easeOut})
               event.preventDefault();
           }
          
       })
        
    }
    logiVer();

  </script>

</body>
</html>
