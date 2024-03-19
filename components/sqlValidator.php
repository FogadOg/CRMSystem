<?php
    require "connection.php";

    class SqlValidator {
        private $userInput;

        public function __construct(string $userInput) {
            $this->conn = $conn;
            $this->userInput = $userInput;
        }

        public function makeValid() {
            // Use $this->conn instead of $conn
            $stmt = $connection->prepare("SELECT * FROM apprenticecompany WHERE name = ?");
            $stmt->bind_param("s", $this->userInput); // Also use $this->userInput
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                return true;

            }
            return false;
            
        }
    }
?>
