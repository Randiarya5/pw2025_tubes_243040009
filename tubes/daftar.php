<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role']; // admin atau user

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Email sudah terdaftar!";
    } else {
        $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role')";
        if (mysqli_query($koneksi, $sql)) {
            echo "Akun berhasil dibuat. <a href='login.php'>Login</a>";
        } else {
            echo "Gagal daftar: " . mysqli_error($koneksi);
        }
    }
}
?>



<form method="POST" action="">
                <div class="login-container">
                <div class="login-box">
                <h2>Daftar Pastibisa</h2>
                <input type="text" name="email" placeholder="email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Daftar</button>
        <p class="login-link">sudah punya akun? <a href="login.php">login</a></p>
           </form> 
      </div>
    </div>

 



<!-- css daftar -->

<style>
    /* Reset dasar */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
}

/* Kontainer utama */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Kotak login/daftar */
.login-box {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

.login-box h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

/* Input form */
.login-box label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #333;
}

.login-box input[type="text"],
.login-box input[type="password"],
.login-box input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 15px;
}

/* Tombol */
.login-box button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.login-box button:hover {
    background-color: #0056b3;
}

/* Link ke daftar atau login */
.login-link {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.login-link a {
    color: #007bff;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}

</style>