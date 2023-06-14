<?php

include "config/dbh.php";

unset($_SESSION['is_logged_in']);
unset($_SESSION['super_admin_id']);
session_destroy();
header("Location: signin.php");
