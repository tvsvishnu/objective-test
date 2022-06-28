<?php
require_once 'database.php';
 use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submit'])) {
$answer = $_POST['answer'];
$test = $_POST['test'];
$subject=$_POST['subject'];
$sql = "SELECT * FROM revision where test='$test' and subject = '$subject'";
$res = mysqli_query($conn,$sql);
if($res->num_rows==0){
    echo "<script>alert('Test Not Found')</script>";

}
else {





 $sql = "UPDATE revision SET visible = '$answer' WHERE test = '$test' and subject = '$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}



}

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>JEE Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        /* Make the image fully responsive */
    
    </style>
</head>
<body>

    <input type="hidden" id="LangId" value="P">

    <section>
        <div class="topstrip"></div>
    </section>

<section class="headertop">
    <div class="container-fluid">

                <h1>
JEE Advanced 2021              </h1>
    </div>
</section>


        <section class="marqueesection">

            <marquee behavior="alternate" direction="left" class="marqueestyle" onmouseover="this.stop();" onmouseout="this.start();">
                <span class="marqueetext">JEE Advanced 2021</span>
            </marquee>
            
        </section>
       
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
<center>
<div class="mb-4 pagecontentpara" id="status">

<h3 class="pageheading"><b>JEE Advanced 2021 </b></h3>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<b>
<label for="test">Test : </label>

<select name="test" id="test">
 <?php
require_once 'database.php';
$sql = "SELECT * FROM revision where submitted='1' order by s_no desc";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
   echo "<option value='' selected disabled hidden>Select</option>";

    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
  if($field == "test"){
  echo "<option value='$value'>$value</option>";
        // I just did not use "htmlspecialchars()" function. 
    }}
}
?>
</select> <br></br>
<b><label for="subject">Subject : </label>
</b>
<select name="subject" id="subject">
      <option value="" selected disabled hidden>Select</option>
        <option value="Maths">Maths</option>

  <option value="Physics">Physics</option>
  <option value="Chemistry">Chemistry</option>

</select> <br></br>


<b>Text :</b> <input type = "text" name = "answer"></input><br></br>


<CENTER><button type="submit" name="submit"  class="button-tvsvishnu" >Upload Test Details </BUTTON></div></div>


</center></div></div></div></div></form>

<style>
    .button-tvsvishnu {
    background-color: #00468a !important;
    border-color: none !important;
    font-size: 16px;
    border:none;
    width : 200px;
    border-radius: 17.5px;
    height : 35px;
    color : white;
  }

</style>

