<?php

require "../../config/DataBase.php";
require "../../controller/CategoryController.php";

$id = $_GET['uid'];
$payload = new CategoryController();

$payload->delete($id);
header("Location: index.php");
