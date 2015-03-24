<?php
require_once 'Region.php';
require_once 'Connection.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$gateway->deleteRegion($id);

header("Location: viewRegions.php");
?>