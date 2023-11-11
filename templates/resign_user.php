<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbotv2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$searchResults = array();

if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM summary WHERE display_name LIKE ? OR brunch LIKE ? OR position LIKE ? OR function LIKE ? OR role LIKE ? OR status LIKE ? OR requester LIKE ? OR approver LIKE ? OR comment LIKE ? ";
    $stmt = mysqli_prepare($conn, $sql);
    $searchPattern = "%" . $searchTerm . "%";
    mysqli_stmt_bind_param($stmt, "sssssssss",$searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    }
}
// Delete action
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM summary WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $idToDelete);

    if ($stmt->execute()) {
        header("Location: resign_user.php?st=delete-success");
        exit;
    } else {
        header("Location: regin_user.php?st=delete-error");
        exit;
    }
}

// Edit action
if (isset($_POST['edit']) && is_numeric($_POST['edit_id'])) {
    $editId = $_POST['edit_id'];
    $newTitle = $_POST['new_title'];
    $newShortDescription = strip_tags($_POST['new_short_description']);
    
    $editSql = "UPDATE tbl_get SET title = ?, short_description = ? WHERE id = ?";
    $stmt = $conn->prepare($editSql);
    $stmt->bind_param("ssi", $newTitle, $newShortDescription, $editId);
    
    if ($stmt->execute()) {
        header("Location: resign_user.php?st=edit-success");
        exit;
    } else {
        header("Location: edit_upload.php?st=edit-error");
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
    <!-- <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/add_user.css"> -->
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/view_upload.css">
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
                <a href="../Admin dashboard/admin.php" class="active">
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
                <a href="list_upload.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>View File</h3>
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
                <div class="back_button1"><a href="../templates/user_assessment.php" ><i
                     class="fa fa-chevron-circle-left" style="font-size:28px; color: #1b9c85;"></i></a>
                </div>
                    <div class="search">
                        <form action="resign_user.php" method="post">
                            <div class="form-group">
                                <label for="searchTerm">Type here for search : </label>
                                <input type="text" name="searchTerm" class="form-control" id="searchTerm">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="search" value="Search" class="btn btn-info" style="background:  #1b9c85;">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Display Name</th>
                                        <th> Brunch</th>
                                        <th>Position</th>
                                        <th>Function</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($searchResults)): ?>
                                        <?php
                                        $i = 1; // Initialize the ID counter to 1
                                        foreach ($searchResults as $row):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; // Display the ID starting from 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['display_name']); ?>
                                                </td>
                                                <td title="<?php echo htmlspecialchars($row['brunch']); ?>">
                                                    <?php
                                                    $title = htmlspecialchars($row['brunch']);
                                                    echo strlen($title) > 18 ? substr($title, 0, 40) . '...' : $title;
                                                    ?>
                                                </td>
                                             
                                                <td title="<?php echo htmlspecialchars($row['position']); ?>">
                                                    <?php
                                                    $shortDescription = htmlspecialchars($row['position']);
                                                    echo strlen($shortDescription) > 20 ? substr($shortDescription, 0, 20) . '...' : $shortDescription;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['function']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['role']); ?>
                                                </td>
                                                <td>
                                                    <a
                                                        href="../templates/resign_assessment.php?id=<?php echo $row['id']; ?>">Resign</a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="../templates/resign_user.php?delete=<?php echo $row['id']; ?>">Delete</a>
                                                </td>

                                            </tr>
                                            <?php
                                            $i++; // Increment the ID counter for the next row
                                        endforeach;
                                        ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan='7'>No files found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
    </div>
    <script src="../Admin Dashboard/index.js"></script>
    <script src="../Admin Dashboard/list.js"></script>
</body>

</html>