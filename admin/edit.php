<?php

require_once "../config/db.php";

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve product details from the database
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Check if the product exists
    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Product ID not provided.";
    exit;
}

// Check if form is submitted
if(isset($_POST['update'])) {
    // Retrieve form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']); 
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $buy_id = mysqli_real_escape_string($conn, $_POST['buy_id']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    

    // Update product details in the database
    $update_query = "UPDATE `products` SET `slug` = '$slug' , `price` = '$price' , `title` = '$title' , `image` = '$image' , `category` = '$category' , `buy_id` = '$buy_id' , `description` = '$description' WHERE `products`.`id` = $id";

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
    <title>Edit</title>
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
                    <li><a href="contact.php"> Contacts</a></li>
                    <li><a href="blogs.php"> Blogs</a></li>
                </ul>
            </div>
        </section>
        <section class="main">
            <div class="popula_products">
                <div class="popular_products-head">
                    <h2>Edit Product</h2>
                </div>

                    <div >
                     <form method="post">
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" value="<?php echo $product['title']; ?>" />
                            </div>
                            <div class="form-controller">
                                <label for="price">Price</label>
                                <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="image">Image:</label>
                                <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>"  />
                            </div>
                            <div class="form-controller">
                                <label for="category">Category:</label>
                                <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" ><br><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="buy_id">Buy ID:</label>
                                <input type="text" id="buy_id" name="buy_id" value="<?php echo $product['buy_id']; ?>"  />
                            </div>
                            <div class="form-controller">
                                <label for="slug">Slug:</label>
                                <input type="text" id="slug" name="slug" value="<?php echo $product['slug']; ?>" ><br><br>
                            </div>
                        </div>

                        <div class="form-controller">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" placeholder="Description" rows="5" required><?php echo $product['description']; ?></textarea>
                        </div>
                        <button type="submit" name="update" class="btn">Update product</button>
                        <?php 
                            // Check if data is inserted successfully
                            if(mysqli_query($conn, $update_query)) {
                                echo "<div class='success'>Product updated successfully!</div>";
                            } else {
                                echo "<div class='error'>Error: Product could not be updated.</div>";
                            }
                        ?>
                        
                     </form>
                    </div>
            </div>
        </section>
    </div>
</body>
</html>
