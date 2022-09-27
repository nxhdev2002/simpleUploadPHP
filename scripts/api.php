<?php
require_once("config.php");
require_once("modal.php");
require_once("upload.php");
header("content-type: application/json");

$result = new stdClass();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fileTempName = $_FILES["fileToUpload"]["tmp_name"];
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $filePath = $_TARGET_DIR . $fileName;
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        if(uploadFile($fileTempName, $filePath)) {
            if (writeData($fileName, $_UPLOAD_URL.$fileName)) {
                $result->message = $_MESSAGE['uploadSuccess'];
                $result->data = new Image($fileName, $_UPLOAD_URL.$fileName);
            } else {
                $result->message = $_MESSAGE['writeFail'];
                $result->data = null;
            }
        } else {
            $result->message = $_MESSAGE['uploadFail'];
            $result->data = null;
        }
    } else {
        $result->message = $_MESSAGE['invalidImage'];
        $result->data = null;
    }
} else {
    $result->message = $_MESSAGE['invalidMethod'];
    $result->data = null;
}

echo json_encode($result);
