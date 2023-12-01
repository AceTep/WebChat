<?php

require_once '../database/config.php';

$db = new DB();


switch( $_REQUEST["action"] ){

	case "sendMessage":

		session_start();
		
		$kategorija_id= $_SESSION["id_kategorije"]; //id kategorije odnosno chat room-a
		$korisnik_id = $_SESSION["id"]; //id korisnka koji šalje poruku
		$sadrzaj = $_REQUEST["poruka"]; //sadržaj poruke unesene u formu
		//upit kojim se unose podatci u bazu podataka
		$sql  ="INSERT INTO poruka SET sadrzaj='$sadrzaj', datum=now(), id_korisnika='$korisnik_id', id_kategorije='$kategorija_id'";
		$result = $db->getDB($sql); //unos podataka u bazu pomoću getDB() metode
		if( $result ){
			echo 1;
			exit;
		}

	break;

	case "getMessages":

		session_start();	
		$kategorija_id= $_SESSION["id_kategorije"]; //dohvaćanje kategorije
		$korisnik_id = $_SESSION["id"]; //dohvaćanje id-a korisnika 
		//upit kojim dohvaćamo podatke iz baze
		$sql = "SELECT sadrzaj, DATE_FORMAT(datum,'%H:%i|%M %d') as 'date', datum, korisnicko_ime FROM poruka INNER JOIN 
		korisnik ON poruka.id_korisnika=korisnik.id_korisnika where id_kategorije='$kategorija_id' ORDER BY datum";
		$result = $db->getDB($sql); //spremanje tih podataka u varijablu

		//ispis podataka
		while($red_komentara = $result->fetch_array())
		{
			echo "<div>";
			echo "<b>[".$red_komentara["korisnicko_ime"]."]</b> ";
			echo $red_komentara["sadrzaj"];
			echo "<p class='date'>".$red_komentara["date"]."</p>";
			echo "</div>";
		}	

	break;

}


?>