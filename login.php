<?php
// Memulai sesi PHP untuk menyimpan status login
session_start();

// Jika user sudah login, langsung arahkan ke tu.php (tidak perlu login lagi)
if (isset($_SESSION['sudah_login']) && $_SESSION['sudah_login'] === true) {
    header("Location: tu.php");
    exit;
}
$error = "";

// Jika tombol masuk ditekan
if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VALIDASI LOGIN SEMENTARA (Nanti bisa disambung ke Database / MySQL)
    // Silakan ganti 'admin' dan 'sekolah123' sesuai keinginan Anda
    if ($username === 'admin' && $password === 'sekolah123') {
        
        // Buat sesi bahwa user berhasil login
        $_SESSION['sudah_login'] = true;
        $_SESSION['nama_user'] = "Admin Tata Usaha"; 
        
        // Arahkan ke file tu.php
        header("Location: b.html");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sekolah</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; text-align: center; }
        .login-container h2 { color: #2c3e50; margin-bottom: 10px; }
        .login-container p { color: #7f8c8d; margin-bottom: 20px; font-size: 14px; }
        .alert { background-color: #fee2e2; color: #dc2626; padding: 10px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; border: 1px solid #f87171; }
        .input-group { margin-bottom: 20px; text-align: left; }
        .input-group label { display: block; margin-bottom: 8px; color: #34495e; font-size: 14px; font-weight: 600; }
        .input-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; outline: none; transition: border-color 0.3s; }
        .input-group input:focus { border-color: #059669; }
        .btn-login { width: 100%; padding: 12px; background-color: #059669; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s; }
        .btn-login:hover { background-color: #047857; }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Portal Sekolah</h2>
        <p>Silakan masuk untuk mengakses Profil Sekolah</p>

        <!-- Menampilkan pesan error jika password salah -->
        <?php if ($error !== ""): ?>
            <div class="alert"><?php echo $error; ?>
        <?php endif; ?>

        <!-- Gunakan method="POST" agar password tidak terlihat di URL -->
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username / NIP</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username atau NIP" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" name="submit_login" class="btn-login">Masuk</button>
        </form>
    </div>

</body>
</html>