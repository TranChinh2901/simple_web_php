<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            /* background-color: #f5f6fa; */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .error-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }

        .error-content {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); */
            max-width: 500px;
            width: 100%;
        }

        .error-number {
            font-size: 6rem;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .back-home-btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-home-btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 480px) {
            body {
                font-family: Arial, sans-serif;
                min-height: 60vh;
                display: flex;
                flex-direction: column;
            }

            .error-number {
                font-size: 4rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-message {
                font-size: 0.95rem;
            }

            .back-home-btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
        }

        .header {
            position: relative;
            z-index: 10;
        }
    </style>

</head>

<body>
    <?php include "includes/Header.php" ?>

    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="error-container">
        <div class="error-content">
            <div class="error-number">404</div>
            <h1 class="error-title">Oops! Page Not Found</h1>
            <p class="error-message">
                The page you are looking for might have been removed,
                had its name changed, or is temporarily unavailable.
            </p>
            <a href="index.php" class="back-home-btn">Back to Home</a>
        </div>
    </div>
</body>

</html>