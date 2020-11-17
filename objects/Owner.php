<?php

class Owner{

  private $conn;
  private $table_name = "store_users";

  public $id;
  public $store_name;
  public $firstname;
  public $lastname;
  public $email_address;
  public $contact_number;
  public $password;
  public $created;
  public $timestamp;

  public function __construct($db){
    $this->conn = $db;

  }

  function create(){
    $query = "INSERT INTO " .$this->table_name."
            SET
            store_name=:store_name,
            firstname=:firstname,
            lastname=:lastname,
            email_address=:email_address,
            contact_number=:contact_number,
            address=:address,
            password=:password,
            created=:created";

    $stmt = $this->conn->prepare($query);

    $this->store_name=htmlspecialchars(strip_tags($this->store_name));
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email_address=htmlspecialchars(strip_tags($this->email_address));
    $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->created=htmlspecialchars(strip_tags($this->created));


    $this->timestamp = date('Y-m-d H:i:s');
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

    $stmt->bindParam(':store_name', $this->store_name);
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email_address', $this->email_address);
    $stmt->bindParam(':contact_number', $this->contact_number);
    $stmt->bindParam(':address', $this->address);
    $stmt->bindParam(':password', $password_hash);
    $stmt->bindParam(':created', $this->timestamp);

    if ($stmt->execute()) {
      return true;
    }else{
      return false;
    }
  }

  public function emailExist(){

    $query = "SELECT COUNT(*) as total_rows
              FROM ". $this->table_name . "
              WHERE
              email_address = :email_address";

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

  public function storeExist(){

    $query = "SELECT COUNT(*) as total_rows
              FROM ". $this->table_name . "
              WHERE
              store_name = :store_name";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":store_name", $this->store_name);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['total_rows']>0) {
      return true;
    }else{
      return false;
    }

  }

  function EAexist(){

    $query = "SELECT id, store_name, firstname, lastname, contact_number, address, password
      FROM
      " . $this->table_name . "
      WHERE
      email_address = ?
      LIMIT
      0,1";

      $stmt = $this->conn->prepare($query);

      $this->email_address=htmlspecialchars(strip_tags($this->email_address));

      $stmt->bindParam(1, $this->email_address);

      $stmt->execute();

      $num = $stmt->rowcount();

      if ($num>0) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->store_name = $row ['store_name'];
        $this->firstname = $row ['firstname'];
        $this->lastname = $row ['lastname'];
        $this->contact_number = $row['contact_number'];
        $this->address = $row['address'];
        $this->password = $row['password'];

        return true;
      }else{
        return false;
      }

  }
}

?>
