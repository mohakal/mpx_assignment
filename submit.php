<?php
require("database.php");
$response['status'] = "400";
$reposne['message'] = "Error! Method need to be POST and required parameters are paragraph and replacement";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["paragraph"]) && !empty($_POST["replacement"])) {
        $paragraph = $_POST["paragraph"];
        $replacement = '$1'.$_POST["replacement"].'$5';
        $pattern = '/(\s|,|\\\\)(["\'])([^"\']*)(["\'])(\s|,|$|.)/';
        preg_match_all($pattern, $paragraph, $matches);
        $replacedSringPrases = $matches[0];
        $result = preg_replace($pattern, $replacement, $paragraph);
        // db call
        $datbase = new database();
        $datbase->saveDataInDb($paragraph, $replacement, json_encode($replacedSringPrases), $result);
        $response['status'] = "200";
        $response['message'] = $result;
    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
?>
