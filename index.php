<?php 
require_once 'database/config.php';
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <?php
        $title = "Chat";
        $description = "Besplatno dopisivanje na webu"; 
        $keywords = "besplatno, dopisivanje, chat, web"; 
            include "includes/head.php";
        ?>
    </head>
<body>


    <div class="empty_log">
    <div class="red">
        <p class="t-kolona-3 d-kolona-4"></p>
            <?php include "includes/login.php"; ?>
        <p class="t-kolona-3 d-kolona-4"></p>
    </div></div>

   
</body>
</html>
