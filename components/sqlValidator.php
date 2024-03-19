<?php
    require "connection.php";

    class SqlValidator {
        private $query;

        public function __construct(string $query) {
            $this->query = $query;
        }

        public function isValid(string $input = "") {
            $stmt = $connection->prepare($this->query);
            $stmt->bind_param("s", $input);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                return true;

            }
            return false;
            
        }
    }
?>
