<?php
session_start();
require_once 'database.php';

?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
    <title>JEE Advanced 2021</title>
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
JEE Advanced 2021              </h1><center>
<h4><b><p id="demo"></p></b></center></h4>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 03, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + " Days Remaining";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "JEE Advanced 2021 : 03-Oct-2021";
  }
}, 1000);
</script>
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
<h3 class="pageheading"><b><center>JEE Advanced Revision Tests</center></b></h3>
        
<?php
require_once 'database.php';
$sql = "SELECT * FROM revision where (visible='1' or visible = '2') order by s_no";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<center>";
echo "<table border='1'>";
echo "<th> <center> Test </center></th>";
echo "<th> <center> Subject </center></th>";
//echo "<th> <center> Date & Time</center></th>";
//echo "<th> <center> Syllabus </center></th>";

echo "<th> <center> Question Paper </center></th>";
echo "<th> <center> Key </center></th>";

echo "<th> <center> Solutions </center></th>";
echo "<th> <center> Result </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field!="visible" && $field!="submitted" && $field!="s_no" && $field!="date" && $field!="syllabus"){
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
                echo "<td><center>"."<a href='/objective-test$value'>" . "Click Here</a></center></td>";
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
                echo "<td><center>"."<a href='/objective-test$value'>" . "Click Here</a></center></td>";
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
?>

<style>

 table { 
  border-collapse: collapse; 
    border: 1px solid #ccc; 

}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
    padding : 6px;
  background: #333; 
  height : 35px;
  color: white; 
  font-weight: bold; 
}
td {    
    padding : 6px;

    height:35px;
}
th, td {
    white-space: nowrap;
}

</style>
<!----
<style>

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: #333 solid 1px;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 30%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		left: 6px;
		width: 30%; 
		padding-right: 10px; 
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Test"; }
	td:nth-of-type(2):before { content: "Subject"; }
	td:nth-of-type(3):before { content: "Date & Time"; }
	td:nth-of-type(4):before { content: "Syllabus"; }
	td:nth-of-type(5):before { content: "Question Paper"; }
	td:nth-of-type(6):before { content: "Key"; }
	td:nth-of-type(7):before { content: "Solutions"; }
	td:nth-of-type(8):before { content: "Result"; }

}</style>

---->
