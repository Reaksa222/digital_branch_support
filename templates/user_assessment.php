<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/user_asses.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/profile.jpg">
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
                <!-- <a href="#" >
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
            <div class="grid-container">
                <div class="grid-item">
                    <a href="../templates/add_user.php">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                        <span>Add User</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="../templates/resign_user.php">
                        <i class="fa fa-user-times" aria-hidden="true"></i>
                        <span>Resign User</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="../templates/move_user.php">
                        <i class="fa fa-retweet" aria-hidden="true"></i>
                        <span>Move User</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="../templates/query_assessment.php">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span>Query data to table</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="../templates/show_summary.php">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <span>User Modify</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="../templates/summary.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Summary</span>
                </div>
             
            </div>

    </div>
    </main>
    <!-- End of Main Content -->

    <!-- Right Section -->

    <!-- <script src="orders.js"></script> -->
    <script src="../Admin Dashboard/index.js"></script>
</body>

</html>