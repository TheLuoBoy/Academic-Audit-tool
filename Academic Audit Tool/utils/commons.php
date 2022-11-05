<?php
    class dbconnect{
        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = '';
            $this->port = 3306;
            $this->db = "academic_audit_db";
            try{
                $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'connected succesfully';
            }catch (PDOException $e){
                echo "Failed to connect database \n" . $e->getMessage();
            }

        }
        function addData($stateQuery){
            try {
                $this->conn->exec($stateQuery);
                return true;
            } catch (PDOException $e) {
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
                return false;
            }
        }

        function CloseConnection(){
            $this->conn = null;
        }

    }



?>