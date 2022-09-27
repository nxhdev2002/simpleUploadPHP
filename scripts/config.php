<?php
// database config
$_SERVERNAME = "containers-us-west-50.railway.app:5954";
$_USERNAME = "root";
$_PASSWORD = "lCFH2ElINSoWUwSthEDl";
$_DATABASE = "railway";

$_TABLE = "image";
// app config

$_TARGET_DIR = "uploads/";
$_UPLOAD_URL = "https://nxhdev.pro/" . $_TARGET_DIR;
$_MESSAGE = array(
    'uploadSuccess' => 'File upload successfully',
    'uploadFail' => 'Upload fail',
    'writeFail' => 'Write to database error',
    'invalidImage' => 'File must an image',
    'invalidMethod' => 'Only POST Method are allowed',
);


$conn = new mysqli($_SERVERNAME, $_USERNAME, $_PASSWORD, $_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}