<!DOCTYPE html>
<html lang="en">
<!--Author: Kelvin Odinamadu
    Personal Project to create a fake sharepoint site-->
<head>

<title>Kelvin Odinamadu</title>


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

<style>
            table {
                border-collapse: collapse;
                border: 2px black solid;
                font: 12px sans-serif;
            }

            td {
                border: 1px black solid;
                padding: 5px;
            }
        </style>
  <title>
    Creating a fake sharepoint site from scratch
  </title>

        
        
        
<!--javaScript-->
<script src="mainjs.js"></script>

<!--css-->
<link rel="stylesheet" href="style.css"/>

<!--css-->
<!-- <link rel="stylesheet" href="main.css"/> -->
</head>
<body bgcolor="cyan" onload="openPage('About', this, '#16E2BC')">
<div class = "total">




<header>
<div id="top-bar">
<a href="loginAsyc.html">Login</a>&nbsp;or&nbsp;<a href="sign.html">Sign Up</a></p>
</div>

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<div id="title" >
                    <h1>Kelvin Odinamadu</h1>
                    <p>Welcome to kelvin's personal webpage</p>
                </div>
<nav>
     <ul id="menu">
     <li>
<button class="tablink" onclick="openPage('Home', this, '#16E2BC'),Display()" id="defaultOpen">New</button>
</li>

<button class="tablink" onclick="openPage('About', this, '#16E2BC')">Exit</button>
</li>

 </ul>
</nav>

</header>

<section id="content">

      
<!--The Register Form -->
<!------------------------------------------------------------------------------------------------------------------------------------>
  <!--This is for registering a user into a database such as csv-->
  <div id="side" style="">
      <aside>     
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

<h2>PHP User Registeration Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website">
<span class="error"><?php echo $websiteErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>

<?php
 if(($nameErr == '')||($emailErr == '')||($websiteErr == '')||($comment != '')||($gender != '')){

  $file_open = fopen("stock.csv", "a");

  $no_rows = count(file("stock.csv"));

  if($no_rows > 1){
   $no_rows = ($no_rows - 1) + 1;
  }
  
  $form_data = array(
    'Name' => $name,
    'Email' => $email,
    'Website' => $website,
    'Comment' => $comment,
    'Gender' => $gender,
  );
  
  fputcsv($file_open, $form_data);
  
  $name = '';
  $email = '';
  $Website = '';
  $Comment = '';
  $Gender  = '';
 }
// close the file
fclose($file_open);
?>
</div>
  
<!------------------------------------------------------------------------------------------------------------------------------------>
<div>
  <h1>Upload using Fetch API Async JS</h1>
  <form class="form" id= "myForm" >
    <input type="file" id="inpFile" accept=".zip, .pdf, .doc, .docx" multiple><br>
    <button type="submit">Upload File</button>
  </form>

  <script>
    const myForm = document.getElementById("myForm");
    const inpFile = document.getElementById("inpFile");

    myForm.addEventListener("submit", e =>{
      e.preventDefault();//prevents page from refresshing to have to upload

      const endpoint  = "upload.php";
      const formData = new FormData();

      console.log(inpFile.files);//for showing details on file stored

      formData.append("inpFile", inpFile.files[0]);

      fetch(endpoint, {
        method: "post",
        body: formData
      }).catch(console.error);

    });

  </script>
</div>
<!------------------------------------------------------------------------------------------------------------------------------------>

  
<!------------------------------------------------------------------------------------------------------------------------------------>
<div>
  <h1>Upload using just PHP</h1>
  <form action="uploadPHP.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</div>
</aside> 
  </div>

<!------------------------------------------------------------------------------------------------------------------------------------>


<!------------------------------------------------------------------------------------------------------------------------------------>
  
  <div id="main">

  <div id = "Home" class="tabcontent" style="font-family: Hind;padding-right: 50px;" onload="Glog()">

<!-- <script src="http://d3js.org/d3.v3.min.js"></script>
<script src="d3.min.js?v=3.2.8"></script>

<script type="text/javascript"charset="utf-8">
    d3.text("main.csv", function(data) {
        var parsedCSV = d3.csv.parseRows(data);

        var container = d3.select("section")
            .append("table")

            .selectAll("tr")
                .data(parsedCSV).enter()
                .append("tr")

            .selectAll("td")
                .data(function(d) { return d; }).enter()
                .append("td")
                .text(function(d) { return d; });
    });
