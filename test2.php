<?php
require_once 'database.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if($_SESSION['test_view']==""){
    echo "<script> location.replace('http://tvsvishnu.000webhostapp.com/objective-test/test.php');</script>";
    die();

}

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>JEE Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        /* Make the image fully responsive */
    
    </style>
</head>
<body>
  <script>
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}</script>
        <div class="topstrip"></div>
    <section class="headertop">
    <div class="container-fluid"> <h1>
JEE Advanced 2021</h1>
  </div>       <div class="topstrip"></div>
  
       
        <link href="./Page_files/bootstrap.min.css" rel="stylesheet">
    <link href="./Page_files/menudropsub.css" rel="stylesheet">
    <link href="./Page_files/own.css" rel="stylesheet">
    <link href="./Page_files/opensans.css" rel="stylesheet">
    <link href="./Page_files/font-awesome.min.css" rel="stylesheet">
    <script src="./Page_files/popper.min.js.download"></script>
    <script src="./Page_files/jquery-3.4.1.min.js.download"></script>
    <script src="./Page_files/bootstrap.min.js.download"></script>
    <script src="./Page_files/jquery.flexslider-min.js.download"></script>
    <script src="./Page_files/custom.js.download"></script>

    <script>
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function () {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function () {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function () {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
        });
    </script>
    <script src="./Page_files/jquery.counterup.min.js.download"></script>
    <script src="./Page_files/jquery.waypoints.min.js.download"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
        </script>     
<center> <div class="mb-4 pagecontentpara" id="status">

<div class="row">
    <div class="column"> 
    <b>          
<b><input type="button" class="btn btn-primary btn-block btn-lg" value="<?php echo $_SESSION['test_view'].' ';?>Click for Full Screen" onclick="toggleFullScreen()">

<?php 
$tes = $_SESSION['test_view'];
$sqlllt = "SELECT * FROM revision WHERE test='$tes'";
$ress = mysqli_query($conn,$sqlllt);

 while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) {
     if($field=="qp"){
         $qp_link = "https://tvsvishnu.000webhostapp.com/objective-test/".$value;
     }  
     if($field=="key_link"){
         $key_link = "https://tvsvishnu.000webhostapp.com/objective-test/".$value;
     }
     if($field=="sol"){
         $sol_link = "https://tvsvishnu.000webhostapp.com/objective-test/".$value;
     } 
        }
     
 }
?>
<object data="<?php echo $qp_link;?>" type="application/pdf" width="680px" height="620px">
    <embed src="<?php echo $qp_link;?>" type="application/pdf">
        
    </embed>
</object>
</div>
  <div class="column"><b>          
      <object data="<?php echo $sol_link;?>" type="application/pdf" width="680px" height="500px">
    <embed src="<?php echo $sol_link;?>" type="application/pdf">
        
    </embed>
</object><br><?php echo " ";?><img src="<?php echo $key_link;?>" width="680px" height="155px"></img>
</div></div>

<style>
    .column {
  width:50%;
  
}
body {
    overflow-x : hidden;
}
/* Clear floats after the columns */

</style>

<script>
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}</script>