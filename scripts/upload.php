<?php
require_once("config.php");
function uploadFile($fileName, $filePath)
{
    if (move_uploaded_file($fileName, $filePath)) {
        return true;
    } else {
        return false;
    }
}

function writeData($name, $path)
{
    global $_TABLE, $conn;
    $query = "INSERT INTO $_TABLE(name, path) VALUES ('$name', '$path')";
    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}
