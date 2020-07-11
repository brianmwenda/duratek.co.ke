<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duratek shop</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="portfolio.css">
</head>


        
    <body onload=load()>
        <div id="loader"></div>
    
        <header>
          <div class="container">
            <nav  id="nav">
              <div class="nav-brand">
                <a href="#home"><img src="pics/cropped.png" alt=""></a>
                
              </div>
    <h4 class="name">Duratek ICT & Circuits LTD</h4>
              <div class="menu-icons open">
                <i class="icon ion-md-menu"></i>
              </div>
    
              <ul class="nav-list" id="nav2">
                <div class="menu-icons close">
                  <i class="icon ion-md-close"></i>
    
                </div>
                <li class="nav-item " >
                  <a data-page="home" href="index.html" class="nav-link  ">Home</a>
                </li>

              
                
                <li class="nav-item">
                  <a data-page="contact" href="index.html" class="nav-link">contact</a>
                </li>
    
                <li class="nav-item">
                  <a data-page="experts" href="experts.html" class="nav-link">Experts</a>
                </li>
                <li class="nav-item">
                  <a data-page="Gallery" href="#" class="nav-link" style="text-decoration: underline;text-decoration-color: #eb648c;">Gallery</a>
                </li>
                <li class="nav-item dropdown" onclick="">
              <a class="dropbtn nav-link">
                Settings
              </a>
              <div class="dropdown-content">
                <a data-page="login" href="login.php" class="nav-link">Login</a>
                <div class="toggles">
                  <a class="nav-link"><i class=" icon ion-ios-moon" id="moon" ></i></a>
                <a class="nav-link"><i class=" icon ion-ios-sunny" id="sunny"></i></a>
                </div>
              </div>
              
            </li>
                <div class="indicator"></div>
              </ul>
            </nav>
          </div>
        </header>
        <!--===============database query display=======================-->

            
                    
                
              
        <section class="conttitle">
            <h4>GALLERY</h4>
            
        </section>

       <br>

<div id="shop-arr">
    <?php
     $connect = mysqli_connect("localhost","root","");
    mysqli_select_db($connect,"duratek");
    $query = "SELECT * FROM duratekbase ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)){
    
        echo '<div class="adventure-grid-item" style="background-color:white"> ';
                echo '<img width="300px" height="300px" id="img" src="data:image/jpg ; base64, '.base64_encode($row['images']).'"/>';
                 echo "<p>".$row['texts']."</p>";
        echo '</div>';
    }
   ?>

</div>
<div class="sidelink">
  
  <a id="first"  href="https://api.whatsapp.com/send?phone=+254 713965223"><i  class="icon ion-logo-whatsapp"></i></a>
  <a id="sec" href="https://www.instagram.com/ndumbamugambi/"><i class="icon ion-logo-instagram"></i></a>
  
  <a id="tr" href=https://www.linkedin.com/feed><i class="icon ion-logo-linkedin"></i></a>
</div>
<footer>

  
<p>&copy;2020 Brian Mwenda: All Rights observed</p>
</footer>
        <div id="move" onclick=topFunction()>
            <span  class="fa fa-angle-up"></span>
        </div>
        
        
        <script src="portfolio.js"></script>
        <script src="expertsdarkmode.js"></script>
</body>
</html>
<script>
//=========================scroll up button======================//
    //Get the button
    var mybutton = document.getElementById('move');

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 0) {
      mybutton.style.display = "";
      document.querySelector(".sidelink").style.display = 'none';
    } else {
      mybutton.style.display = "none";
      document.querySelector(".sidelink").style.display = '';
    }
  }
  
        
    // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>

<script>
    function load(){
      document.getElementById('loader').style.display = 'none';
    }

  </script>