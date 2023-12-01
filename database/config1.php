
<?php
    class DB{

        private const SERVERNAME = "localhost";
        private const USERNAME = "zavrsni_trakostanec";
        private const PASSWORD = "zavrsni_trakostanec@ess";
        private const DB = "zavrsni_trakostanec";


          private function connectDB() {

              $connect = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DB);

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
