<?php
require_once 'database.php';
 use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['resul'])) {
$field = $_POST['field'];
$answer = $_POST['answer'];
$test = $_POST['test'];
$subject=$_POST['subject'];
$sql = "SELECT * FROM revision where test='$test' and subject = '$subject'";
$res = mysqli_query($conn,$sql);
if($res->num_rows==0){
    echo "<script>alert('Test Not Found')</script>";

}
else {




if($field == "visible"){

 $sql = "UPDATE revision SET visible = '$answer' WHERE test = '$test' and subject = '$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}

if($field == "result"){

 $sql = "UPDATE revision SET result = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {
$sqlll = "SELECT * FROM revision where test = '$test' and subject='$subject'";
$ress = mysqli_query($conn,$sqlll);
$msg = "<b><big><u>JEE Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br>";

while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field == "date"){
        $msg = $msg."<b>Date & Time : </b>$value<br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "subject"){
        $msg = $msg."<b>Subject : </b>$value<br></br><br></br>";
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
    $mail->addAddress('jee2021@googlegroups.com', "JEE Advanced 2021");  // receiver's email and name
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
}}
}




}
if(isset($_POST['upload']))
{   

 $test = $_POST['test'];
 $subject = $_POST['subject'];
$sql = "SELECT * FROM revision where test='$test' and subject = '$subject'";
$res = mysqli_query($conn,$sql);
if($res->num_rows==0){
    echo "<script>alert('Test Not Found')</script>";

}
else {
    $type = $_POST['type'];
 $file = $test."_".rand(100,999)."_".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/";
 $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 if($type==""||$new_size==0||$test==""){
     die();
 }
 
 $final_file=str_replace(' ','-',$file);
  $file_url = "/upload/".$final_file;

  
  
  if($type=="qp"){
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET qp ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
  
 

 }
            
  }
  else if($type=="sol"){
      if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET sol ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
  
 

 }
  }
   else if($type=="key_link"){
      if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET key_link ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
  
 

 }
  }
            
}      
}



	if(isset($_POST['upload2'])){   

 $test = $_POST['test'];
 $subject = $_POST['subject'];
$sql = "SELECT * FROM revision where test='$test' and subject = '$subject'";
$res = mysqli_query($conn,$sql);
if($res->num_rows==0){
    echo "<script>alert('Test Not Found')</script>";

}
else {
 $file = $test."_".rand(100,999)."_".$_FILES['qp']['name'];
    $file_loc = $_FILES['qp']['tmp_name'];
 $file_size = $_FILES['qp']['size'];
 $file_type = $_FILES['qp']['type'];
 $folder="upload/";
 $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 if($new_size==0||$test==""){
     die();
 }
 
 $final_file=str_replace(' ','-',$file);
  $file_url = "/upload/".$final_file;

  
  
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET qp ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
 }
  $file = $test."_".rand(100,999)."_".$_FILES['key']['name'];
    $file_loc = $_FILES['key']['tmp_name'];
 $file_size = $_FILES['key']['size'];
 $file_type = $_FILES['key']['type'];
 $folder="upload/";
 $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 if($new_size==0||$test==""){
     die();
 }
 
 $final_file=str_replace(' ','-',$file);
  $file_url = "/upload/".$final_file;
  if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET key_link ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
  
 

 }
   $file = $test."_".rand(100,999)."_".$_FILES['sol']['name'];
    $file_loc = $_FILES['sol']['tmp_name'];
 $file_size = $_FILES['sol']['size'];
 $file_type = $_FILES['sol']['type'];
 $folder="upload/";
 $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 if($new_size==0||$test==""){
     die();
 }
 
 $final_file=str_replace(' ','-',$file);
  $file_url = "/upload/".$final_file;
      if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $query="UPDATE revision SET sol ='$file_url' where test = '$test' and subject='$subject'";
  mysqli_query($conn,$query);
 

 
  }
            
}      
}
if(isset($_POST['submit'])) {
    $field = $_POST['field'];
    $subject = $_POST['subject'];
    if($field == "test"){
$answer = $_POST['answer'];
$subject = $_POST['subject'];
if(substr($answer,0,4)=="RPTA"||substr($answer,0,4)=="RCTA"){
 $sql = "INSERT INTO revision (test,subject) values ('$answer P1','$subject')";
 mysqli_query($conn,$sql);
 $sql = "INSERT INTO revision (test,subject) values ('$answer P2','$subject')";
}
else {
    $sql = "INSERT INTO revision (test,subject) values ('$answer','$subject') ";
 
}
if(mysqli_query($conn,$sql)) {

echo "Succesful";
if(substr($answer,0,3)=="GTM"){
    $sqllll = "UPDATE revision SET syllabus='Total Syllabus' where test='$answer' and subject='$subject'";
mysqli_query($conn,$sqllll);
}
else if(substr($answer,0,4)=="RPTA"||substr($answer,0,4)=="RCTA"){
$sqllll = "UPDATE revision SET syllabus='$answer Syllabus' where test='$answer P1' and subject='$subject'";
mysqli_query($conn,$sqllll);
$sqllll = "UPDATE revision SET visible='1' where test='$answer P1' and subject='$subject'";
mysqli_query($conn,$sqllll);
$sqllll = "UPDATE revision SET syllabus='$answer Syllabus' where test='$answer P2' and subject='$subject'";
mysqli_query($conn,$sqllll);
$sqllll = "UPDATE revision SET visible='1' where test='$answer P2'";
mysqli_query($conn,$sqllll);
$sqlsub = "UPDATE revision SET subject='$subject' where test='$answer P1' and subject='$subject'";
mysqli_query($conn,$sqlsub);
$sqlsub = "UPDATE revision SET subject='$subject' where test='$answer P2' and subject='$subject'";
mysqli_query($conn,$sqlsub);
}
else {
    $sqllll = "UPDATE revision SET syllabus='$answer Syllabus' where test='$answer' and subject='$subject'";
mysqli_query($conn,$sqllll);
}
$sqllll = "UPDATE revision SET visible='1' where test='$answer' and subject='$subject'";
mysqli_query($conn,$sqllll);
$sqlsub = "UPDATE revision SET subject='$subject' where test='$answer' and subject='$subject'";
mysqli_query($conn,$sqlsub);
}
else {
   echo "Unsuccesful.";
}
}
else{
    
$field = $_POST['field'];
$answer = $_POST['answer'];
$subject = $_POST['subject'];
$test = $_POST['test'];
$sql = "SELECT * FROM revision where test='$test' and subject = '$subject'";
$res = mysqli_query($conn,$sql);
if($res->num_rows==0){
    echo "<script>alert('Test Not Found')</script>";

}
else {
if($field == "sol"){

 $sql = "UPDATE revision SET sol = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}
if($field == "syllabus"){
    $sql = "UPDATE revision SET syllabus = '$answer' WHERE test ='$test' and subject='$subject'";
   if( mysqli_query($conn,$sql)){
       echo "Successful";
   }
   else{
       echo "Unsuccessful";
   }
}
if($field == "date"){
    $sql = "UPDATE revision SET date = '$answer' WHERE test ='$test' and subject='$subject'";
   if( mysqli_query($conn,$sql)){
       echo "Successful";
   }
   else{
       echo "Unsuccessful";
   }
}
if($field == "qp"){

 $sql = "UPDATE revision SET qp = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}
if($field == "key_link"){

 $sql = "UPDATE revision SET key_link = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}
if($field == "visible"){

 $sql = "UPDATE revision SET visible = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {

echo "Succesful";
}
else {
   echo "Unsuccesful.";
}
}

if($field == "result"){

 $sql = "UPDATE revision SET result = '$answer' WHERE test = '$test' and subject='$subject'";

if(mysqli_query($conn,$sql)) {
$sqlll = "SELECT * FROM revision where test = '$test' and subject='$subject'";
$ress = mysqli_query($conn,$sqlll);
$msg = "<b><big><u>JEE Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br>";

while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field == "date"){
        $msg = $msg."<b>Date & Time : </b>$value<br></br><br></br>";
        // I just did not use "htmlspecialchars()" function. 
        }
        if($field == "subject"){
        $msg = $msg."<b>Subject : </b>$value<br></br><br></br>";
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
    $mail->addAddress('jee2021@googlegroups.com', "JEE Advanced 2021");  // receiver's email and name
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

<h3 class="pageheading"><b>JEE Advanced 2021 Maths Revision</b></h3>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<b>
<label for="test">Test : </label>

<select name="test" id="test">
 <?php
require_once 'database.php';
$sql = "SELECT * FROM revision where submitted='0' order by s_no";
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
<label for="field">Type : </label>
</b>

<select name="field" id="field">
      <option value="" selected disabled hidden>Select</option>
        <option value="test">Test</option>

  <option value="date">Date & Time</option>
  <option value="syllabus">Syllabus</option>
  <option value="qp">Question Paper</option>

    <option value="visible">Display</option>
        <option value="key_link">Key</option>

  <option value="sol">Solutions</option>

</select> <br></br>

<b>Text :</b> <input type = "text" name = "answer"></input><br></br>


<CENTER><button type="submit" name="submit"  class="button-tvsvishnu" >Upload Test Details </BUTTON></div></div>


</center></div></div></div></div></form>
<div class="mb-4 pagecontentpara">

<h3 class="pageheading"><b><center>Upload Question Paper and Solutions</center></b></h3>
<center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
    <b>
<label for="test">Test : </label>

<select name="test" id="test">
 <?php
require_once 'database.php';
$sql = "SELECT * FROM revision where submitted='0' order by s_no";
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
<b>Type : </b> <select name="type">
       <option value="" selected disabled hidden>Select</option>
       
  <option value="qp">Question Paper</option>
      <option value="key_link">Key</option>

    <option value="sol">Solutions</option>
</select><br></br>
<center>
<b>Question Paper :</b><input type="file" name="file"><br></br></center><center>
  <button type="submit" name="upload"  class="button-tvsvishnu" > Upload File </BUTTON></center>

</center></div></form>
<div class="mb-4 pagecontentpara">

<h3 class="pageheading"><b><center>Upload Question Paper and Solutions</center></b></h3>
<center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
    <b>
<label for="test">Test : </label>

<select name="test" id="test">
 <?php
require_once 'database.php';
$sql = "SELECT * FROM revision where submitted='0' order by s_no";
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
<!----<b>Type : </b> <select name="type">
       <option value="" selected disabled hidden>Select</option>
       
  <option value="qp">Question Paper</option>
      <option value="key_link">Key</option>

    <option value="sol">Solutions</option>
</select><br></br>---->
<center>
<b>Question Paper :</b><input type="file" name="qp"><br></br></center><center>

<b>Key :</b><input type="file" name="key"><br></br></center><center>

<b>Solutions :</b><input type="file" name="sol"><br></br></center><center>


  <button type="submit" name="upload2"  class="button-tvsvishnu" > Upload File </BUTTON></center>

</center></div></form>
<div class="mb-4 pagecontentpara" id="status">
<center>
<h3 class="pageheading"><b>JEE Advanced 2021 Maths Result</b></h3>

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
<label for="field">Type : </label>
</b>
<select name="field" id="field">
      <option value="" selected disabled hidden>Select</option>
  
    <option value="visible">Display</option>
    <option value="result" default selected>Result</option>


</select> <br></br>
<b>Result :</b> <input type = "text" name = "answer"></input><br></br>


<CENTER><button type="submit" name="resul"  class="button-tvsvishnu" > Upload Result </BUTTON></div></div></div>
</center>

</section>
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

