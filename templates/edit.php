<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/edit_data.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <a href="../Admin Dashboard/admin.php" class="active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../templates/createuser.php">
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
                </a>
                <a href="../templates/list_upload.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Data List</h3>
                </a>
                <a href="../templates/query_to_tbl.php" >
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
            <h1>Edit Data in Database</h1>

            <?php
            // Include the database connection code here
            $db_host = 'localhost';
            $db_username = 'root';
            $db_password = '';
            $db_name = 'chatbotv2';
            $fileupload = 'file_upload';

            // Check if the form was submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id'], $_POST['title'], $_POST['description'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    // Create a database connection
                    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Update the record in the database
                    $sql = "UPDATE $fileupload SET title = ?, description = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("ssi", $title, $description, $id);

                        if ($stmt->execute()) {
                            echo "Record with ID $id has been updated.";
                        } else {
                            echo "Error updating record: " . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        echo "Error preparing SQL statement: " . $conn->error;
                    }

                    // Close the database connection
                    $conn->close();
                } else {
                    echo "Invalid form data.";
                }
            }

            // Continue displaying the form for editing records
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Create a database connection
                $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve the record with the provided "id"
                $sql = "SELECT id, title, description FROM $fileupload WHERE id = ?";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("i", $id); // Assuming "id" is an integer
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row) {
                        // Form for editing record
                        echo '<form method="post" action="edit.php">';
                        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                        echo 'Title: <input type="text" name="title" value="' . $row["title"] . '"><br>';
                        echo 'Description: <textarea name="description">' . $row["description"] . '</textarea><br>';
                        echo '<input type="submit" value="Save">';
                        echo '</form>';
                    } else {
                        echo "Record not found.";
                    }

                    $stmt->close();
                } else {
                    echo "Error preparing SQL statement: " . $conn->error;
                }

                // Close the database connection
                $conn->close();
            } else {
                echo "Invalid request. Please specify an 'id' parameter.";
            }
            ?>

            <!-- <a href="../templates/show_data.php">Go Back</a> -->
            <a href="../templates/show_data.php" class="back-button"><i class="fa fa-chevron-circle-left"
                                style="font-size:36px"></i></a>

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

    <script src="../Admin Dashboard/index.js"></script>
</body>

</html>