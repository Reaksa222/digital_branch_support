

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/show_summary.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container">
        <main>
            <span class="button-container">
                <form method="post" enctype="multipart/form-data">
                    <a href="../templates/user_assessment.php" class="back-button">
                        <i class="fa fa-chevron-circle-left" style="font-size:28px; color: #1b9c85"; >Back</i>
                    </a>
                </form>
            </span>
            <div class="container2">
                <div class="table-container">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DisplayName</th>
                                <th>Position</th>
                                <th>Function</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Approver</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                
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

$sql = "SELECT display_name,position,function, role,brunch,status,requester,approver,start_date,end_date,comment FROM summary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
          
        echo "<td>" . $i++ . "</td>";
        echo "<td>" . $row["display_name"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td>" . $row["function"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["requester"] . "</td>";
        echo "<td>" . $row["approver"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["comment"] . "</td>";
        echo "</tr>";

    }

} else {
    echo "<tr><td colspan='5'>No data available</td></tr>";
}

$conn->close();

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
//     $displayname = $_POST[""];
//     $dropFile = $_POST["drop_file"];
//     $shortDescription = strip_tags($_POST["short_description"]); // Remove HTML tags

//     // Insert data into the database
//     $sql = "INSERT INTO summary ( display_name,function,role, position,brunch,status,requester,approver,start_date,end_date,comment) VALUES (?,?,?,?,?,?,?,?, ?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("sss", $dropFile, $title, $shortDescription);

//     if ($stmt->execute()) {
//         // File uploaded successfully
//         header("Location: input_upload.php?st=success");
//         exit;
//     } else {
//         // Invalid file extension or error
//         header("Location: input_upload.php?st=error");
//         exit;
//     }
// }

?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
</body>

</html>