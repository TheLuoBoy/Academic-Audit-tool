<?php

    class dbconnect{
        private string $host;
        private string $password;
        private string $db;
        private int $port;
        private string $user;
        public $conn;

        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = 'student';
            $this->port = 3308;
            $this->db = "academic_audit_db";
            try{
                $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo "Something Went wrong \n" . $e->getMessage();
            }

        }
        function addData($stateQuery): bool
        {
            try {
                $this->conn->exec($stateQuery);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        function getData($query){
            try{
                $statement = $this->conn->prepare($query);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $result = $statement->fetchAll();
                return $result;
            }catch (PDOException $e){
                return null;
            }


        }

        function CloseConnection(): void{
            $this->conn = null;
        }

    }

    class dbconnect_Msqli{
        private string $host;
        private string $password;
        private string $db;
        private int $port;
        private string $user;
        public mysqli $conn;
        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = 'student';
            $this->port = 3308;
            $this->db = "academic_audit_db";
            try{
                $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db,$this->port);
            }catch (mysqli_sql_exception $e){
                echo $e->getMessage();
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
        public function closeConnection(): void{
            mysqli_close($this->conn);
        }
    }


?>


