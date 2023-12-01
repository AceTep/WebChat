
<?php

    class DB{

        //deklaracija podataka servera i ime baze podataka
        private const SERVERNAME = "localhost"; 
        private const USERNAME = "root";
        private const PASSWORD = "";
        private const DB = "chat";


            private function connectDB() {
                //funkcija za povezivanje na bazu i proslješivanje constanta u funkciju
                $connect = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DB);
                //provjera da li je konekcija prošla -> u slučaju errora konekcija se prekida i ispisjue se greška
                if($connect -> connect_errno){
                    die("Error while connecting to MYSQL: ".$connect->connect_errno. " , ".$connect->connect_error);
                }
                
                $connect->query("set names 'utf8'");
                return $connect;

            }

          public function getDB($sql){
              $connect = $this -> connectDB();
              $result = $connect -> query($sql);

              if(!$result){
                  die("Error while executing inquiry: ".$connect->errno. " , ".$connect->error);
              }

              $connect -> close();
              return $result;
          }


          public function editDB($sql){

               $connect = $this -> connectDB();
               $result = $connect -> query($sql);

               if(!$result){
                   die("Error while executing inquiry: ".$connect->errno. " , ".$connect->error);
               }

               if($connect ->affected_rows != 0){
                  $connect -> close();
                  return true;
               }else{
                  $connect -> close();
                  return false;
               }
          }
    }

?>
