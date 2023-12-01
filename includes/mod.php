<div  id="mod">
    <form method="POST" enctype="multipart/form-data">

    <input type="text" placeholder="korisničko ime" name="username" id="korisnicko_ime" required />
    <input type="submit" name="mod" value="Mod" />
    <input type="submit" name="unmod" value="Unmod" />

    </form>
</div>


<?php

require_once "database/config.php";

$db = new DB();
    
    if(isset($_POST['mod'])){
        $username=$_POST['username'];
        $sql= "update korisnik set id_grupe=1 where korisnicko_ime='$username'";  
        $result = $db -> editDB($sql);
            if($result){
                echo'<script>alert("Korisnik je uspješno modiran!")</script>';
            }else{
                echo'<script>alert("Korisničko ime ne postoji!")</script>';
            }
    }
    if(isset($_POST['unmod'])){
        $username=$_POST['username'];
        $sql= "update korisnik set id_grupe=2 where korisnicko_ime='$username'";  
        $result = $db -> editDB($sql);
            if($result){
                echo'<script>alert("Korisnik je uspješno unmodiran!")</script>';
            }else{
                echo'<script>alert("Korisničko ime ne postoji!")</script>';
        }
    }

?>