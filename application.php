<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Applications</title>
     <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- CSS -->
    <link href="CSS/application.css" rel="stylesheet">

     <!-- Font Awesome Icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <?php
    include('Include/sidebar.php');
    ?>

    <div class="content">
        <div class="header">
            <h1>Application List</h1>
        </div>
        <?php 
        include('Connection/db.php');

        $query = "SELECT SN, Job_Title, Applicant, 
        Email, Phone, Applied_Date, Status FROM application_list";
       $stmt = $conn->prepare($query);
       $stmt->execute();
         $result = $stmt->get_result();
         ?>

            <table>
                <tr>
                    <th>SN</th>
                    <th>Job Title</th>
                    <th>Applicant</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Applied Date</th>
                    <th>Status</th>
                </tr>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['SN']); ?></td>
                            <td><?php echo htmlspecialchars($row['Job_Title']); ?></td>
                            <td><?php echo htmlspecialchars($row['Applicant']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['Applied_Date']); ?></td>
                            <td><?php echo htmlspecialchars($row['Status']); ?></td>
                        </tr>
                        <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="JS/admin_dashboard.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>

