<?php

require "../../config/DataBase.php";
require "../../controller/EventController.php";

$id = $_GET['uid'];
$payload = new EventController();

$payload->delete($id);
header("Location: index.php");
