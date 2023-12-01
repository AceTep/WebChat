<div id="delete">
<form method="POST" onclick="return confirm('Jeste li sigurni ?');" enctype="multipart/form-data">

    <input type="submit" name="delete" value="Isprazni chat" />

    </form>

</div>

<?php
require_once "database/config.php";

$kategorija_id= $_SESSION["id_kategorije"];
$db = new DB();
    
    if(isset($_POST['delete'])){
        $sql= "DELETE FROM poruka where id_kategorije=$kategorija_id";  
        $result = $db -> editDB($sql);
        if($result){
                    }
    }
?>
