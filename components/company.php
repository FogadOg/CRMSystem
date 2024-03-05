<?php
    class Company {
        public int $companyId;
        public string $companyName;

        public function __construct(int $companyId, string $companyName){
            $this->companyId = $companyId;
            $this->companyName = $companyName;
        }

        public function getAllContactPersons() {
            echo "getContactPerson";
        }
    }
?>
