<?php
require '../vendor/autoload.php';

$host = "localhost";
$user = "root";
$pass = "";
$db = "chatbotv2";

// Create a connection to the database
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $allowedExtensions = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'gif', 'xlsx', 'xls'];
    $allowedMimeTypes = [
        'application/pdf',
        'text/plain',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/png',
        'image/jpeg',
        'image/gif',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-excel',
    ];
    $filename = $_FILES['file1']['name'];
    $fileTmpName = $_FILES['file1']['tmp_name'];
    $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
    $description = $_POST['description'];

    if (in_array($fileExt, $allowedExtensions) || $fileExt == 'txt') {
        $uploadDirectory = 'uploads/';

        if (!is_dir($uploadDirectory)) {
            if (!mkdir($uploadDirectory, 0777, true)) {
                die('Failed to create the "uploads" directory.');
            }
        }

        $sql = 'SELECT MAX(id) as id FROM tbl_files';
        $result = mysqli_query($con, $sql);
        $newFilename = '';

        if ($result && $result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $newFilename = $filename;
        } else {
            $newFilename = '1-' . $filename;
        }

        $filePath = $uploadDirectory . $newFilename;

        if (move_uploaded_file($fileTmpName, $filePath)) {
            $created = date('Y-m-d H:i');
            $sql = "INSERT INTO tbl_files (filename, created, description) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $newFilename, $created, $description);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: multi_upload.php?st=success");
                exit;
            } else {
                echo "Error: " . mysqli_error($con);
                header("Location: multi_upload.php?st=error");
                exit;
            }
        } else {
            header("Location: multi_upload.php?st=error");
            exit;
        }
    } else {
        header("Location: multi_upload.php?st=error");
        exit;
    }
}

if (isset($_GET['delete'])) {
    $fileToDelete = $_GET['delete'];
    $filePath = 'uploads/' . $fileToDelete;

    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $sql = "DELETE FROM tbl_files WHERE filename = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $fileToDelete);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: list_upload.php?st=deleted");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
        header("Location: list_upload.php?st=error");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/list_upload.css">
    <title>Responsive Dashboard</title>
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
                <a href="../Admin dashboard/admin.php">
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
                <a href="../templates/list_upload.php" class="active">
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

            <div class="box">
                <!-- <h2>Data List</h2> -->
                <div class="container2">

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File Name</th>
                                        <th>Team Drop FIle</th>
                                        <th>Title</th>
                                        <th>short_description</th>
                                        <th>View</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_files ORDER BY id ASC";
                                    $result = mysqli_query($con, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i++; ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['filename']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['drop_file']); ?>
                                                </td>
                                                <td title="<?php echo htmlspecialchars($row['title']); ?>">
                                                    <?php
                                                    $title = htmlspecialchars($row['title']);
                                                    echo strlen($title) > 18 ? substr($title, 0, 40) . '...' : $title;
                                                    ?>
                                                </td>

                                                <td title="<?php echo htmlspecialchars($row['short_description']); ?>">
                                                    <?php
                                                    $shortDescription = htmlspecialchars($row['short_description']);
                                                    echo strlen($shortDescription) > 20 ? substr($shortDescription, 0, 20) . '...' : $shortDescription;
                                                    ?>
                                                </td>


                                                <td><a href="../templates/view.php?file=<?php echo $row['filename']; ?>"
                                                        target="_blank">View</a></td>
                                                <td><a
                                                        href="../templates/list_upload.php?delete=<?php echo $row['filename']; ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else {
                                        echo "<tr><td colspan='7'>No files found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                        <p>Welcome, <b>
                                <KIM>
                        </p>
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
                            <h3>Workshop</h3>
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
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - :00 PM
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