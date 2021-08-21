<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>Banking Project</title>

<style>
h1{
    font-size: 80px;
    color:red;
    font-family: 'Merriweather', serif;
}
</style>
</head>
<body>
  <div class="topnav" id="myTopnav">
    <a style="float:left;"><img src="bank.png" alt="" width="30" height="24"></a>
    <a href="#home">Contact Us</a>
    <a href="#news">Our Journey</a>
    <a href="index.html" class="active">Home</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">Menu
      <i class="fas fa-bars"></i>
    </a>
  </div>
  
<div class="box center ">

<br><br>
<form id="mycust2" method="post" style="color:black;font-size:20px;">
  <label for="from" style="background-color:white; padding-left:10px; padding-right:10px;">From:</label>
  <input type="text" id="from" name="from">

  <label for="to" style="background-color:white; padding-left:10px; padding-right:10px;">  To:</label>
  <input type="text" id="to" name="to">
  <br><br>
  <label for="amt" style="background-color:white; padding-left:10px; padding-right:10px;">Amount:</label>
  <input type="number" id="amt" name="amt">
  <br><br>
  <input type="submit" name="submit">
</form>
<br><br>

<?php

if(isset($_POST["submit"]))
{
  $fname= $_POST["from"];
  $to=$_POST["to"];
  $amt=$_POST["amt"];
  $servername="localhost";
  $username="root";
  $password="";
  $database="test";

  $conn=mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
      die ("connection failed".mysqli_connect_error());
  }
  echo "Connection Established<br>";


  $sql="SELECT Balance from customer_details  WHERE Name='$fname'";

	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	$base_pay = $row[0];
	$resultt=intval($base_pay);
  $amtt=intval($amt);
	$m1=$resultt -$amtt;

	$sql="SELECT Balance from customer_details  WHERE Name='$to'";

	$results=mysqli_query($conn,$sql);
	$rows = mysqli_fetch_row($results);
	$base_pay1 = $rows[0];
	$resul=intval($base_pay1);
	$amttt=intval($amt);
	$m2=intval($resul)+$amttt;


	$sql="UPDATE customer_details SET balance='$m1' WHERE Name='$fname'";

	if ($conn->query($sql) === TRUE) {

    echo "<br>Record updated successfully<br>";
  
    } else {
  
    echo "Error updating record: " . $conn->error;
  
    }
    $sql="UPDATE customer_details SET balance='$m2' WHERE Name='$to'";
  
    if ($conn->query($sql) === TRUE) {
  
    echo "<br>Record updated successfully<br>";
  
    } else {
  
    echo "Error updating record: " . $conn->error;
  
    }
  
  //$from = $_POST['from'];
  //$to = $_POST['to'];
  //$amt = $_POST['amt'];

  //$sql1 = "SELECT Balance FROM customer_details WHERE Name='$from'";
  //$result1 = mysqli_query($conn,$sql1);

  //$sql2 = "SELECT Balance FROM customer_details WHERE Name='$to'";
  //$result2 = mysqli_query($conn,$sql2);

  //$result1 = $result1->fetch_array();
  //$r1 = intval($result1[0]);

  //$result2 = $result2->fetch_array();
  //$r2 = intval($result2[0]);

  //$r1=$r1-$amt;
  //$r2=$r2+$amt;

  //$sql1 = "UPDATE customer_details SET Balance='$r1' WHERE Name=='$from'";
  //$sql2 = "UPDATE customer_details SET Balance='$r2' WHERE Name=='$to'";

  //if ($conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE) {
    //echo "Record updated successfully";
  //} else {
    //echo "Error updating record: " . $conn->error;
  //}
}
?>
</div>

<footer>
  <div class="py-4 footer" >
    <div class="container text-center">
      <p class="text-muted mb-0 py-2 center " style="color:white;">
        <i>A Spark Foundation Project</i><br>
        <b>© 2021 Satyaki Mandal <i>all rights reserved</i></b></p>
    </div>
  </div>
</footer>

  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  function customer() {
    const form = document.getElementById('mycust');
    let name= form.elements['customer'];
  }
  </script>
</body>
</html>