<?php 
    // Classes

    class User {
        public $email;
        public $name;

        // public function __construct() {
        //   $this->email = "Mario@mail.com";
        //   $this->name = "Mario";
        // }

        public function __construct($name, $email) {
          $this->email = $email;
          $this->name = $name;
        }

        public function login() {
            echo "The user logged in";
        }
    }

    $userOne = new User();
    $userOne->login();

    $userTwo = new User('Yoshi', 'Yoshi@ymail.com');

    class User2 {
        private $email;
        private $name;

        // public function __construct() {
        //   $this->email = "Mario@mail.com";
        //   $this->name = "Mario";
        // }

        public function __construct($name, $email) {
          $this->email = $email;
          $this->name = $name;
        }

        public function login() {
            echo "The user logged in";
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            if (is_string($name) && strlen($name) > 1) {
                $this->name = $name;
                return "Name has been updated to $name";
            } else {
                return "Not a valid name";
            }
        }
    }

    $userThree = new User2();
    $userThree->setName("Dan");
    $name = $userThree->getName();

?>