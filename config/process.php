<?php

session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//MODIFICATIONS TO THE DATABASE
if (!empty($data)) {

    //CREATING CONTACT
    if ($data["type"] === "create") {

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try{
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso";
        
        } catch(PDOException $e) {
            // se erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    //REDIRECT HOME
    header("Location:" . $BASE_URL . "../index.php");
    //DATA SELECTION
} else {
    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    //RETURNS CONTACT DATA

    if (!empty($id)) {

        $query = " SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();
    } else {

        //RETURNS ALL CONTACTS
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
}

//CONNECTION CLOSE
$conn = null;