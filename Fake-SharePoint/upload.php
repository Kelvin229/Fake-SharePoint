<?php
// This is a single-line comment

# This is also a single-line comment

/*
This is a multiple-lines comment block
that spans over multiple
lines
*/

#This code below helps to store uploaded documents to the "uploads" folder
$targetPath = "uploads/" . basename($_FILES["inpFile"]["name"]);
move_uploaded_file($_FILES["inpFile"]["tmp_name"], $targetPath);
?>