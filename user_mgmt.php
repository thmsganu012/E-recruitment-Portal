<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>User Management</title>
     <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- CSS -->
    <link href="CSS/user_mgmt.css" rel="stylesheet">

     <!-- Font Awesome Icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <?php
    include('Include/sidebar.php');
    ?>

<div class="content">
        <div class="header2">
            <h1>User Management</h1>
            <button class="add-user" onclick="openAddUserForm()">+ Add User</button>
            
            <div class="search">
            <input type="text" class="search-bar" placeholder="search users...">
            <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <!-- Add User Form (Initially Hidden) -->
        <div id="addUserForm" class="add-user-form">
            <h2>Add New User</h2>
            <form action="path_to_add_user_logic.php" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="role">Role</label>
                <input type="text" id="role" name="role" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label>Gender</label>
                 <div class="gender-checkboxes">
                    <label for="male">
                    <input type="checkbox" id="male" name="gender" value="male"> Male
                    </label>
                    <label for="female">
                    <input type="checkbox" id="female" name="gender" value="female"> Female
                    </label>
                    <label for="other">
                    <input type="checkbox" id="other" name="gender" value="other"> Other
                    </label>
                 </div>

                <select id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>

                <button type="submit">Add User</button>
                <button type="button" onclick="closeAddUserForm()">Cancel</button>
            </form>
        </div>

         <?php
         include('Connection/db.php');
         $sql = "SELECT id, name, email, role, action FROM user_list";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>";

                // Fetch rows and display them in the table
          while($row = $result->fetch_assoc()) {
               echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>" . $row["action"] . "</td>
              </tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
        
        // Close connection
        $conn->close();
        ?>   
        </div>
    </div>
</body>
<script src="JS/admin_dashboard.js"></script>
<script src="JS/user_mgmt.js"></script>

</body>
</html>