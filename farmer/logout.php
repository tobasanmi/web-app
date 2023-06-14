<?php

include "../config/dbh.php";

unset($_SESSION['is_loggedfarm_in']);
unset($_SESSION['farmer_id']);
session_destroy();
header("Location: login");
