<?php 

    require_once "config/db.php";

    // Get the search query from the URL
    $search_query = $_GET['q'];

    // Prepare the SQL query to search for titles and descriptions
    $query = "SELECT * FROM products WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%'";

    // Perform the query
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
    <script type="text/javascript" src="https://shoppy.gg/api/embed.js"></script>
    <link rel="canonical" href="https://openbullet.store/" />
    <link rel="shortcut icon" type="image/png" href="assets/images/favicons.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Application, Cyber and Ethical Penetration Testing - OpenBullet Store</title>
</head>
<body>
    <div class="container">
        <section class="sidebar">
           <div class="flex">
                <a href="index.php" class="logo"><span class="text-primary">Open</span>Bullet<span class="sign">®</span></a>
                <i class="fas fa-times" id="times"></i> 
            </div>
            <div class="cat">
                <button class="btn">CATEGORIES</button>
                <ul>
                    <li><a class="<?php echo $category == "config" ? "active" : "" ?>" href="store.php?category=config"><i></i> Config shop</a></li>
                    <li><a class="<?php echo $category == "combo" ? "active" : "" ?>" href="store.php?category=combo"><i></i> Combo Shop</a></li>
                    <li><a class="<?php echo $category == "checker" ? "active" : "" ?>" href="store.php?category=checker"><i></i> Checker</a></li>
                    <li><a class="<?php echo $category == "rdp" ? "active" : "" ?>" href="store.php?category=rdp"><i></i> RDP</a></li>
                    <li><a class="<?php echo $category == "program" ? "active" : "" ?>" href="store.php?category=program"><i></i> Programs</a></li>
                    <li><a class="<?php echo $category == "accounts" ? "active" : "" ?>" href="store.php?category=accounts"><i></i> Accounts and Databases</a></li>
                    <li><a class="<?php echo $category == "ebooks" ? "active" : "" ?>" href="store.php?category=ebooks"><i></i> E-books</a></li>
                </ul>
                <hr />
                <ul>
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="howto.php"> How To ?</a></li>
                    <li><a href="blog.php"> Our Blog</a></li>
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
            <?php if (mysqli_num_rows($result) > 0) {?>
                <div class="popular_products-head">
                    <h2>products</h2>
                </div>
            <?php } ?>
                <div class="<?php mysqli_num_rows($result) > 0 ? 'products-grid' : "" ?>">
                    <?php 
                  if (mysqli_num_rows($result) > 0) {
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                           <div class="card">
                                <div class=" <?php echo $category == "ebooks" ? "ebook-image" : "card-image" ?>">
                                    <img src="assets/images/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>">
                                </div>
                                <div class="card-text">

                                    <?php if ( $category == "ebooks" ) { ?>
                                            <p class='card-title'><?php echo $row['title'] ?></p>
                                    <?php  } else { ?>
                                            <a href="product.php?slug=<?php echo $row['slug'] ?>" class="card-title"><?php echo $row['title'] ?></a>
                                    <?php } ?>
                                    <?php if ( $category == "ebooks" ) { ?>

                                    <span>
                                        <?php echo $row['description'] ?>
                                    </span>
                                    <?php } ?>

                                    <p class="price"><?php echo $row['price'] ?></p>
                                    <button data-shoppy-product="<?php echo $row['buy_id'] ?>" class="secondary-btn">Buy Now</button>
                                </div>
                            </div>
                    <?php        
                           }
                        } else {
                            echo "<div class='text-center'>No Result for the Search $search_query</div>";
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