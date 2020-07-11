
<?php
ob_start();
echo' <link rel="stylesheet" href="portfolio.css">';
	//get values pass from form in login.php file
	if(isset($_POST['insert'])){
    $connect = mysqli_connect("localhost","root","");
  $username = $_POST['username'];
  $password = $_POST['pass'];
  $conpass = $_POST['conpass'];


//prevent mysql injection
$username =stripcslashes($username);

$password = stripcslashes($password);
$conpass = stripcslashes($conpass);
$salt1 = 'scram';
$salt2  = 'crack';
$salt3 = 'mozambiq';
$pass1 = md5($password);
$pass2 = crypt($salt1,$pass1);
$con1 = md5($conpass);
$con2 = crypt($salt2,$con1);
$user1 = crypt($salt3,$username);
$username =mysqli_real_escape_string($connect,$_POST['username']);
$password = mysqli_real_escape_string($connect,$_POST['pass']);
$conpass =mysqli_real_escape_string($connect,$_POST['conpass']);



//connect to the server and select database

mysqli_select_db($connect,"duratek");

//query the database for user
if($username !==""  && $password !==""  && $conpass !=="" ){
  
  
	$result = mysqli_query($connect,"INSERT INTO admin_reg (username,password,conpass) VALUES ('$user1','$pass2','$con2')")
 or die("Failed to enter database ");
 
 echo '<script>alert("registration successful")</script>'.mysqli_error($connect) ;
 $loginsuccessurl = $base_url.'login.php';
	  header('location:'.$loginsuccessurl);
}
else{
	echo '<script>alert("please enter the right details")</script>'.mysqli_error($connect) ;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="portfolio.css">
    <!--link href="https://fonts.googleapis.com/css?family=play" rel="stylesheet"-->



</head>
<style>
	/* login page */
body{
  background-color:rgb(46, 6, 23);
  text-align: center;
  
  background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(15,0,4, 0.98) 100%), url("pics/desktop1.jpg") center  no-repeat fixed;
    background-size: cover;  
}
#adminregistrationbutton{
  
  color:white;
  font-size: 30px;
  font-weight: 100;
  text-align: center;
  background-color: rgb(46, 6, 23);
  padding: 0 40px;
  margin: 20px 0;
  border-radius: 10px;
}
#main_con,#main_con2{
  
  background-color: rgb(128, 128, 128,.2);
  background-size: 100%;
  
  height: 89%;
  width: 90%;
  margin-left: 50%;
  transform: translateX(-50%);
 
 
}
#frm{
  
  background-image: url('../pictures/.jpg');
  background-size: 100%;
  position: absolute;
  margin-left: 50%;
  transform: translateX(-50%);
  top: 25%;
  
  
  
}
label{
  color:white;
  font-size: 20px;
  
}
input{
  font-size: 17px;
}
#frm {
  display: block;
}
#btn{
  color:white;
  font-size: 30px;
  font-weight: 100;
  text-align: center;
  background-color: rgb(46, 6, 23);
  padding: 0 40px;
  margin: 20px 0;
  border-radius: 10px;
}
#btn:hover{
  
  color: cadetblue;
}

.form a:hover{
  color: cadetblue;
  outline-color: cadetblue;
}
.form p{
  color:gray;
}
</style>
<body onload=load()>
    <div id="loader"></div>
    <header>
      <div class="container">
        <nav>
          <div class="nav-brand">
            <a href="#home"><img src="pics/cropped.png" alt=""></a>
            
          </div>
<h4 class="name">Duratek ICT & Circuits LTD</h4>
          <div class="menu-icons open">
            <i class="icon ion-md-menu"></i>
          </div>

          <ul class="nav-list">
            <div class="menu-icons close">
              <i class="icon ion-md-close"></i>

            </div>
            <li class="nav-item " >
              <a data-page="home" href="#home" class="nav-link  ">Home</a>
            </li>
            <li class="nav-item">
              <a data-page="project" href="#services" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a data-page="about" href="#about" class="nav-link">About</a>
            </li>
            
            <li class="nav-item">
              <a data-page="contact" href="#contact" class="nav-link">contact</a>
            </li>

            <li class="nav-item">
              <a data-page="experts" href="experts.html" class="nav-link">Experts</a>
            </li>
            <li class="nav-item">
              <a data-page="post" href="login.php" class="nav-link">post</a>
            </li>
            <div class="indicator"></div>
          </ul>
        </nav>
      </div>
    </header>
	<style>
		.fa{
			background-color:rgba(45,0,12,0.94);
			position: fixed;
            left: .5px;
    		bottom: .1px;
   			line-height: 40px;
			border-color:rgba(45,0,12,0.94);
			box-shadow:none;
		}
		.fa1{
		background-color:rgba(45,0,12,0.94);
		position: fixed;
    	right: .5px;
    	bottom: .1px;
	    line-height: 40px;
	    border-color:rgba(45,0,12,0.94);
		}
	</style>
    <div id="main_con">
        <div id="frm">
			<form class="form" action="signup.php" method="POST">
				<p>
                <input type="text" name="username" placeholder="UserName"><br><br>
                   
					
				</p>
				<p>
                   
                    <input type="password" name="pass" placeholder="password"><br><br>
                    <input type="password" name="conpass" placeholder="confirm password"><br><br>
					
				</p>
				<p>
              
					
                <input type="submit" id="insert" name="insert" class="btn2" value="sign up"><br><br>
                </p>
                <p id="cust-p">already have an account! </p>
                <a  href="login.php" class="btn2" >LOGIN</a>
			</form>
		</div>
    </div>
		
		
    <footer>

  
<p>&copy;2020 Brian Mwenda: All Rights observed</p>
</footer>

	</body>
</html> 
<script type="text/javascript" src="portfolio.js"></script>
<script>
    function load(){
      document.getElementById('loader').style.display = 'none';
    }

  </script>