<?php
require_once 'database.php';
 use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])) {
$field = $_POST['field'];
$answer = $_POST['answer'];
$test = $_POST['test'];

if($field == "visible"){

 $sql = "UPDATE revision SET visible = '$answer' WHERE test = '$test'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}

if($field == "result"){

 $sql = "UPDATE revision SET result = '$answer' WHERE test = '$test'";

if(mysqli_query($conn,$sql)) {
$sqlll = "SELECT * FROM revision where test = '$test'";
$ress = mysqli_query($conn,$sqlll);
$msg = "<b><big><u>JEE Main & Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br>";

while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field == "date"){
        $msg = $msg."<b>Date & Time : </b>$value<br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "syllabus"){
        $msg = $msg."<b>Syllabus : </b>$value<br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "qp"){
        $msg = $msg."<b>Question Paper : </b><a href = 'http://jee-main.000webhostapp.com$value'>Click Here</a><br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "key_link"){
        $msg = $msg."<b>Key : </b><a href = 'http://jee-main.000webhostapp.com$value'>Click Here</a><br></br><br></br>";
        $key_img = $value;
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "sol"){
        $msg = $msg."<b>Solutions : </b><a href = 'http://jee-main.000webhostapp.com$value'>Click Here</a><br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "result"){
        $msg = $msg."<b>Result : </b>$value";
        // I just did not use "htmlspecialchars()" function. 
        }
        
    }
}

        $msg = $msg."<br></br><br></br><b> Key : </b><br></br><img src='http://jee-main.000webhostapp.com$key_img'></img>";

  $mail = new PHPMailer(true);                              
try {
    $mail->IsHTML(true);

    $mail->isSMTP(); // using SMTP protocol                                     
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'tvsvishnu2002@gmail.com';  // sender gmail host              
    $mail->Password = '9652353102'; // sender gmail host password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     

    $mail->setFrom('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan"); // sender's email and name
    $mail->addAddress('jee2021@googlegroups.com', "JEE Main & Advanced 2021");  // receiver's email and name
    $mail->AddCC('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan");

    $mail->Subject = "$test Report";
    $mail->Body = '<span style="font-family:Roboto, sans-serif; font-size:14px">'.$msg.'</span>';


   $mail->send();
   
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

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
    <title>JEE Main & Advanced 2021</title>
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
JEE Main & Advanced 2021              </h1>
    </div>
</section>


        <section class="marqueesection">

            <marquee behavior="alternate" direction="left" class="marqueestyle" onmouseover="this.stop();" onmouseout="this.start();">
                <span class="marqueetext">JEE Main & Advanced 2021</span>
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

<h3 class="pageheading"><b>JEE Main & Advanced 2021 Maths Result</b></h3>

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
<label for="field">Type : </label>
</b>
<select name="field" id="field">
      <option value="" selected disabled hidden>Select</option>
  
    <option value="visible">Display</option>
    <option value="result">Result</option>


</select> <br></br>
<b>Result :</b> <input type = "text" name = "answer"></input><br></br>


<CENTER><button type="submit" name="submit" > Submit </BUTTON></div></div>


</center><br></br></br></br></div></div></div></div></form>
</section>