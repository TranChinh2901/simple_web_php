<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/Header.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1 style="font-size: 26px;">
            <a href="index.php" style="color: white;">Cael Stratos</a>
        </h1>

        <nav class="navbar">
            <ul class="nav-links-ul">
                <li><a class="a-header" href="index.php">Home</a></li>
                <li><a class="a-header" href="about.php">About</a></li>
                <li><a class="a-header" href="contact.php">Contact</a></li>
            </ul>
        </nav>

        <div class="dropdown">
            <button>
                <i class="fas fa-user-circle"></i>
                <?php
                if (isset($_SESSION['user_id']) && isset($_SESSION['name'])) {
                    echo "Xin chào, " . htmlspecialchars($_SESSION['name']);
                } else {
                    echo "Tài khoản";
                }
                ?>
                <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0): // Vai trò người dùng 
                    ?>
                        <a href="profile_user.php"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1): // Vai trò admin 
                    ?>
                        <a href="admin/index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <a href="profile_user.php"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php else: ?>
                        <!-- Trường hợp role không xác định -->
                        <a href="profile_user.php"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="user-links">
                        <a href="login.php">Login</a>
                        <a href="register.php">Register</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>



        <!-- Hamburger menu for mobile -->
        <div class="hamburger" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <div class="mobile-menu" id="mobileMenu">
        <div class="close-menu" onclick="toggleMobileMenu()">&times;</div>
        <div class="mobile-menu-content">
            <ul class="nav-links-ul">
                <li><a class="a-header" href="index.php" onclick="toggleMobileMenu()">Home</a></li>
                <li><a class="a-header" href="about.php" onclick="toggleMobileMenu()">About</a></li>
                <li><a class="a-header" href="contact.php" onclick="toggleMobileMenu()">Contact</a></li>
            </ul>

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-links">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0): // Vai trò người dùng 
                    ?>
                        <a href="profile_user.php" onclick="toggleMobileMenu()"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="cart.php" onclick="toggleMobileMenu()"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        <a href="logout.php" onclick="toggleMobileMenu()"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1): // Vai trò admin 
                    ?>
                        <a href="admin/index.php" onclick="toggleMobileMenu()"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <a href="profile_user.php" onclick="toggleMobileMenu()"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="logout.php" onclick="toggleMobileMenu()"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php else: ?>
                        <!-- Trường hợp role không xác định -->
                        <a href="profile_user.php" onclick="toggleMobileMenu()"><i class="fas fa-user"></i> Hồ sơ</a>
                        <a href="logout.php" onclick="toggleMobileMenu()"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="user-links">
                    <a href="login.php" onclick="toggleMobileMenu()">Login</a>
                    <a href="register.php" onclick="toggleMobileMenu()">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburger = document.querySelector('.hamburger');

            mobileMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburger = document.querySelector('.hamburger');

            if (!hamburger.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.remove('active');
                hamburger.classList.remove('active');
            }
        });

        window.addEventListener('resize', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburger = document.querySelector('.hamburger');

            if (window.innerWidth > 640) {
                mobileMenu.classList.remove('active');
                hamburger.classList.remove('active');
            }
        });
    </script>
</body>

</html>