<?php 

require_once "config/db.php";

if(isset($_GET['slug'])) {
    $id = $_GET['slug'];
    $query = "SELECT * FROM blog WHERE slug = '$id'";
    $result = mysqli_query($conn, $query);
} else {
    header("Location: index.php");
}

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
    <style>
        .blog.description {
            width: 100%;
        }

        .blog.description img {
            margin-top: 1rem;
            width: auto;
            border: 1px solid white;
        }

        .title {
            font-size: 4rem;
            font-weight: 500;
        }

        h5 {
            margin-top: 1rem;
            color: white;
            font-size: 1.5rem;

        }
        
        .cate {
            background-color: #eee;
            color: black !important;
            padding: 0px 20px;
            border-radius: 8px;
            width: fit-content !important;
            text-align: center;
            margin-bottom: 2rem;
            margin-top: 0.5rem;
        }

        .content p , .content {
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="sidebar">
            <a href="index.php" class="logo"><span class="text-primary">Open</span>Bullet<span class="sign">®</span></a>
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
            <div >
                <?php  while ($row = mysqli_fetch_row($result)) { ?>
                    <div class="blog description">
                            <h4 class="title"><?php echo $row['1'] ?></h4>
                            <img src="<?php echo $row['2'] ?>" alt="<?php echo $row['1'] ?>" />
                            <h5>Category: </h5>
                            <p class="cate"><?php echo $row['5'] ?></p>
                            <div class="content"><?php echo $row['4'] ?></div>
                    </div>
                <?php } ?>
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