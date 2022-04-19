<?php
require_once '../config/Database.php';

class MenuController{
    public $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Read products from 'main Page'
    public function readMainProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Main"');
    
        return $query->fetchAll();
        }

    //Read products from 'Technology'
    public function readTechProducts(){
    $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Technology"');

    return $query->fetchAll();
    }

    //Read products from 'Clothes'
    public function readClothProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Clothes"');
    
        return $query->fetchAll();
        }

    //Read products from 'Accessory'
    public function readAccessoryProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Accessory"');
    
        return $query->fetchAll();
        }

        //Read products from 'PetSupplies'
    public function readPetProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Pet supplies"');
    
        return $query->fetchAll();
        }

         //Read products from 'Fitness'
    public function readFitnessProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Fitness"');
    
        return $query->fetchAll();
        }

        //Read products from 'Toys'
    public function readToysProducts(){
        $query = $this->db->pdo->query('SELECT * from menu WHERE categories LIKE "Toys"');
    
        return $query->fetchAll();
        }

    //CRUD
    public function readData(){
        $query = $this->db->pdo->query('SELECT * from menu');
        return $query->fetchAll();
    }

    public function insert($request){
        $request['image'] = '../images/' .$request['image'];
        $request['image1'] = '../images/' .$request['image1'];
        $request['image2'] = '../images/' .$request['image2'];
        $query = $this->db->pdo->prepare('INSERT INTO menu (menu_image,  menu_name, menu_price, menu_body, categories,  menu_image1, menu_image2)
        VALUES (:menu_image, :menu_name, :menu_price, :menu_body, :categories,  :menu_image1, :menu_image2 ) ');
        
        $query->bindParam(':menu_image', $request['image']);
        
        $query->bindParam(':menu_name', $request['name']);
        $query->bindParam(':menu_price', $request['price']);
        $query->bindParam(':menu_body', $request['body']);
        $query->bindParam(':categories', $request['category']);
        
        $query->bindParam(':menu_image1', $request['image1']);
        $query->bindParam(':menu_image2', $request['image2']);
        $query->execute();

        return header('Location: ../views/menuDashboard.php');
                  
    }

    public function edit($id) {
        $query = $this->db->pdo->prepare('SELECT * from menu WHERE id = :id ');
        $query->bindParam(':id',$id);
        $query->execute();

        return $query->fetch();
    }

    public function update($request, $id) {
        $request['image'] = '../images/' .$request['image'];
        $request['image1'] = '../images/' .$request['image1'];
        $request['image2'] = '../images/' .$request['image2'];
        $query = $this->db->pdo->prepare('UPDATE menu SET menu_image = :menu_image, 
        menu_name = :menu_name,menu_price = :menu_price, menu_body = :menu_body, categories = :categories, menu_image1 = :menu_image1, menu_image2 = :menu_image2 WHERE id = :id');
        $query->bindParam(':menu_image', $request['image']);
        $query->bindParam(':menu_name', $request['name']);
        $query->bindParam(':menu_price', $request['price']);
        $query->bindParam(':menu_body', $request['body']);
        $query->bindParam(':categories', $request['category']);
        $query->bindParam(':menu_image1', $request['image1']);
        $query->bindParam(':menu_image2', $request['image2']);
        
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: ./menuDashboard.php');
    }

    public function delete($id){
        $query = $this->db->pdo->prepare('DELETE FROM menu WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: ./menuDashboard.php');

    }

    //contact form
     public function readMessages(){
         $query = $this->db->pdo->query('SELECT * FROM contact');

         return $query->fetchAll();
     }

     public function sendMessages($request) {
         $query = $this->db->pdo->prepare('INSERT INTO contact (sender_name, sender-email, sender_comment)
            VALUES (:sender_name, :sender-email, :sender_comment)');

         $query->bindParam(':sender_name', $request['sender_name']);
         $query->bindParam(':sender_email', $request['sender-email']);
         $query->bindParam(':sender_comment', $request['sender_comment']);

         $query->execute();
        //  return header('Location: ../views/contactDashboard.php');
     }

     public function deletMessages($id){
         $query = $this->db->pdo->prepare('DELETE from contact WHERE id = :id');

         $query->bindParam(':id', $id);
         $query->execute();
         return header('Location: contactDashboard.php');
     }
}



