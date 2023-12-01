<aside id="registracija" class=" t-kolona-6 d-kolona-4"> 
    <form method="POST" enctype="multipart/form-data">
    <h2>Registracija</h2>
    <label for="korisnicko_ime">Korisničko ime:</label>
    <input type="text" placeholder="korisničko ime" name="username" id="korisnicko_ime" required /> 
    <br />
    <label for="lozinka">Lozinka:</label>
    <input type="password" placeholder="lozinka" name="password" id="lozinka" required />
    <br>
        <input type="submit" name="Register" value="Register" />
        <p>Imate račun? <a href="index.php">Prijavi se</a>.</p>
    </form>
</aside>
<?php
        require_once "database/config.php";

        $db = new DB();


        if(isset($_POST['Register'])){

            if(empty(trim($_POST['username']))){
                echo'<script>alert("Unesite korisničko ime")</script>';
            }else{
                $username = strip_tags($_POST["username"]);
            }
        
            if(empty(trim($_POST['password']))){
                echo'<script>alert("Unesite lozinku")</script>';
            }else{
                $password = strip_tags($_POST["password"]);
            }

            $sql = "insert into korisnik(korisnicko_ime,  lozinka, zabrana, id_grupe) values('$username',md5('$password'),1,3)";
            $provjera_imena = "select korisnicko_ime from korisnik where korisnicko_ime='$username'";
            
            
            if(mysqli_num_rows($db ->getDB($provjera_imena))){
                echo'<script>alert("Uneseno korisničko ime se već koristi!")</script>'; 
            }elseif($db -> getDB($sql)){
                $sql = "SELECT id_korisnika, grupa_korisnika.id_grupe FROM korisnik INNER JOIN grupa_korisnika ON korisnik.id_grupe = grupa_korisnika.id_grupe WHERE korisnicko_ime='$username'";
                $result = $db -> getDB($sql);
                if($data = $result -> fetch_array()){
                    session_start();
                    $_SESSION['id_grupe']=$data['id_grupe'];
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $data["id_korisnika"];
                    $_SESSION["username"] = $username;                            
                    header('location:tehnologija.php');       }
            }else{
                    echo'<script>alert("Pokušajte s drugim podacima!")</script>';
            }
        }
        ?>
