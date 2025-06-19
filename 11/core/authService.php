<?php

// authService.php

class AuthService {

    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function authenticateUser($username, $password) {
        // In a real application, you'd hash the password and compare it
        // with a hashed password from the database.
        // This is a simplified example for demonstration.

        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password_hash'])) {
                return $user; // User authenticated
            }
        }
        return false; // Authentication failed
    }

    public function registerUser($username, $password, $email) {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->dbConnection->prepare("INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $email);

        if ($stmt->execute()) {
            return true; // User registered successfully
        } else {
            return false; // Registration failed
        }
    }

    // Other authentication-related methods like logout, password reset, etc.
}

// Example Usage (for demonstration, normally this would be called by a router/controller)
/*
if (isset($_POST['action'])) {
    // Assume $dbConn is an initialized mysqli connection
    // $authService = new AuthService($dbConn);

    // if ($_POST['action'] === 'login') {
    //     $username = $_POST['username'] ?? '';
    //     $password = $_POST['password'] ?? '';
    //     $user = $authService->authenticateUser($username, $password);
    //     if ($user) {
    //         echo "User " . $user['username'] . " logged in successfully!";
    //         // Start session, set cookies, etc.
    //     } else {
    //         echo "Invalid username or password.";
    //     }
    // } elseif ($_POST['action'] === 'register') {
    //     $username = $_POST['username'] ?? '';
    //     $password = $_POST['password'] ?? '';
    //     $email = $_POST['email'] ?? '';
    //     if ($authService->registerUser($username, $password, $email)) {
    //         echo "User registered successfully!";
    //     } else {
    //         echo "Registration failed.";
    //     }
    // }
}
*/

?>