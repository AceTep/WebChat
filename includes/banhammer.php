<div  id="banhammer">
    <form method="POST" enctype="multipart/form-data">

    <input type="text" placeholder="korisničko ime" name="username" id="korisnicko_ime" required />
    <input type="submit" name="ban" value="Ban" />
    <input type="submit" name="unban" value="Unban" />

    </form>
    </div>


<?php

require_once "database/config.php";

$db = new DB();
    
    if(isset($_POST['ban'])){
        $username=$_POST['username'];
        $sql= "update korisnik set zabrana=0 where korisnicko_ime='$username'";  
        $result = $db -> editDB($sql);
            if($result){
                echo'<script>alert("Korisnik je uspješno banan!")</script>';
            }else{
                echo'<script>alert("Korisničko ime ne postoji!")</script>';
            }
    }
    if(isset($_POST['unban'])){
        $username=$_POST['username'];
        $sql= "update korisnik set zabrana=1 where korisnicko_ime='$username'";  
        $result = $db -> editDB($sql);
            if($result){
                echo'<script>alert("Korisnik je uspješno unbanan!")</script>';
            }else{
                echo'<script>alert("Korisničko ime ne postoji!")</script>';
        }
    }

?>