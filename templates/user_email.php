<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../Admin Dashboard/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/email.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
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
                    <h2>User<span class="danger">Page</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../Admin Dashboard/user.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span class="fa fa-user-circle-o">
                    </span>
                    <h3>Create User</h3>
                </a>
                <a href="../templates/user_search.php">
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
                <a href="../templates/user_email.php" class="active">
                    <span class="fa fa-address-card">
                    </span>
                    <h3>Contact</h3>
                </a>
                <a href="../templates/user_upload.php">
                    <span class="fa fa-upload">
                    </span>
                    <h3>Multi_Upload</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Data List</h3>
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
        <main class="email">
            <div>
                <h1>
                    <a href="../Admin Dashboard/user.php" class="back-button"><i class="fa fa-chevron-circle-left"
                            style="font-size:25px"></i></a>Email List
                </h1>
                <div class="list_email">
                    <h3>
                        <span>Email</span>
                        <span>PhoneNumber</span>
                        <span>Description</span>
                    </h3>
                </div>

                <ul class="email-list">
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User1.home@example.com</span>
                        <span class="phone">123-456-7890</span>
                        <span class="description">Email for contact to creator</span>
                    </li>
                    <li>
                        <span class="email">User2.home@example.com</span>
                        <span class="phone">123-456-7891</span>
                        <span class="description">Email for contact to creator</span>
                    </li>

                </ul>
            </div>


        </main>
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
                        <small class="text-muted">User</small>
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
    <!-- <script src="../Admin Dashboard/submit.js"></script> -->

</body>

</html>