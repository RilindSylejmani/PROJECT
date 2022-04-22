<?php
require_once '../views/user.php';
require_once '../config/Database.php';

class userControllers{
    public $db;

    public function __construct() {
        $this->db = new Database;
    }

    function readUser(){
        $query = $this->db->pdo->query('SELECT * FROM useri');

        return $query->fetchAll();
    }

    function insertUser(\User $request){
        $name=$request->getName();
        $surname=$request->getSurname();
        $dateofbirth=$request->getDateofbirth();
        $username=$request->getUsername();
        $email=$request->getEmail();
        $password=password_hash($request->getPassword(), PASSWORD_BCRYPT);
        $role=$request->getRole();

        $query = $this->db->pdo->prepare('INSERT INTO useri (name, surname, dateofbirth, username, email, password, user_role)
        VALUES (:Name, :Surname, :DateofBirth, :Username, :Email, :Password, :user_role)');
       
        $query->bindParam(':Name',$name);
        $query->bindParam(':Surname',$surname);
        $query->bindParam(':DateofBirth',$dateofbirth);
        $query->bindParam(':Username',$username);
        $query->bindParam(':Email',$email);
        $query->bindParam(':Password',$password);
        $query->bindParam(':user_role',$role);
        $query->execute();

        return header('Location: ../views/login.php');
    }

    function editUser($id){
        $query = $this->db->pdo->prepare('SELECT * FROM useri WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch();
    }

    function updateUser($request, $id){
        $query = $this->db->pdo->prepare('UPDATE useri SET  name = :Name,
         surname = :Surname, dateofbirth = :DateofBirth, username = :Username, email = :Email,
        user_role = :user_role WHERE id = :id');
        $query->bindParam(':Name', $request['name']);
        $query->bindParam(':Surname', $request['surname']);
        $query->bindParam(':DateofBirth', $request['dateofbirth']);
        $query->bindParam(':Username', $request['username']);
        $query->bindParam(':Email', $request['email']);
        $query->bindParam(':user_role', $request['user_role']);
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: ../views/userDashboard.php');
    }

    function deleteUser($id){
        $query = $this->db->pdo->prepare('DELETE FROM useri WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: ../views/userDashboard.php');
    }
    function readUserData($username){
        $query = $this->db->pdo->prepare('SELECT * FROM useri WHERE username LIKE :Username');
        $query->bindParam(':Username', $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
