<?php

// require_once '../Models/Database/dbConnect.php';

if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "", "rsis");
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["password"];
            if (password_verify($_POST["password"], $hashedPassword)) {
                $isSuccess = 1;
            }
        }
    }
    if ($isSuccess == 0) {
        $message = "Invalid Username or Password!";
    } else {
        // header("Location:  ../studentManagementSystem/admin/adminDashboard/startbootstrap-sb-admin-2-master/createUsers.php");
        echo 'success';
    }
}

