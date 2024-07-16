<?php
require_once "../config/db.php";

// Start session and check user role
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

// Check if form is submitted
if (isset($_POST['create'])) {
    // Retrieve form data and escape to prevent SQL injection
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $main_image = mysqli_real_escape_string($conn, $_POST['main_image']);
    $small_desc = mysqli_real_escape_string($conn, $_POST['small_desc']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);


    // Insert query
    $insert_query = "INSERT INTO `blog` (`category`, `small_desc`, `slug`, `description`, `name`, `image`) 
                     VALUES ('$category', '$small_desc', '$slug', '$content', '$title', '$main_image')";

    // // Execute the query
    if (mysqli_query($conn, $insert_query)) {
        $message = "Blog post created successfully!";
        $message_type = "success";
    } else {
        $message = "Error: Blog post could not be created. " . mysqli_error($conn);
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create a Blog">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Add Blog</title>
    <style>
        .ckeditor {
            margin-bottom: 1rem; 
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="sidebar">
            <div class="flex">
                <a href="../index.php" class="logo"><span class="text-primary">Open</span>Bullet<span class="sign">®</span></a>
                <i class="fas fa-times" id="times"></i> 
            </div>
            <div class="cat">
                <button class="btn">Menu</button>
                <ul>
                    <li><a href="admin.php">Products</a></li>
                    <li><a href="add.php">Add Product</a></li>
                    <li><a class="active" href="blog.php">Add Blog</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                    <li><a href="blogs.php"> Blogs</a></li>
                </ul>
            </div>
        </section>
        <section class="main">
            <div class="popula_products">
                <div class="popular_products-head">
                    <h2>Add Blog</h2>
                </div>
                <div>
                    <form method="post">
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="category">Category:</label>
                                <input type="text" id="category" name="category" required />
                            </div>
                            <div class="form-controller">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="main_image">Main Image:</label>
                                <input type="text" id="main_image" name="main_image" required />
                            </div>
                            <div class="form-controller">
                                <label for="slug">Slug:</label>
                                <input type="text" id="slug" name="slug" required />
                            </div>
                        </div>
                        <div class="form-controller">
                             <label for="small_desc">Small Description:</label>
                             <textarea id="small_desc" name="small_desc" rows="3" required></textarea>
                        </div>
                        <div class="form-controller ckeditor">
                            <label for="content">Content:</label>
                            <textarea id="content" name="content" rows="10" required></textarea>
                        </div>
                        <button type="submit" name="create" class="btn">Create Blog</button>
                    </form>
                    <?php if (isset($message)) { ?>
                        <div class='<?php echo $message_type; ?>'><?php echo $message; ?></div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Include CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>
