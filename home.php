 <?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
print_r($userDetails);
?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>
<h1>Welcome <?php echo $userDetails->name; ?></h1>

<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>
</body>
</html>
