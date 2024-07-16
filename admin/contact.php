<?php
require_once "../config/db.php";

// Retrieve contact messages from the database
$query = "SELECT * FROM contacts";
$result = mysqli_query($conn, $query);

session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Secure your business with a comprehensive Application, Cyber & Ethical Penetration Testing service. Professional tests to ensure your system is safe and secure.">
    <link rel="canonical" href="https://openbullet.store/" />
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicons.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Contact</title>
</head>
<body>
    <div class="container">
        <section class="sidebar">
            <div class="flex">
                <a href="../index.php" class="logo"><span class="text-primary">Open</span>Bullet<span class="sign">®</span></a>
                <i class="fas fa-times" id="times"></i> 
            </div>
            <div class="cat">
                <button class="btn" >Menu</button>
                <ul>
                    <li><a href="admin.php"> products</a></li>
                    <li><a href="add.php"> Add product</a></li>
                    <li><a href="blog.php">Add Blog</a></li>
                    <li><a class="active" href="contact.php"> Contacts</a></li>
                    <li><a href="blogs.php"> Blogs</a></li>
                </ul>
            </div>
        </section>
        <section class="main">
            
            <?php if(mysqli_num_rows($result) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Sent At</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['first_name'] ?></td>
                                <td><?php echo $row['last_name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['message'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                            </tr>
                      <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo "No contact messages found.";
            } ?>
        
        </section>
     </div>
    </body>
</html>
