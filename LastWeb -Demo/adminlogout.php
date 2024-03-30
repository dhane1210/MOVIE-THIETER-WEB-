<?php
session_start();
session_unset();
session_destroy();
header("Location: HomePage1.php");
exit();
?>