<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 28/07/2019
 * Time: 02:59 PM
 */
session_start();
session_destroy();
header("location:login.php");