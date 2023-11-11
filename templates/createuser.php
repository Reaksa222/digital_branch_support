<?php
// Database configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'chatbotv2';

// Create a database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = array();
$success_message = ''; // Initialize the success message variable

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    if (strtolower($password) === strtolower($name)) {
        $error[] = 'Password cannot be the same as your name.';
    } elseif (strlen($password) <= 8) {
        $error[] = 'Password must be at least 8 characters long.';
    } elseif (!preg_match('/[A-Za-z]/', $password)) {
        $error[] = 'Password must contain at least one letter.';
    } elseif (!preg_match('/\d/', $password)) {
        $error[] = 'Password must contain at least one number.';
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $error[] = 'Password must contain at least one special symbol.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $error[] = 'Password must contain at least one uppercase letter.';
    } elseif ($password != $cpassword) {
        $error[] = 'Passwords do not match.';
    } else {
        // Use the hashed password for database storage
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data using prepared statements
        $insert = $conn->prepare("INSERT INTO login_register (name, email, password, user_type) VALUES (?, ?, ?, ?)");
        $insert->bind_param("ssss", $name, $email, $hash, $user_type);

        if ($insert->execute()) {
            $success_message = 'User registration successful.';
        } else {
            $error[] = 'Error: ' . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/login_register.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <title>Admin Dashboard</title>

</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../Admin Dashboard/images/profile.jpg">
                    <h2>Admin<span class="danger">Page</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../Admin Dashboard/admin.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../templates/createuser.php" class="active">
                    <span class="fa fa-user-circle-o">
                    </span>
                    <h3>Create User</h3>
                </a>
                <a href="../templates/search.php">
                    <span class="fa fa-search">
                    </span>
                    <h3>Search</h3>
                </a>
                <!-- <a href="#">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a> -->
                <a href="../templates/email.php">
                    <span class="fa fa-address-card">
                    </span>
                    <h3>Contact</h3>
                </a>
                <a href="../templates/multi_upload.php">
                    <span class="fa fa-upload">
                    </span>
                    <h3>Multi_Upload</h3>
                    <a href="../templates/list_upload.php">
                        <span class="material-icons-sharp">
                            inventory
                        </span>
                        <h3>Data List</h3>
                    </a>
                    <a href="../templates/query_to_tbl.php">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Query Data</h3>
                </a>
                    <!-- <a href="#">
                        <span class="material-icons-sharp">
                            report_gmailerrorred
                        </span>
                        <h3>Reports</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">
                            settings
                        </span>
                        <h3>Settings</h3>
                    </a> -->
                    <a href="../templates/login.php">
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>New Login</h3>
                    </a>
                    <a href="../templates/logout.php">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <div class="form-container">
                <form action="" method="post" id="create_user_form"> <!-- Add the id attribute to the form -->
                    <h3>Create User Now</h3>

                    <?php
                    if (!empty($error)) {
                        foreach ($error as $errorMsg) {
                            echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
                        }
                    }
                    ?>

                    <input type="text" name="name" required placeholder="enter your name">
                    <input type="email" name="email" required placeholder="enter your email">
                    <input type="password" name="password" id="password" required placeholder="enter your password">
                    <!-- Add an id to the password input element -->
                    <input type="password" name="cpassword" required placeholder="confirm your password">

                    <!-- Password and confirm password validation error message -->
                    <?php
                    if (isset($error) && in_array('Passwords do not match!', $error)) {
                        echo '<span class="error-msg">Passwords do not match!</span>';
                    }
                    ?>

                    <select name="user_type">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                    <input type="submit" name="submit" value="Create User" class="form-btn">
                    <p><a href="../Admin Dashboard/admin.php" class="back-button"><i class="fa fa-chevron-circle-left"
                                style="font-size:38px"></i></a></p>
                </form>
            </div>


        </main>



        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Welcome</p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../Admin Dashboard/images/profile.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../Admin Dashboard/images/profile.jpg">
                    <h2>FTB Bank</h2>
                    <p>Welcome to FTB Bank</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Support Time</h3>
                            <small class="text_muted">
                                08:00 AM - 5:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Open Time</h3>
                            <small class="text_muted">
                                08:00 AM - 5:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- <script src="orders.js"></script> -->
    <script src="../Admin Dashboard/index.js"></script>
</body>

</html>