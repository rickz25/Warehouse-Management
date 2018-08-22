<?php
include 'db.php';
include 'function.php';
$query = '';
$output = array();
$query .= "SELECT * FROM users ";
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE username LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR account_type LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR address LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR contact LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY user_id DESC ';
}
if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach ($result as $row) {
    $image = '';
    if ($row["image"] != '') {
        $image = '<img src="upload/' . $row["image"] . '" class="img-thumbnail" width="50" height="35" />';
    } else {
        $image = '';
    }
    $sub_array = array();
    $sub_array[] = $image;
    $sub_array[] = $row["name"];
    $sub_array[] = $row["username"];
    $sub_array[] = $row["account_type"];
    $sub_array[] = $row["address"];
    $sub_array[] = $row["contact"];
    $rr = $row["username"];

    if ($rr == 'rickzmorales25@gmail.com') {
        $sub_array[] = '<button type="button" disabled="" name="update" user_id="' . $row["user_id"] . '" class="btn btn-warning btn-xs update">Update</button>';
        $sub_array[] = '<button type="button" disabled="" name="delete" user_id="' . $row["user_id"] . '" class="btn btn-danger btn-xs delete">Delete</button>';
    } else {
        $sub_array[] = '<button type="button" name="update" user_id="' . $row["user_id"] . '" class="btn btn-warning btn-xs update">Update</button>';
        $sub_array[] = '<button type="button" name="delete" user_id="' . $row["user_id"] . '" class="btn btn-danger btn-xs delete">Delete</button>';

    }
    $data[] = $sub_array;

}
$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data" => $data,
);
echo json_encode($output);
