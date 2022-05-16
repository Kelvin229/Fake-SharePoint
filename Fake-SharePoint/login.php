<!DOCTYPE html>
<html lang="en">
<!--Author: Kelvin Odinamadu
    Personal Project to create a fake sharepoint site-->
<head>
  <script>window["GUARDIO_SENSOR_CONF"] = {"click":false}</script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-N5YCMXVCN8"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-N5YCMXVCN8');
  </script>

  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>
    Creating a login to fake sharepoint site 
  </title>

        <!--css-->
        <link rel="stylesheet" href="main.css"/>
        
</head>
<body>
    <!------------------------------------------------------------------------------------------------------------------------------------>
  <!--This is for validating a users registered info from a database such as csv-->
<div>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $name = test_input($_POST["name"]);
//   $email = test_input($_POST["email"]);
//   $website = test_input($_POST["website"]);
//   $comment = test_input($_POST["comment"]);
//   $gender = test_input($_POST["gender"]);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>

<?php

if(($nameErr == '')||($emailErr == '')||($websiteErr == '')||($comment != '')||($gender != '')){

 $filename = './stock.csv';
 $data = [];
 
 // open the file
 $f = fopen($filename, 'r');
 
 if ($f === false) {
     die('Cannot open the file ' . $filename);
 }
 
 // read each line in CSV file at a time
 while (($row = fgetcsv($f)) !== false) {
     $data[] = $row;
     foreach ($data as $column) {
        // fgetcsv($fp, $column);
        if(($column == $name) && ($column == $email)){
            echo 'you are in';
        }
    }
 }

}
 // close the file
 fclose($f);
?>

</div>

</body>
<!--$_GET ==> is visible to everyone-->
<!--$_POST ==> is visible to no one publicaly-->
</html>