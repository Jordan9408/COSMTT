!DOCTYPE html>
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

    public function deleteEquipe($equipe_id)
    {
        $sql = "DELETE FROM equipes WHERE equipe_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $equipe_id);

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
    $equipe_id = $_GET['id'];
    $database = new Database();

    if ($database->deleteEquipe($equipe_id)) {
        header("Location: showEquipe.php?message=DeleteSuccess");
    } else {
        header("Location: showEquipe.php?message=DeleteFail");
    }
} else {
    header("Location: showEquipe.php?message=InvalidRequest");
}
?>