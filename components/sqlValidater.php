<?php
    class SqlValidater {
        public string $userInput;

        public function __construct(string $userInput){
            $this->userInput = $userInput;
        }

        public function makeValid() {
            $input = trim($this->userInput);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);

            return $input;
        }

    }
?>
