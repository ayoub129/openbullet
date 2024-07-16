<?php 

require_once "config/db.php";
$query = "SELECT * FROM products LIMIT 8";

$result = mysqli_query($conn, $query);

$blog = "SELECT * FROM blog";
$blog_result = mysqli_query($conn, $blog);

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
                <button class="btn" >CATEGORIES</button>
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
                    <li><a class="active" href="index.php"> Home</a></li>
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
            <div class="banner">
                <div class="banner-text">
                    <h1>
                        OpenBullet 
                        <div>
                            "the best <span class="text-primary">Software</span>  for web application security testing and automated account penetration testing"
                        </div>
                    </h1>
                    <hr />
                    <p>
                        OpenBullet is a powerful open-source software widely used for web application security testing and penetration testing. It automates various web-based attacks, such as brute forcing, account takeover, and credential stuffing.
                    </p>
                    <a href="https://mega.nz/file/quhAiD6a#h470hQEBPRbSRjOZnhNzylpyfH209uLNN8WuZINwaI4" class="main-btn">
                        Download OpenBullet
                    </a>
                    <p class="ps">@password: openbullet.store</p>
                </div>
                <div class="banner-img">
                    <img src="assets/images/openbullet_config.jpg" alt="Open Bullet Config image">
                </div>
            </div>
            <div class="popular_products">
                <div class="popular_products-head">
                    <h2>
                        Popular products
                    </h2>
                    <a href="store.php?category=config" class="main-btn">
                        See more
                    </a>
                </div>


                <div class="products-grid">
                    <?php 
                        if ($result) {
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                   <div class="card">
                        <div class="card-image">
                        <img src="assets/images/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>">
                        </div>
                        <div class="card-text">
                            <a href="product.php?slug=<?php echo $row['slug'] ?>" class="card-title"><?php echo $row['title'] ?></a>
                            <p class="price"><?php echo $row['price'] ?></p>
                            <button data-shoppy-product="<?php echo $row['buy_id'] ?>" class="secondary-btn">Buy Now</button>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="courses">
                <div class="courses-head">
                    <h2>
                        Our Courses
                    </h2>
                    <a href="store.php?category=ebooks" class="main-btn">
                        See more
                    </a>
                </div>
                <div class="courses-cards">
                    <div class="course-card">
                        <span class="text-gray">For Only</span>
                        <p class="price">10.00$</p>
                        <h3>Cracking Course</h3>
                        <p class="text-gray">
                            Our cracking course provides a robust suite of tools for security testing and penetration, complemented by audio explanations for enhanced understanding. Additionally, learners benefit from comprehensive video tutorials and detailed textual resources to facilitate mastery of the subject matter.
                        </p>
                        <h4 class="absolute-text">Cracking</h4>
                        <button data-shoppy-product="l9N1ZBy" class="main-btn">Buy Now</button>
                    </div>
                    <div class="course-card active">
                        <span class="text-gray">For Only</span>
                        <p class="price">20.00$</p>
                        <h3>Advanced Course</h3>
                        <p class="text-gray">
                            Our advanced course delves into OpenBullet Anomaly and SilverBullet[2024], alongside OpenBullet 2021, featuring a rich array of tools for penetration testing. Participants benefit from audio guidance, detailed video tutorials, and comprehensive textual resources, ensuring thorough comprehension and mastery of the subject matter.
                        </p>
                        <h4 class="absolute-text">Advanced</h4>
                        <button data-shoppy-product="4cq4flv" class="secondary-btn">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="popular_products">
                <div class="popular_products-head">
                    <h2>
                        Our Blog
                    </h2>
                    <a href="blog.php" class="main-btn">
                        Read more
                    </a>
                </div>

                <div class="products-grid">
                    <?php 
                                while ($row = mysqli_fetch_assoc($blog_result)) {
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
                        ?>
                </div>
            </div>
            <div class="d-flex">
               <div class="popular_products">
                    <div class="popular_products-head">
                        <h2>
                            Note
                        </h2>
                    </div>
                    <p class="note_text">
                        Note - <span>IMPORTANT!</span> Performing (D)DoS attacks or credential stuffing on sites you do not own (or you do not have permission to test) is illegal! The developer or this website will not be held responsible for improper use of this software.
                    </p>
                </div>
                <div class="popular_products">
                    <div class="popular_products-head">
                        <h2>
                            Donate
                        </h2>
                    </div>
                    <p class="donate_text">
                        OpenBullet configs is the result of numerous hours of passionated work from a small team of computer security enthusiasts. If you appreciated our work and you want to see OpenBullet configs kept being developed, please consider making a donation to our efforts via <span class="bitcoin">Ƀ</span>itcoins to 
                        <code>
                            1CgAkPMgSG5SXvkTQnxU52HE2j8P9643Je.
                        </code>
                    </p> 
                </div>
            </div>

            <div class="d-flex">
               <div class="popular_products">
                    <div class="popular_products-head">
                        <h2>
                            License
                        </h2>
                    </div>
                    <p class="note_text">
                        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the <span>"Software"</span>), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
                    </p>
                </div>
                <div class="popular_products">
                    <div class="popular_products-head">
                        <h2>
                         Disclaimer
                        </h2>
                    </div>
                    <p class="donate_text">
                    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, <a href="tutorial.php">Openbullet tutorial</a>, <a href="blog.php">Openbullet blogs</a> , This Anther Checker Program Like Openbullet Free Download SilverBullet V1.1.2 , STORM 2.6.0.2 Original Version , Sentry MBA 1.4.1 , Cheap Rdp ,TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE OPENBULLET ANOMALY NETFLIX CONFIG .</p> 
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