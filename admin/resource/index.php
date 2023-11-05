<?php
    require "include/header.php";
    $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'index';

    switch ($pages) {
        case 'home':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'contact':{
            include "resource/home/". $pages .".php";
            break;
        }

        default:{
            include "resource/home/404.php";
            break;
        }
    }

    require 'include/footer.php';
?>