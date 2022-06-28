<?php
session_start();
require_once 'database.php';

?>

<!DOCTYPE html>
<html><head>
<!----<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">--->
    <title>JEE Main & Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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
<h3 class="pageheading"><b><center>Maths Revision Tests</center></b></h3>
        
<?php
require_once 'database.php';
$sql = "SELECT * FROM revision where (visible='1' or visible = '2') and subject='Maths' order by s_no";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<center>";
echo "<table border='1'>";
echo "<th> <center> Test </center></th>";
echo "<th> <center> Date & Time</center></th>";
echo "<th> <center> Syllabus </center></th>";

echo "<th> <center> Question Paper </center></th>";
echo "<th> <center> Key </center></th>";

echo "<th> <center> Solutions </center></th>";
echo "<th> <center> Result </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field!="visible" && $field!="submitted" && $field!="s_no" && $field!="subject"){
    if($field == "test"){
        echo "<td><center>" .$value . "</center></td>";

        $test = $value;
        $sqll = "SELECT * FROM revision where test = '$test' and submitted = '1'";
$resul = mysqli_query($conn, $sqll);
$sqlll = "SELECT * FROM revision where test = '$test' and visible = '2'";
$resull = mysqli_query($conn, $sqlll);
if($resul->num_rows > 0){
    $ans = 0;
}
else {
    $ans = 1;
}
if($resull->num_rows > 0){
    $anss = 0;
}
else {
    $anss = 1;
}

    }
   else if($field == "qp"){
       if($anss==0){
       if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='https://tvsvishnu.000webhostapp.com/objective-test$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
    }
    else if($field == "sol"||$field=="key_link"){
        if($ans == 0){
 if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='https://tvsvishnu.000webhostapp.com/objective-test$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
        }
        else {
                                        echo "<td><center>" ."Test not Submitted" . "</center></td>";

        }
    }
    else if($field == "date" || $field == "syllabus"){
 if($value==NULL){
              
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";

        }
        else {
                                        echo "<td><center>" .$value . "</center></td>";

        }
    }
    else {
                echo "<td><center>" .$value . "</center></td>";
}
    
}

        // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
$sql = "SELECT * FROM revision where (visible='1' or visible = '2') and subject='Physics' order by s_no";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

echo "<table border='1'>";
echo "<br></br><center><h3 class='pageheading'><b><center>Physics Revision Tests</center></b></h3><th> <center> Test </center></th>";
echo "<th> <center> Date & Time</center></th>";
echo "<th> <center> Syllabus </center></th>";

echo "<th> <center> Question Paper </center></th>";
echo "<th> <center> Key </center></th>";

echo "<th> <center> Solutions </center></th>";
echo "<th> <center> Result </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field!="visible" && $field!="submitted" && $field!="s_no" && $field!="subject"){
    if($field == "test"){
        echo "<td><center>" .$value . "</center></td>";

        $test = $value;
        $sqll = "SELECT * FROM revision where test = '$test' and submitted = '1'";
$resul = mysqli_query($conn, $sqll);
$sqlll = "SELECT * FROM revision where test = '$test' and visible = '2'";
$resull = mysqli_query($conn, $sqlll);
if($resul->num_rows > 0){
    $ans = 0;
}
else {
    $ans = 1;
}
if($resull->num_rows > 0){
    $anss = 0;
}
else {
    $anss = 1;
}

    }
   else if($field == "qp"){
       if($anss==0){
       if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
    }
    else if($field == "sol"||$field=="key_link"){
        if($ans == 0){
 if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
        }
        else {
                                        echo "<td><center>" ."Test not Submitted" . "</center></td>";

        }
    }
    else if($field == "date" || $field == "syllabus"){
 if($value==NULL){
              
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";

        }
        else {
                                        echo "<td><center>" .$value . "</center></td>";

        }
    }
    else {
                echo "<td><center>" .$value . "</center></td>";
}
    
}

        // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
$sql = "SELECT * FROM revision where (visible='1' or visible = '2') and subject='Chemistry' order by s_no";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

echo "<table border='1'>";
echo "<br></br><center><h3 class='pageheading'><b><center>Chemistry Revision Tests</center></b></h3><th> <center> Test </center></th>";
echo "<th> <center> Date & Time</center></th>";
echo "<th> <center> Syllabus </center></th>";

echo "<th> <center> Question Paper </center></th>";
echo "<th> <center> Key </center></th>";

echo "<th> <center> Solutions </center></th>";
echo "<th> <center> Result </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field!="visible" && $field!="submitted" && $field!="s_no" && $field!="subject"){
    if($field == "test"){
        echo "<td><center>" .$value . "</center></td>";

        $test = $value;
        $sqll = "SELECT * FROM revision where test = '$test' and submitted = '1'";
$resul = mysqli_query($conn, $sqll);
$sqlll = "SELECT * FROM revision where test = '$test' and visible = '2'";
$resull = mysqli_query($conn, $sqlll);
if($resul->num_rows > 0){
    $ans = 0;
}
else {
    $ans = 1;
}
if($resull->num_rows > 0){
    $anss = 0;
}
else {
    $anss = 1;
}

    }
   else if($field == "qp"){
       if($anss==0){
       if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
    }
    else if($field == "sol"||$field=="key_link"){
        if($ans == 0){
 if($value!="NOT RELEASED"){
                echo "<td><center>"."<a href='$value'>" . "Click Here</a></center></td>";
}
else {
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";
}
        }
        else {
                                        echo "<td><center>" ."Test not Submitted" . "</center></td>";

        }
    }
    else if($field == "date" || $field == "syllabus"){
 if($value==NULL){
              
                                echo "<td><center>" ."NOT RELEASED" . "</center></td>";

        }
        else {
                                        echo "<td><center>" .$value . "</center></td>";

        }
    }
    else {
                echo "<td><center>" .$value . "</center></td>";
}
    
}

        // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}