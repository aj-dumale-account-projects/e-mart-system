<?php

Class Customer{

  private $conn;
  private $table_name = "customers";

  //object properties
  public $id;
  public $product_id;
  public $firstname;
  public $lastname;
  public $contact_number;
  public $address;
  public $email_address;
  public $password;
  public $followed_store;
  public $created;
  public $modified;

  public function __construct($db){
    $this->conn = $db;
  }


  function create(){

    $query = "INSERT INTO " .$this->table_name."
          SET
          firstname = :firstname,
          lastname = :lastname,
          contact_number = :contact_number,
          email_address = :email_address,
          password = :password";

    $stmt = $this->conn->prepare($query);

    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
    $this->email_address=htmlspecialchars(strip_tags($this->email_address));
    $this->password=htmlspecialchars(strip_tags($this->password));

    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(":password", $password_hash);

    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":contact_number", $this->contact_number);
    $stmt->bindParam(":email_address", $this->email_address);





    if ($stmt->execute()) {
      return true;
    }else{
      return false;
    }
  }

  function checkEmailExist(){

    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " WHERE email_address = :email_address ";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":email_address", $this->email_address);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['total_rows']>0) {
      return true;
    }else{
      return false;
    }
  }


  function checkContactNOExist(){

    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " WHERE contact_number = :contact_number ";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":contact_number", $this->contact_number);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['total_rows']>0) {
      return true;
    }else{
      return false;
    }
  }

  function emailExist(){

    $query = "SELECT id, firstname, lastname, contact_number, address, password
            FROM
            ". $this->table_name ."
            WHERE
            email_address = ?
            LIMIT 0,1";

    $stmt = $this->conn->prepare($query);

    $this->email_address=htmlspecialchars(strip_tags($this->email_address));

    $stmt->bindParam(1, $this->email_address);

    $stmt->execute();

    $num = $stmt->rowcount();

    if ($num>0) {

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->id = $row['id'];
      $this->firstname = $row['firstname'];
      $this->lastname = $row['lastname'];
      $this->contact_number = $row['contact_number'];
      $this->address = $row['address'];
      $this->password = $row['password'];


      return true;
    }
    else{
      return false;
    }
  }
}
?>
