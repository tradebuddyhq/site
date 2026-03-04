
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $con = new mysqli("localhost", "arhan", "@Arhan1234#!", "trade_buddy");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Determine if this is signup (terms checkbox present) or login
    $isSignup = isset($_POST['terms_accepted']);

    if ($isSignup) {
        // Signup flow
        $parent_name = trim($_POST['parent_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $child_year_grade = $_POST['child_year_grade'] ?? '';
        $terms_accepted = isset($_POST['terms_accepted']) ? 1 : 0;

        if (!$terms_accepted) {
            echo "<script>alert('You must accept the terms and conditions.'); window.history.back();</script>";
            exit();
        }

        if ($parent_name === '' || $email === '' || $password === '') {
            echo "<script>alert('All fields are required.'); window.history.back();</script>";
            exit();
        }

        // Check for duplicate email
        $check = $con->prepare("SELECT id FROM customers WHERE email = ? LIMIT 1");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            echo "<script>alert('Email already registered. Please log in.'); window.location.href = 'login.html';</script>";
            $check->close();
            $con->close();
            exit();
        }
        $check->close();

        // Insert new user
        $stmt = $con->prepare("INSERT INTO customers (parent_name, email, password, child_year_grade, terms_accepted) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $parent_name, $email, $password, $child_year_grade, $terms_accepted);

        if ($stmt->execute()) {
            echo "<script>alert('Welcome! Please login now.'); window.location.href = 'login.html';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
        }

        $stmt->close();
        $con->close();
        exit();
    }

    // Login flow
    $email = $_POST['eml'] ?? $_POST['email'] ?? '';
    $password = $_POST['pass'] ?? $_POST['password'] ?? '';

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT id, parent_name, email, password FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($password === $row['password']) { 
            $_SESSION['customer_id'] = $row['id'];
            $_SESSION['customer_name'] = $row['parent_name'];
            $_SESSION['customer_email'] = $row['email'];

            echo "<script>
                alert('Welcome, {$row['parent_name']}!');
                window.location.href = 'Product.php';
            </script>";
        } else {
            echo "<script>alert('Invalid Password'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid Email'); window.location.href = 'login.html';</script>";
    }

    $stmt->close();
    $con->close();
}
?>