

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
    
    $display_name =  $_POST['display_name'];
    $position = $_POST['position'];
    $brunch = $_POST['brunch'];
    $function = $_POST['function'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $requester = $_POST['requester'];
    $approver =  $_POST['approver'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO tbl_create_user ( display_name,brunch,position,function,role,status,requester,approver,comment) VALUES (?,?,?,?,?,?, ?, ?,?)";
    // $stmt = mysqli_prepare($con, $sql);
    // mysqli_stmt_bind_param($stmt, "sssssssss", $display_name, $brunch,  $position,  $function, $role, $status, $requester, $approver, $comment);
    $stmt = mysqli_stmt_init($con);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "sssssssss", $display_name, $brunch,  $position,  $function, $role, $status, $requester, $approver, $comment);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/add_user.css">
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
                <a href="../Admin Dashboard/admin.php" class="active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../templates/createuser.php" >
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
                <div class = "form-back">
                    <a href="../templates/user_assessment.php" class="back-button">
                        <i class="fa fa-chevron-circle-left" style="font-size: 25px " >Back</i>
                    </a>
                </div>
                <br></br>
                    <h3>Create User Asessment</h3>

                    <input type="text" name="display_name" required placeholder="enter your name">
                    <div class="form-list">
                        <div class= "select-container">
                            <label for="brunch"># Brunch :</label>
                            <select name="brunch" class="form-control" id="brunch" onchange="updatePositionDropdown()">
                                <option value="Marketing and Communication Department">Marketing and
                                    CommunicationDepartment</option>
                                <option value="Audit Department">Audit Department</option>
                                <option value="IT Department">IT Department</option>
                                <option value="Digital Banking Department">Digital Banking Department</option>
                                <option value="Retail">Retail</option>
                                <option value="Accounting and Finance Department">Accounting and Finance Department
                                </option>
                                <option value="Management Information System">Management Information System</option>
                                <option value="TREASURY">TREASURY</option>
                                <option value="SUPPORT-OPS ">SUPPORT-OPS </option>
                                <option value="AMB Branch">AMB Branch</option>
                                <option value="Sen Sok Branch">Sen Sok Branch</option>
                                <option value="KMS BRANCH">KMS BRANCH</option>
                                <option value="Bak Touk Branch">Bak Touk Branch</option>
                                <option value="Hengly Branch">Hengly Branch</option>
                                <option value="Orkide 2004 Branch">Orkide 2004 Branch</option>
                                <option value="Takhmao Branch">Takhmao Branch</option>
                                <option value="Royal University of Phnom Penh Branch">Royal University of Phnom Penh
                                    Branch</option>
                                <option value="Chbar Ampov Branch">Chbar Ampov Branch</option>
                                <option value="Samdechpan Branch ">Samdechpan Branch </option>
                                <option value="SHV Pshar Ler BRANCH">SHV Pshar Ler BRANCH</option>
                                <option value="SHV Port Branch">SHV Port Branch</option>
                                <option value="Mao Tse Toung Branch">Mao Tse Toung Branch</option>
                                <option value="Phnom Penh Port Branch ">Phnom Penh Port Branch </option>
                                <option value="Siem Reap Branch">Siem Reap Branch</option>
                                <option value="Toulkork Branch">Toulkork Branch</option>
                                <option value="Battambank Branch">Battambank Branch</option>
                                <option value="Phsa Thmey Branch">Phsa Thmey Branch</option>
                                <option value="KampongCham Branch">KampongCham Branch</option>
                                <option value="LEGAL">LEGAL</option>
                                <option value="COMPLIANT">COMPLIANT</option>
                                <option value="Priority Credit Client Office">Priority Credit Client Office</option>
                                <option value="Collection & Recovery Office">Collection & Recovery Office</option>
                                <option value="Credit Administration Office">Credit Administration Office</option>
                                <option value="FI & Corporate Banking Department">FI & Corporate Banking Department
                                </option>
                                <option value="Business Division">Business Division</option>
                                <option value="SME & Consumer Banking Department">SME & Consumer Banking Department
                                </option>
                                <option value="Human Resource">Human Resource</option>
                                <option value="Operational Risk">Operational Risk</option>
                                <option value="INTERNATIONAL">INTERNATIONAL</option>
                                <option value="MANAGEMENT">MANAGEMENT</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="Business Development ">Business Development </option>
                                <option value="VIP BANKING">VIP BANKING</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-list">
                        <div class="select-container">
                            <label for="position"># Position</label>
                            <select name="position" class="form-control" id="position"></select>
                        </div>
                    </div>
                    <div class="form-list">
                        <div class="select-container">
                            <label for="function"># Function</label>
                            <select name="function" class="form-control" id="function">
                            <option value="NA">NA</option>
                            <option value="Sale">Sale</option>
                            <option value="Call Center">Call Center</option>
                            <option value="Report Viewer">Report Viewer</option>
                            <option value="IB Admin">IB Admin</option>
                            <option value="Card and Ebanking">Card and Ebanking</option>
                            <option value="Teller">Teller</option>
                            <option value="Account">Account</option>
                            <option value="VIP">VIP</option>
                            <option value="BM">BM</option>
                            <option value="VIP Bank">VIP Bank</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-list">
                        <div class="select-container">
                            <label for="role"># Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="NA">NA</option>
                                <option value="Checker">Checker</option>
                                <option value="Maker">Maker</option>
                                <option value="Viewer">Viewer</option>
                                <option value="Creator">Creator</option>
                                <option value="Approver">Approver</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-list">
                        <div class="select-container">
                            <label for="status"># Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-container">
                        <input type="text" name="requester" required placeholder="Requester">
                        <input type="text" name="approver" required placeholder="Approver">
                        <input type="text" name="comment" required placeholder="Comment">
                    </div>
                    <input type="submit" name="submit" value="Create User" class="form-btn">
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
    <script src="../Admin Dashboard/list.js"></script>
</body>

</html>