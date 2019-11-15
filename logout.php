<?php

session_start();

session_unset();

session_destroy();

header('location: /huellero_wiedii/login.php');

?>