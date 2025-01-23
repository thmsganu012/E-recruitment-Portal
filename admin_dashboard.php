<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin Dashboard</title>
     <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- CSS -->
    <link href="CSS/admin_dashboard.css" rel="stylesheet">

     <!-- Font Awesome Icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <nav class="sidebar close">
        <header>
        <div class="image-text">
            <span class="image">
                <img src="Img/admin_logo.png" alt="logo">
            </span>

            <div class="text header-text">
                <span class="name">Admin</span>
            </div>
        </div>
    
             <i class="fa-solid fa-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="admin_dashboard.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="job.php">
                        <i class="fa-solid fa-desktop"></i>
                        <span class="text nav-text">Jobs</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="user_mgmt.php">
                        <i class="fa-solid fa-users"></i>
                        <span class="text nav-text">User Management</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="application.php">
                        <i class="fa-solid fa-clipboard-user"></i>
                        <span class="text nav-text">Applications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="contacts.php">
                        <i class="fa-solid fa-message"></i>
                        <span class="text nav-text">Contacts</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                        <i class="fa-solid fa-cog"></i>
                        <span class="text nav-text">Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
        
        <div class="bottom-content">
            <li class="nav-link">
                <a href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span class="text nav-text">Log Out</span>
                </a>
            </li> 

            <li class="mode">
                <div class="moon-sun">
                    <i class="fas fa-sun sun"></i>
                    <i class="fas fa-moon moon"></i>
                </div>
                <span class="mode-text text">Dark Mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
        </div>
     </nav>

     
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>

        <?php
        include('Connection/db.php');
        $sql = "SELECT total_jobs, total_employers, 
        total_candidates, applications, pending_reviews FROM statistics";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Fetch the data
            $row = $result->fetch_assoc();
            ?>

        <div class="cards">
            <div class="card">
                <h3>Total Jobs</h3>
                <p><?php echo $row['total_jobs']; ?></p>
            </div>
            <div class="card">
                <h3>Active Employers</h3>
                <p><?php echo $row['total_employers']; ?></p>
            </div>
            <div class="card">
                <h3>Total Candidates</h3>
                <p><?php echo $row['total_candidates']; ?></p>
            </div>
            <div class="card">
                <h3>Applications</h3>
                <p><?php echo $row['applications']; ?></p>
            </div>
            <div class="card">
                <h3>Pending Reviews</h3>
                <p><?php echo $row['pending_reviews']; ?></p>
            </div>
        </div>
        <?php
        } else {
            echo "No data available.";
        }
        // Close the connection
        $conn->close();
        ?>

        <div class="recent">
            <h2>Recent Job Postings</h2>

            <?php
            include('Connection/db.php');

            $query = "SELECT job_title, total_vacancy, 
            date_posted, date_expired FROM recent_job";
                   $stmt = $conn->prepare($query);
                   $stmt->execute();
                   $result = $stmt->get_result();
            ?>
            <table>
                <tr>
                    <th>Job Title</th>
                    <th>Total Vacancy</th>
                    <th>Date Posted</th>
                    <th>Expire Date</th>
                </tr>
                <tbody>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['total_vacancy']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_posted']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_expired']); ?></td>
                    </tr>
                    <?php endwhile ?>
                    </tbody>
            </table>
        </div>
    </div>
     
     <script src="JS/admin_dashboard.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>