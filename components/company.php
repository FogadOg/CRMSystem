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

    class Company {
        public int $companyId;
        public string $companyName;

        public function __construct(int $companyId, string $companyName){
            $this->companyId = $companyId;
            $this->companyName = $companyName;
        }

        public function render() {
            echo "<tr>";
            echo "<td>".$this -> companyId."</td>"; 
            echo "<td>".$this -> companyName."</td>"; 
            echo "<td>View</td>";
            echo "<td>".deleteForm($this -> companyId);
            echo updateForm($this -> companyId)."</td>";
            echo "</tr>";
    }

    }
?>
