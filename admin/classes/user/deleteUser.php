<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/css_admin.css">
</head>

<body>

</body>

</html>
<?php
class Database
{
    private $conn;

    public function __construct()
    {
        include_once "../connect_ddb.php";
        $this->conn = $conn;
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $stmt->close();
            $this->conn->close();
            return true;
        } else {
            $stmt->close();
            $this->conn->close();
            return false;
        }
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $database = new Database();

    if ($database->deleteUser($user_id)) {
        header("Location: showUser.php?message=DeleteSuccess");
    } else {
        header("Location: showUser.php?message=DeleteFail");
    }
} else {
    header("Location: showUser.php?message=InvalidRequest");
}
?>