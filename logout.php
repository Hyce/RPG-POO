<?php
/**
 * Created by PhpStorm.
 * User: annel
 * Date: 22/02/2017
 * Time: 18:56
 */
session_start();
session_unset();
session_destroy();
header('Location: login.php');