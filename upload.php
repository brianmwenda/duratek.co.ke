<?php
ob_start();
//delete images from the database
if (isset($_GET['del'])) {
   $connect = mysqli_connect("localhost","root","");
   mysqli_select_db($connect,"duratek");
	$id = $_GET['del'];
	mysqli_query($connect, "DELETE FROM duratekbase WHERE id=$id");

}
//==================upload the images====================

//if insert button is pressed
if(isset($_POST['insert'])){
   $connect = mysqli_connect("localhost","root","");
  //get the submitted data
  //$target = "uploads/".basename($_FILES['image']['name']);
  $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $text = $_POST['text'];
  //connect to the server and select database

mysqli_select_db($connect,"duratek");

if($text !=""){
  $result = mysqli_query($connect, "INSERT INTO duratekbase (images,texts) VALUES ('$file','$text')");
  if($result){
  
    //echo '<script> alert("image inserted into Database")</script>';
  }
  else{
    echo '<script> alert("image failed to insert into Database")</script>';
  }
  }
  else{
    echo '<script> alert("Enter correct details")</script>';
  }
  //move images to uploads folder
  // if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
  //   //echo '<script> alert("file upload complete")</script>';
  // }else{
  //   echo '<script> alert("file upload failed")</script>';
  // }

  
}
  ?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Duratek ICT & Circuits LTD</title>
    <link rel="icon" href="pics/cropped.png">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>image upload</title>
    
    <style type="text/css">

    body{
      color:white;
      background-color: rgba(45,0,12,0.94);
    
    text-align:center;

    background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(15,0,4, 0.98) 100%), url("pics/desktop1.jpg") center  no-repeat fixed;
    background-size: cover;  
  }
    #img{
      /* max-width:300px;
      max-height:300px; */
      padding:5%;
    }
   
#frm{
    
    text-align:center;
  
}
#frm2{
  margin:10px;
}
#delete_btn,#image{
    padding:0 10px;
    margin:10px;
    color:#fff;
    
    outline:none;
    cursor:pointer;
    
}
#titt{
  padding:25px 0 0 0;
  text-transform:uppercase;
  font-size:30px;
  text-decoration:underline;
}
#content{
  display:inline-flex;
  flex-direction:row;
  flex-wrap:wrap;
  margin:0 10%;
}
#img_div{
  padding:5% 0;
}
.name{
  color:black;
}

    </style>
<link rel="stylesheet" href="portfolio.css">
</head>
<body onload=load()>
        <div id="loader"></div>
    
        <!-- <header>
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
                  <a data-page="project" href="index.html" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                  <a data-page="about" href="index.html" class="nav-link">About</a>
                </li>
                
                <li class="nav-item">
                  <a data-page="contact" href="index.html" class="nav-link">contact</a>
                </li>
    
                <li class="nav-item">
                  <a data-page="experts" href="experts.html" class="nav-link">Experts</a>
                </li>
                <li class="nav-item">
                  <a data-page="Gallery" href="experts.html" class="nav-link" style="text-decoration: underline;text-decoration-color: #eb648c;">Gallery</a>
                </li>
                <div class="indicator"></div>
              </ul>
            </nav>
          </div>
        </header> -->
        <section>
        <h2 id='titt'>Upload Images</h2>
</section>
            
             
          
         
  
    <div id = "content">
    	<!--display images from database to form-->
          <?php  $connect = mysqli_connect("localhost","root","");?> 
          <?php mysqli_select_db($connect,"duratek");?>
          <?php $query = "SELECT*FROM duratekbase ORDER BY id DESC";?> 
          <?php $result = mysqli_query($connect, $query);?> 
          
          <?php while ($row = mysqli_fetch_array($result)){?> 
        
          <?php
            if($row == ""){
              echo "<p>You dont have any images in the database!<br> UPLOAD</p>";
            }
            ?>
           <div id='img_div'>
             <tr>
                  <td>
                   <?php echo '<img id="img" src="data:image/jpeg ; base64, '.base64_encode($row['images']).'"/>';?>
                 </td>
                 </tr>
                 <?php   echo "<p>".$row['texts']."</p>";?>
                  <form id="frm" method = "GET">
            
             
                 <a href='upload.php?del=<?php echo $row['id'] ?>' name="del" id="del" class='btn'>Delete</a>
                 
                   </form>
            
           </div>
           <?php } ?>
        
     
           </div>
        <form class="frm2" method = "POST" action="upload.php" enctype="multipart/form-data">
        <div>
            <input type = "file" name= 'image' id="image">
        </div>

        <div>
            <textarea name='text' cols='40' rows='4' placeholder='say something about this image...'></textarea>
        </div>

        <div>
            <input class="btn2" type ="submit" name='insert' id="insert" value="Upload"><br>
            <a id="nav_shop" href="logout.php" class="btn2">Logout</a><br>
        </div>
<br><br>
</form>

</body>
<script src="portfolio.js"></script>
</html>
<script type="text/javascript">
     $(document).ready(function(){
    $('#insert').click(function(){
    var image_name = $('#image').Val();
    if(image_name == ''){
      alert("please select image");
      return false;
    }else{
      var extension = $('#image').Val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1){
        alert('invalid image file');
        $('#image').Val('');
        return false;
      }
    }
  });
  });
</script>

<script>
    function load(){
      document.getElementById('loader').style.display = 'none';
    }

  </script>
  