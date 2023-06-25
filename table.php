<!DOCTYPE html>
<html>
<head>
    <title>Responsive Table</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<body>
    <div class="table-container">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Indicator</th>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                    <th>Header 4</th>
                    <th>Header 5</th>
                    <th>Header 6</th>
                    <th>Header 7</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the SQL database
                $servername = "your_servername";
                $username = "your_username";
                $password = "your_password";
                $database = "your_database";

                $conn = mysqli_connect($servername, $username, $password, $database);

                // Check the connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Retrieve data from the SQL table
                $sql = "SELECT * FROM your_table";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>";
                        echo '<div class="indicator-container">';
                        // Display indicator based on data
                        if ($row['indicator'] == 'offline') {
                            echo '<span class="indicator offline" title="Offline"></span>';
                        } else {
                            echo '<span class="indicator normal" title="Normal"></span>';
                        }
                        echo '<span class="indicator-caption">' . $row['indicator'] . '</span>';
                        echo '</div>';
                        echo "</td>";
                        echo "<td>" . $row['header1'] . "</td>";
                        echo "<td>" . $row['header2'] . "</td>";
                        echo "<td>" . $row['header3'] . "</td>";
                        echo "<td>" . $row['header4'] . "</td>";
                        echo "<td>" . $row['header5'] . "</td>";
                        echo "<td>" . $row['header6'] . "</td>";
                        echo "<td>" . $row['header7'] . "</td>";
                        echo '<td class="stop-icon-cell">';
                        echo '<div class="stop-icon" title="Stop">';
                        echo '<i class="fas fa-ban"></i>';
                        echo '</div>';
                        echo '<div class="clock-icon" title="Clock">';
                        echo '<i class="fas fa-clock"></i>';
                        echo '</div>';
                        echo '</td>';
                        echo "</tr>";
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
