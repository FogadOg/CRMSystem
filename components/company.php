<style>
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .toggle-switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
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
        echo '
        <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const companyName = "'.$this->companyName.'";
            const checkbox = document.getElementById("toggle_'.$this->companyId.'");
            if (urlParams.get("company") === companyName) {
                checkbox.checked = true;
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
        echo "<tr>";
        echo "<td>".$this->companyId."</td>"; 
        echo "<td>".$this->companyName."</td>"; 
        echo "<td><label class='toggle-switch'>
                    <input id='toggle_".$this->companyId."' type='checkbox' onchange='toggleFilter(\"".$this->companyName."\")'>
                    <span class='slider round'></span>
                </label></td>";
        echo "<td>".deleteForm($this->companyId);
        echo updateForm($this->companyId)."</td>";
        echo "</tr>";
    }
}
?>
