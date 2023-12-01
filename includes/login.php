<aside id="registracija" class="t-kolona-6 d-kolona-4">
	<form method="POST" enctype="multipart/form-data">
	<h2>Prijava</h2>
	<label for="korisnicko_ime">Korisničko ime:</label>
	<input type="text" placeholder="korisničko ime" name="username" id="korisnicko_ime" required />
	<br />
	<label for="lozinka">Lozinka:</label>
	<input type="password" placeholder="lozinka" name="password" id="lozinka" required />
	<br>
	<input type="submit" name="login" value="Prijava"/>
	<p>Nemate račun? <a href="register.php">Registriraj se</a>.</p>
	</form>
</aside>


<?php

require_once "database/config.php";

$db = new DB();

//projvera je li korisnik već prijavljen
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: tehnologija.php");
		exit;
}


//login
if(isset($_POST['login'])){

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



	$sql="SELECT id_korisnika, korisnicko_ime, lozinka, zabrana, grupa_korisnika.id_grupe FROM korisnik INNER JOIN grupa_korisnika ON korisnik.id_grupe = grupa_korisnika.id_grupe WHERE korisnicko_ime='$username' AND lozinka=md5('$password')";
	$result = $db -> getDB($sql);
				
				if(mysqli_num_rows($result) == 1){
					if($data = $result ->fetch_array()){
						if($data["zabrana"] == 0){

							header('location:includes/banned.php');

						}else{
							session_start();
							$_SESSION['id_grupe']=$data['id_grupe'];
							$_SESSION['username']= $username;
							$_SESSION["id"] = $data["id_korisnika"];
							$_SESSION["loggedin"] = true;
							$_SESSION['timestamp'] = time();
							header('location:includes/otvori_sesiju.php');

						}
				}
			}
	else{
		echo'<script>alert("Pogrešno korisničko ime ili lozinka")</script>';
	}
}
?>
