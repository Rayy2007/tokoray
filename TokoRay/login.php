<?php
session_start();
include 'db.php';

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $query = "SELECT * FROM tb_admin WHERE username = '$user' AND password = MD5('$pass')";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_object($result);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $data;
        $_SESSION['id'] = $data->admin_id;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TokoRay</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            overflow: hidden;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .box-login {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 280px;
            animation: fadeIn 0.8s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            margin-bottom: 20px;
            color: white;
        }

        .input-control {
            width: 90%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .input-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn {
            width: 50%;
            padding: 10px;
            border: none;
            background: #a0c4ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn:hover {
            background: #89b0f0;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <video autoplay muted loop class="video-bg">
        <source src="source/wintersnow.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php if (isset($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
    </div>
</body>

</html>