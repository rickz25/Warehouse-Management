<?php
include 'db.php';
include 'function.php';
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        }
        $statement = $connection->prepare("
			INSERT INTO users (username, password, name, account_type, address, contact, image)
			VALUES (:username, :password, :name, :account_type, :address, :contact, :image)
		");
        $result = $statement->execute(
            array(

                ':username' => $_POST["username"],
                ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
                ':name' => $_POST["name"],
                ':account_type' => $_POST["account_type"],
                ':address' => $_POST["address"],
                ':contact' => $_POST["contact"],
                ':image' => $image,
            )
        );
        if (!empty($result)) {
            echo 'User Added Successfully';
        }
    }
    if ($_POST["operation"] == "Edit") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        } else {
            $image = $_POST["hidden_user_image"];
        }
        $statement = $connection->prepare(
            "UPDATE users
			SET username = :username, name = :name, account_type = :account_type, password = :password, address = :address, contact = :contact, image = :image
			WHERE user_id = :user_id"

        );
        $result = $statement->execute(
            array(
                ':username' => $_POST["username"],
                ':name' => $_POST["name"],
                ':account_type' => $_POST["account_type"],
                ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
                ':address' => $_POST["address"],
                ':contact' => $_POST["contact"],
                ':image' => $image,
                ':user_id' => $_POST["user_id"],
            )
        );
        if (!empty($result)) {
            echo 'User Updated Successfully';
        }
    }
}
