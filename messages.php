<?php

require_once '../database/config.php';

$db = new DB();


switch( $_REQUEST["action"] ){

	case "sendMessage":

		session_start();
		$kategorija_id= $_SESSION["id_kategorije"];
		$korisnik_id = $_SESSION["id"];
		$sadrzaj = $_REQUEST["poruka"];


		$sql  ="INSERT INTO poruka SET sadrzaj='$sadrzaj', datum=now(), id_korisnika='$korisnik_id', id_kategorije='$kategorija_id'";
		$result = $db->getDB($sql);
		if( $result ){
			echo 1;
			exit;
		}

	break;

	case "getMessages":

		session_start();	
		$kategorija_id= $_SESSION["id_kategorije"];
		$korisnik_id = $_SESSION["id"];
		$sql = "SELECT sadrzaj, datum, korisnicko_ime FROM poruka INNER JOIN korisnik ON poruka.id_korisnika=korisnik.id_korisnika where id_kategorije='$kategorija_id' ORDER BY datum";
		$result = $db->getDB($sql);

	

		$chat = '';
		while($red_komentara = $result->fetch_array())
		{
				echo "<p>".$red_komentara["sadrzaj"].", ".$red_komentara["datum"].", ".$red_komentara["korisnicko_ime"]."</p></div>";
			
		}

		

	break;

}


?>