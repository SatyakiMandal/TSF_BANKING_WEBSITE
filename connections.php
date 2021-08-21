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
  
<div class="box">
<br><br><br>
<h1>Employee Details</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database =  "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM customer_details";
$result = $conn->query($sql);
$id=1;
echo "<br><br><table style=\"margin-left: auto; margin-right: auto; padding: 5px; \">
<tr>
  <th style=\"padding: 5px; background-color:black;\">Sl.no.</th>
  <th style=\"padding: 5px; background-color:black;\">Name</th>
  <th style=\"padding: 5px; background-color:black;\">Email</th>
  <th style=\"padding: 5px; background-color:black;\">Balance</th>
</tr>";

while($data = $result->fetch_assoc()){
  echo "<tr id=\"$id\">
    <td style=\"padding: 5px; background-color:#203354;\">".$data['Sl no.']."</td>
    <td style=\"padding: 5px; background-color:#203354;\">".$data['Name']."</td>
    <td style=\"padding: 5px; background-color:#203354;\">".$data['Email']."</td>
    <td style=\"padding: 5px; background-color:#203354;\">".$data['Balance']."</td>
  </tr>";
  $id=$id+1;
}
?>
</table>
<br><br>
<form id="mycust"  method="post" style="color:black;">
<label for="Name" style="background-color:white; padding-left:10px; padding-right:10px;"><b>Customers:<b></label>
  <select id="customer" name="customer">
    <option value="Satyaki">Satyaki</option>
    <option value="Sandipta">Sandipta</option>
    <option value="Kritika">Kritika</option>
    <option value="Sam">Sam</option>
    <option value="Rohan">Rohan</option>
    <option value="Nikita">Nikita</option>
    <option value="Ashwin">Ashwin</option>
    <option value="Soumalya">Soumalya</option>
    <option value="Dinesh">Dinesh</option>
    <option value="Raghul">Raghul</option>
  </select>
  <input type="submit" name="submit">
</form>
<br><br>


<?php
if(isset($_POST["submit"])) { 
  $name=$_REQUEST['customer'];
  $sql = "SELECT * FROM customer_details WHERE Name='$name'";
  $result = mysqli_query($conn,$sql);

  echo "<table style=\"margin-left: auto; margin-right: auto; padding: 5px;\">
  <tr>
    <th style=\"padding: 5px; background-color:black;\">Sl.no.</th>
    <th style=\"padding: 5px; background-color:black;\">Name</th>
    <th style=\"padding: 5px; background-color:black;\">Email</th>
    <th style=\"padding: 5px; background-color:black;\">Balance</th>
  </tr>";

  if (mysqli_num_rows($result) >0){
	  while($row=mysqli_fetch_assoc($result)){
      echo "<tr>
      <td style=\"padding: 5px; background-color:#203354;\">".$row['Sl no.']."</td>
      <td style=\"padding: 5px; background-color:#203354;\">".$row['Name']."</td>
      <td style=\"padding: 5px; background-color:#203354;\">".$row['Email']."</td>
      <td style=\"padding: 5px; background-color:#203354;\">".$row['Balance']."</td>
    </tr>";
	}
	echo "</table>";
	}
	else{
	echo "no result";
	}
  //$_SESSION["res"] = $result;
}
?>
<button type="button" class="btn btn-light" onclick="relocate_home()">Transfer Money</button>
<br><br>
<br><br>
</div>
  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  function relocate_home(){
    location.href = "index.php";
  }
  </script>
</body>
</html>