<?php

session_start();

require_once(__DIR__ . '/../utils/function.php');

session_unset();
session_destroy();

redirectToUrl('http://localhost/Etape2%20-%20Premier%20Site%20PHP/index.php');