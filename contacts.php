<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Contacts</title>
     <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- CSS -->
    <link href="CSS/contact.css" rel="stylesheet">

     <!-- Font Awesome Icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <?php
    include('Include/sidebar.php');
    ?>

<div class="content">
        <div class="header">
            <h1>Contacts</h1>
        </div>

        <?php
        include('Connection/db.php');

        $query = "SELECT SN, Name, 
        Email, Phone FROM contact_list";
               $stmt = $conn->prepare($query);
               $stmt->execute();
               $result = $stmt->get_result();
        ?>
    <main>
      <div class="search-bar">
        <input type="text" id="search" placeholder="Search contacts...">
      </div>

      <div class="contact-list" id="contactList">
        <!-- Contacts will be dynamically generated -->
        <table>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                <tbody>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    <td><?php echo htmlspecialchars($row['SN']); ?></td>
                    <td><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Email']); ?></td>
                    <td><?php echo htmlspecialchars($row['Phone']); ?></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
      </div>
      
      <button class="chat-btn">
        <span id="openChat">Chat</span>
      </button>
    </main>
    </div>
        
</body>
<script src="JS/admin_dashboard.js"></script>
<script src="JS/contact.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>