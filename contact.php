<?php 
require_once "config/db.php";

if(isset($_POST['submit'])) {
    $search = $_POST['search'];
    header("Location: search.php?q=" . urlencode($search));
    exit(); 
}

if(isset($_POST['send'])) {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute SQL statement to insert data into the database
    $query = "INSERT INTO contacts (first_name, last_name, email, message) VALUES (?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ssss", $first_name, $last_name, $email, $message);
    mysqli_stmt_execute($statement);

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
    <title>Contact us</title>
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
                    <li><a  href="blog.php"> Our Blog</a></li>
                    <li><a  href="about.php"> About Us</a></li>
                    <li><a class="active" href="contact.php"> Contact Us</a></li>
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

            <div class="products about">
                    <div class="popular_products-head">
                        <h2>Contact us</h2>
                    </div>

                    <form method="post">
                        <div class="form-group">
                            <div class="form-controller">
                                <label for="first">First Name</label>
                                <input type="text" id="first" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-controller">
                                <label for="last">Last Name</label>
                                <input type="text" id="last" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-controller">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-controller">
                            <label for="msg">Message</label>
                            <textarea id="msg" name="message" placeholder="Message" rows="5" required></textarea>
                        </div>
                        <button type="submit" name="send" class="btn">Send Message</button>
                        <?php 
                            // Check if data is inserted successfully
                            if(mysqli_stmt_affected_rows($statement) > 0) {
                                echo "<div class='success'>Message sent successfully!</div>";
                            } else {
                                echo "<div class='error'>Error: Message could not be sent.</div>";
                            }
                        ?>
                        
                    </form>

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