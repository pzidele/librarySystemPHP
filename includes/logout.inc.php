<?php

// destroy session variables in current session
session_start();
session_unset();
session_destroy();

header("Location: ../index.php");
exit();
