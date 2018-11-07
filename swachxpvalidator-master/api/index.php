<?php

$params = $_REQUEST;

require "../Controllers/GeneralController.php";

$GeneralController = new GeneralController();

$result = $GeneralController->response($params);

$response = json_encode($result);

echo $response;