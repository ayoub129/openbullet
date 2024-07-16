<?php 

    require_once "config/db.php";

    $query = "SELECT * FROM blog";
    $result = mysqli_query($conn, $query);


if(isset($_POST['submit'])) {
    $search = $_POST['search'];
    header("Location: search.php?q=" . urlencode($search));
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Secure your business with a comprehensive Application, Cyber & Ethical Penetration Testing service. Professional tests to ensure your system is safe and secure.">
    <link rel="canonical" href="https://openbullet.store/" />
    <link rel="shortcut icon" type="image/png" href="assets/images/favicons.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Application, Cyber and Ethical Penetration Testing - OpenBullet Store</title>
</head>
<body>
    <div class="container">
        <section class="sidebar">
            <a href="index.php" class="logo"><span class="text-primary">Open</span>Bullet<span class="sign">®</span></a>
            <div class="cat">
                <button class="btn">CATEGORIES</button>
                <ul>
                    <li><a href="store.php?category=config"><i></i> Config shop</a></li>
                    <li><a href="store.php?category=combo"><i></i> Combo Shop</a></li>
                    <li><a href="store.php?category=checker"><i></i> Checker</a></li>
                    <li><a href="store.php?category=rdp"><i></i> RDP</a></li>
                    <li><a href="store.php?category=program"><i></i> Programs</a></li>
                    <li><a href="store.php?category=accounts"><i></i> Accounts and Databases</a></li>
                    <li><a href="store.php?category=ebooks"><i></i> E-books</a></li>
                </ul>
                <hr />
                <ul>
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="howto.php"> How To ?</a></li>
                    <li><a class="active" href="blog.php"> Our Blog</a></li>
                    <li><a href="about.php"> About Us</a></li>
                    <li><a href="contact.php"> Contact Us</a></li>
                </ul>
            </div>
        </section>
        <section class="main">
            <header>
                <form method="post" class="flex">
                    <i class="fas fa-bars" id="bars"></i>
                    <input type="text" name="search" placeholder="search ..." class="search">
                    <button type="submit" name="submit">
                        <i class="fas fa-magnifying-glass"></i>                   
                    </button>
                </form>
                <a href="store.php?category=config" class="main-btn">Shop Config</a>
            </header>
            <div class="products">
                <div class="popular_products-head">
                    <h2>Blog</h2>
                </div>
                <div class="products-grid">
                    <?php 
                        if ($result) {
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                           <div class="card">
                                <div class=" <?php echo $category == "ebooks" ? "ebook-image" : "card-image" ?>">
                                    <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                                </div>
                                <div class="card-text">
                                    <a href='blog_single.php?slug=<?php echo $row['slug'] ?>' class='card-title'><?php echo $row['name'] ?></a>
                                    <p class="small-desc"><?php echo $row['small_desc'] ?></p>
                                    <p class="secondary">
                                        <a href="blog_single.php?slug=<?php echo $row['slug'] ?>" class="secondary-link mt-5">Read more</a>
                                    </p>
                                </div>
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
</body>
</html>