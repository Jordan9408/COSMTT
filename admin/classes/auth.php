<?php
class UserAuth {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($email, $password) {
        $email = mysqli_real_escape_string($this->db->getConnection(), $email);
        $password = mysqli_real_escape_string($this->db->getConnection(), $password);

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->db->getConnection(), $query);

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>
