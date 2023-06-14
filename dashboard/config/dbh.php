<?php

session_start();

define("DBHOST", "localhost");
define("DBUSER", "daydonec_max");
define("DBPASS", "qYDaBWX*vzhk");
define("DBNAME", "daydonec_main");

$cxn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);