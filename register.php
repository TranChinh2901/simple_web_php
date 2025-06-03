<?php
include "database/db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    // Kiểm tra email đã tồn tại chưa
    $check_email = "SELECT id FROM users WHERE email = ?";
    $check_stmt = mysqli_prepare($conn, $check_email);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email đã được sử dụng!');</script>";
    } else {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, address, gender) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hash_password, $address, $gender);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại: " . mysqli_error($conn) . "');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Lỗi chuẩn bị truy vấn: " . mysqli_error($conn) . "');</script>";
        }
    }
    mysqli_stmt_close($check_stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Mungnam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        button {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[name="register"] {
            background: #007bff;
            color: white;
        }

        button[name="register"]:hover {
            background: #0056b3;
        }

        button[type="reset"] {
            background: #6c757d;
            color: white;
        }

        button[type="reset"]:hover {
            background: #545b62;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include 'includes/Header.php' ?>

    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label>Tên:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="password" name="password" required minlength="6">
            </div>

            <div class="form-group">
                <label>Địa chỉ:</label>
                <input type="text" name="address" required>
            </div>

            <div class="form-group">
                <label>Giới tính:</label>
                <select name="gender" required>
                    <option value="">Chọn giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" name="register">Đăng Ký</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <div class="login-link">
            <p>Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
        </div>
    </div>
</body>

</html>