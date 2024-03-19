<?php
    class ContactPerson {
        public string $email;
        public string $phoneNumber;
        public string $name;
        public string $position;
        public int $comapnyId;

        public function __construct(string $email, string $phoneNumber, string $name, string $position, int $comapnyId){
            $this -> email = $email;
            $this -> phoneNumber = $phoneNumber;
            $this -> name = $name;
            $this -> position = $position;
            $this -> comapnyId = $comapnyId;
        }

        public function getArray(): array {
            return [
                "email" => $this->email,
                "phonenumber" => $this->phoneNumber,
                "name" => $this->name,
                "position" => $this->position,
                "lærlingsbedrift_ID" => $this->companyId,
            ];
        }
    }
?>
