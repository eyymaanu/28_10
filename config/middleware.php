<?php
session_start();
function verificarUsu(){
    if(!isset($_SESSION['id'])){
        header("Location: ./login.php");
        exit;
    }
}