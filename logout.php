<?php

    session_start();

    session_destroy();

    header('location:login.inc.php');


?>