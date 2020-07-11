<?php
ob_start();
  session_start();

  if(!isset($_SESSION['is_logged_in'])){
    $loginsuccessurl = $base_url.'index.html';
    header('location:'.$loginsuccessurl);
  }else{
    unset($_SESSION['is_logged_in']);
    
     $loginsuccessurl = $base_url.'index.html';
    header('location:'.$loginsuccessurl);
    session_destroy();
  }
?>
<link rel="stylesheet" href="duratek.css">
<script src="duratek.js"></script>
 
