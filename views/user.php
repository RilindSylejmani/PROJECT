<?php
	class User
	{
		private $name;
        private $surname;
        private $dateofbirth;
        private $username;
		private $email;
		private $password;
		private $role;

		public function __construct($name, $surname, $dateofbirth, $username, $email, $password, $role){
		
			$this->name = $name;
            $this->surname = $surname;
            $this->dateofbirth = $dateofbirth;
            $this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->role = $role;
		}
        public function getName(){
            
            return $this->name;
        }
        public function getSurname(){

            return $this->surname;
        }
        public function getDateofbirth(){

            return $this->dateofbirth;
        }

		public function getUsername(){
		
			return $this->username;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function getPassword(){
		
			return $this->password;
		}
		public function getRole(){
		
			return $this->role;
		}

	}
	
?>