<?php 

require_once "../config/db.php";
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);


// Check if the delete button is clicked
if(isset($_POST['delete'])) {
    // Get the product ID to delete
    $id = $_POST['id'];
    
    // Construct the SQL query to delete the product
    $delete_query = "DELETE FROM products WHERE id = $id";
    
    // Execute the delete query
    if(mysqli_query($conn, $delete_query)) {
        // Product deleted successfully, you can redirect or show a message
        header("Location: admin.php");
        exit;
    } else {
        // Error occurred while deleting the product
        echo "Error: " . mysqli_error($conn);
    }
}

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
    <title>Admin</title>
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
                    <li><a class="active" href="admin.php"> Products</a></li>
                    <li><a href="add.php"> Add product</a></li>
                    <li><a href="blog.php">Add Blog</a></li>
                    <li><a href="contact.php"> Contacts</a></li>
                    <li><a href="blogs.php"> Blogs</a></li>
                </ul>
            </div>
        </section>
        <section class="main">
            <div class="popula_products">
                <div class="popular_products-head">
                    <h2>
                        All products
                    </h2>
                </div>


                <div class="products-grid">
                    <?php 
                        if ($result) {
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                   <div class="card">
                        <div class="card-image">
                          <img src="../assets/images/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>">
                        </div>
                        <form method="post" class="card-text">
                            <a href="../product.php?slug=<?php echo $row['slug'] ?>" class="card-title"><?php echo $row['title'] ?></a>
                            <p class="price"><?php echo $row['price'] ?></p>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="edit-btn">Edit</a>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                            <button name="delete" type="submit" class="error-btn">Delete</a>
                        </form>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </div>

            <footer>
                Copyright &copy; 2019-2024 <strong>Open Bullet</strong> | <strong>Silver Bullet</strong> | <strong>Configs Store</strong> All rights reserved.
                <a href="mailto:jamie@fakeemail.com" target="_blank">
                    hello@openbullet.store
                </a>
            </footer>
        </section>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>