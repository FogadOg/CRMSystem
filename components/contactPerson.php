<style>
    
    .crudButton{
        background-color: transparent;
        border: none;
        font-weight: 600; 
        margin-top: .1rem;
        transition: 100ms;
    }

    .crudButton:hover{
        transform: scale(1.1);
    }

</style>

<?php

    class ContactPerson {
        public string $email;
        public string $phoneNumber;
        public string $name;
        public string $position;
        public int $comapnyId;

        public function __construct(int $contectPersonId, string $email, string $phoneNumber, string $name, string $position, int $comapnyId){
            $this -> contectPersonId = $contectPersonId;
            $this -> email = $email;
            $this -> phoneNumber = $phoneNumber;
            $this -> name = $name;
            $this -> position = $position;
            $this -> comapnyId = $comapnyId;
        }

        public function render($filterCompany = ""){

            if($filterCompany != ""){
                if($filterCompany == $this -> comapnyId){
                    echo "<tr>";
                    echo "<td>".$this -> contectPersonId."</td>"; 
                    echo "<td>".$this -> email."</td>"; 
                    echo "<td>".$this -> phoneNumber."</td>"; 
                    echo "<td>".$this -> name."</td>"; 
                    echo "<td>".$this -> position."</td>"; 
                    echo "<td>".$this -> comapnyId."</td>"; 
        
                    echo "<td>".contactDeleteForm($this -> contectPersonId);
                    echo contactUpdateForm($this -> contectPersonId)."</td>";
        
                    echo "</tr>";
                    return;
                };
                return;
            };
            echo "<tr>";
            
            echo "<td>".$this -> contectPersonId."</td>"; 
            echo "<td>".$this -> email."</td>"; 
            echo "<td>".$this -> phoneNumber."</td>"; 
            echo "<td>".$this -> name."</td>"; 
            echo "<td>".$this -> position."</td>"; 
            echo "<td>".$this -> comapnyId."</td>"; 

            echo "<td>".contactDeleteForm($this -> contectPersonId);
            echo contactUpdateForm($this -> contectPersonId)."</td>";

            echo "</tr>";
        }

        private function getCompanyName($id){
            require "connection.php";

            $query = "SELECT * FROM apprenticecompany WHERE id = $id";
            $result = $connection -> query($query);
            

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $companyName = $row['Name'];
                
                $result->free_result();
                
                $connection->close();
                
                return strtolower($companyName);
            } else {
                return "";
            }
        }
    }
?>
