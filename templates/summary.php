<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/summary.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container">
        <main>
            <span class="button-container">
                <form method="post" enctype="multipart/form-data">
                    <a href="../templates/user_assessment.php" class="back-button">
                        <i class="fa fa-chevron-circle-left" style="font-size:28px; color: #1b9c85">Back</i>
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
                                <th>Brunch</th>
                                <th>Function</th>
                                <th>Role</th>
                                <th>Detail</th>
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
                            $sql = "SELECT * FROM summary ORDER BY id ASC";
                            $result = $conn->query($sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($row['display_name']); ?>
                                        </td>
                                        <td title="<?php echo htmlspecialchars($row['position']); ?>">
                                            <?php
                                            $title = htmlspecialchars($row['position']);
                                            echo strlen($title) > 18 ? substr($title, 0, 80) . '...' : $title;
                                            ?>
                                        </td>

                                        <td title="<?php echo htmlspecialchars($row['brunch']); ?>">
                                            <?php
                                            $shortDescription = htmlspecialchars($row['brunch']);
                                            echo strlen($shortDescription) > 20 ? substr($shortDescription, 0, 60) . '...' : $shortDescription;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($row['function']); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($row['role']); ?>
                                        </td>
                                        <td>
                                            <a href="../templates/show_summary.php?id=<?php echo $row['id']; ?>">detail</a>
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
        </main>
</body>

</html>