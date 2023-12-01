<nav class="nav" id="navigacija" >
<div id="user">Prijavljeni kao: <b><?php  echo $_SESSION['username']; ?></b></div>
<br>
    <ul>
<?php
                                 

require_once "database/config.php";

$db = new DB();

$sql="SELECT kategorija.id_kategorije, tema_kategorije FROM kategorija ORDER BY id_kategorije";
$result = $db -> getDB($sql);

while($row = $result->fetch_array()){
    $url = $row["tema_kategorije"];
    echo "<li><a href='$url.php'>".ucfirst($row["tema_kategorije"])."</a></li>"; 
}

               
?>
<li><a href='includes/zatvori_sesiju.php'>Odjava</a></li>
</ul>
</nav>
