<?php
require(PROJECT_PATH . "includes/verifyAccess.php");

session_destroy();
header("location: /login");