</script> -->

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.1.2/papaparse.js"></script>
<script>
    function arrayToTable(tableData) {
        var table = $('<table></table>');
        $(tableData).each(function (i, rowData) {
            var row = $('<tr></tr>');
            $(rowData).each(function (j, cellData) {
                row.append($('<td>'+cellData+'</td>'));
            });
            table.append(row);
        });
        return table;
    }

    $.ajax({
        type: "GET",
        url: "http://localhost/Fake-SharePoint/main.csv",
        success: function (data) {
            $('<div></div>').append(arrayToTable(Papa.parse(data).data));
        }
    });
</script> -->
<!-- <script>
  function Glog() {
alert("Hello");
  }
</script> -->
 <script type="text/javascript">
    function Display() {
      console.log("Hello");
        var fileUpload = document.getElementById("http://localhost/Fake-SharePoint/stock.csv").files[0];
        console.log(fileUpload.type);
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var table = document.createElement("table");
                    var rows = e.target.result.split("\n");
                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].split(",");
                        if (cells.length > 1) {
                            var row = table.insertRow(-1);
                            for (var j = 0; j < cells.length; j++) {
                                var cell = row.insertCell(-1);
                                cell.innerHTML = cells[j];
                            }
                        }
                    }
                    var divCSV = document.getElementById("divCSV");
                    divCSV.innerHTML = "";
                    divCSV.appendChild(table);
                }
                reader.readAsText(fileUpload.files[0]);
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid CSV file.");
        }
    }
</script>
<hr />
<div id="divCSV">
</div>
 </div><!--Home Div-->
 <!------------------------------------------------------------------------------------------------------------------------------------>

   <!--The table to display the content of the excel forms data collected-->
   <!-- <div id="About" class="tabcontent" style="font-family: Hind;padding-right: 50px;">
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="d3.min.js?v=3.2.8"></script>

<script type="text/javascript"charset="utf-8">
    d3.text("main.csv", function(data) {
        var parsedCSV = d3.csv.parseRows(data);

        var container = d3.select("body")
            .append("table")

            .selectAll("tr")
                .data(parsedCSV).enter()
                .append("tr")

            .selectAll("td")
                .data(function(d) { return d; }).enter()
                .append("td")
                .text(function(d) { return d; });
    });
</script>
 </div> -->

<!------------------------------------------------------------------------------------------------------------------------------------>
<div id = "About" class="tabcontent" style="font-family: Hind;padding-right: 50px;">
 <script type="text/javascript">
    function Upload() {
        var fileUpload = document.getElementById("fileUpload");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var table = document.createElement("table");
                    var rows = e.target.result.split("\n");
                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].split(",");
                        if (cells.length > 1) {
                            var row = table.insertRow(-1);
                            for (var j = 0; j < cells.length; j++) {
                                var cell = row.insertCell(-1);
                                cell.innerHTML = cells[j];
                            }
                        }
                    }
                    var dvCSV = document.getElementById("dvCSV");
                    dvCSV.innerHTML = "";
                    dvCSV.appendChild(table);
                }
                reader.readAsText(fileUpload.files[0]);
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid CSV file.");
        }
    }
</script>
<input type="file" id="fileUpload" />
<input type="button" id="upload" value="Upload" onclick="Upload()" />
<hr />
<div id="dvCSV">
</div>
  </div>

  </div>
 </section>
  
  <!--The Footer-->
  <footer>
                <div id="footer">
                    <div id="links">
                        <h4>Contacts</h4>
                        <ul>
                            <li>Email: <a href="">ko20so@brocku.ca</a></li>
                            <li>Mobile No.: <a href="">+1(604)7834253</a></li>
                            <li>Link to >><a href="https://www.linkedin.com/in/kelvin-odi">LinkedIn</a></li>
                            <li>Link to >><a href="https://github.com/Kelvin229/Kelvin229.git">GitHub</a></li>
                        </ul>
                    </div>

                    <div id="follow">
                        <h4>Follow my Linkedln for more updates</h4>
                        <ul>
                            <li>Click for more Kelvin Updates >><a href="https://www.linkedin.com/in/kelvin-odi">LinkedIn</a>.</li>
                        </ul>
                    </div>

                    <p id="copyright">Copyright &copy 2021.<br>All Rights Reserved.</p>
                </div>
            </footer>
</div>
</body>
<!--$_GET ==> is visible to everyone-->
<!--$_POST ==> is visible to no one publicaly-->
</html>