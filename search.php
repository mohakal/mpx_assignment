<?php
require("database.php");
ini_set('display_errors', 1);
$response['status'] = "400";
$reposne['message'] = "Error! Method need to be POST and parameter name should be keyword";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["keyword"]) ) {
        $keyword = $_POST["keyword"];

        // db call
        $datbase = new database();
        $result = $datbase->searchFromDB($keyword);

        $response['status'] = $result["status"];
        $response['message'] = $result["message"];

    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
?>