<?php
include 'db.php';
include 'function.php';
if (isset($_POST["user_id"])) {
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM users
		WHERE user_id = '" . $_POST["user_id"] . "'
		LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {

        $output["username"] = $row["username"];
        $output["name"] = $row["name"];
        $output["address"] = $row["address"];
        $output["contact"] = $row["contact"];
        $output["account_type"] = $row["account_type"];
        if ($row["image"] != '') {
            $output['user_image'] = '<img src="upload/' . $row["image"] . '" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="' . $row["image"] . '" />';
        } else {
            $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
        }
    }
    echo json_encode($output);
}
