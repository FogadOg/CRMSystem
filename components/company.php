<?php

class Company {
    public int $companyId;
    public string $companyName;

    public function __construct(int $companyId, string $companyName){
        $this->companyId = $companyId;
        $this->companyName = $companyName;
    }

    public function render() {
        echo '
        <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const companyName = "'.$this->companyId.'";
            const button = document.getElementById("button_'.$this->companyId.'");
            if (urlParams.get("company") === companyName) {
                button.classList.add("selected");
            }
        };
    
        function toggleFilter(companyName) {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get("company") === companyName) {
                urlParams.delete("company");
            } else {
                urlParams.set("company", companyName);
            }
            window.location.search = urlParams;
        }
        </script>';
        $selected = isset($_GET['company']) && $_GET['company'] == $this->companyId;
        $color = $selected ? "danger" : "primary";
        echo "<tr>";
        echo "<td>".$this->companyId."</td>"; 
        echo "<td>".$this->companyName."</td>"; 
        echo "<td><button class='btn btn-".$color."' id='button_".$this->companyId."' onclick='toggleFilter(\"".$this->companyId."\")'>Toggle</button></td>";
        echo "<td>".deleteForm($this->companyId);
        echo updateForm($this->companyId)."</td>";
        echo "</tr>";
    }
}

?>
