<?php
include '../muamalat-login/php/koneksi.php';
$idError = "";
$passError = "";
if (isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $pass = $_POST['pass'];

    if (count((array) $koneksi->query('SELECT user_ID FROM user WHERE user_ID = "' . $user_id . '"')->fetch_array()) == 0) { //mengambil baris hasil sebagai array asosiatif, array numerik, atau keduanya.
        $idError = "<i class='bx bx-error-circle error-icon'></i> User ID Anda Salah!";
    } elseif (count((array) $koneksi->query('SELECT password FROM user WHERE password = "' . $pass . '"')->fetch_array()) == 0) {
        $passError = "<i class='bx bx-error-circle error-icon'></i> Password Anda Salah!";
    } else {
        $users = $koneksi->query('SELECT password, nama FROM user')->fetch_assoc(); //mengambil baris hasil sebagai array asosiatif.

        if (password_verify($password, $users['password'])) {
            $_SESSION['is_login'] = $users['nama'];
            session_start();
            header('location:#');
        } else {
            header('location:#');
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Muamalat</title>
    <link rel="icon" type="image/x-icon" href="img/logo-icon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.cdnfonts.com/css/myriad-pro?styles=949,946" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/myriad-pro?styles=949,946" rel="stylesheet" />
</head>

<body>
    <?php include "header.php"; ?>
    <div class="login">
        <div class="login-content">
            <div class="right-item">
                <div id="slider-container">
                    <div id="slider">
                        <div class="slide"><img src="img/login-1.png" alt="Slide 1"></div>
                        <div class="slide"><img src="img/login-2.png" alt="Slide 2"></div>
                        <div class="slide"><img src="img/login-3.png" alt="Slide 3"></div>
                    </div>
                    <div class="slider-buttons">
                        <button id="prev" onclick="prevSlide()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <button id="next" onclick="nextSlide()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M16.1716 13.0001L4 13.0001L4 11.0001L16.1716 11.0001L10.8076 5.6362L12.2218 4.222L20 12.0001L12.2218 19.7783L10.8076 18.3641L16.1716 13.0001Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="left-item">
                <form method="post" id="loginForm">
                    <div class="div-text">
                        <p class="txt-login">
                            Assalamualaikum <br>
                            Warahmatullahi Wabarakatuh
                        </p>
                        <p class="txt-login1">
                            Selamat datang di Internet Banking Muamalat
                        </p>
                    </div>
                    <div class="form-content">
                        <div class="div-user">
                            <label class="lb-title">User ID</label>
                            <div>
                                <input type="text" name="user_id" id="user_id" placeholder="Masukkan User ID Anda"
                                    required>
                                <span class="error">
                                    <?php echo $idError ?>
                                </span>
                            </div>
                        </div>
                        <div class="div-pass">
                            <label class="lb-title">Password</label>
                            <div>
                                <input type="password" name="pass" id="pass" placeholder="Masukkan Password Anda"
                                    required>
                                <span class="error">
                                    <?php echo $passError ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-form">
                        <button type="submit" name="login">Submit</button>
                        <button type="reset" name="reset">Clear</button>
                    </div>
                    <div class="div-text2">
                        <p class="txt">
                            <span class="first-txt">Baca <span>Persyaratan dan Kebijakan</span></span>
                            <span class="twice-txt">All rights reserved. Copyright &copy; 2011 Bank Muamalat
                                Indonesia.</span>
                            <span class="third-txt">Tips Keamanan Perbankan</span><span class="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z"
                                        fill="#500878" />
                                </svg>
                            </span>
                        </p>
                    </div>
                    <div class="contact">
                        <div class="tel-dam">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path
                                    d="M15.75 12.315V14.9671C15.75 15.3608 15.4456 15.6875 15.0529 15.7153C14.7248 15.7384 14.4572 15.75 14.25 15.75C7.62255 15.75 2.25 10.3774 2.25 3.75C2.25 3.54278 2.26159 3.27515 2.28476 2.94713C2.31253 2.55441 2.6392 2.25 3.03289 2.25H5.68508C5.87758 2.25 6.03882 2.39582 6.05815 2.58735C6.0755 2.7593 6.09163 2.89735 6.10655 3.00151C6.25826 4.06104 6.56815 5.06952 7.01152 6.00227C7.08269 6.15199 7.03628 6.33119 6.90139 6.42754L5.28266 7.58385C6.26814 9.88583 8.11417 11.7319 10.4162 12.7174L11.5703 11.1014C11.6679 10.9649 11.8492 10.918 12.0007 10.9899C12.9334 11.4329 13.9418 11.7425 15.0012 11.8938C15.1047 11.9087 15.2419 11.9246 15.4126 11.9419C15.6042 11.9612 15.75 12.1225 15.75 12.315Z"
                                    fill="white" />
                            </svg>
                            <span class="txt2">Dalam Negeri : 150016</span>
                        </div>
                        <div class="tel-dam">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path
                                    d="M15.75 12.315V14.9671C15.75 15.3608 15.4456 15.6875 15.0529 15.7153C14.7248 15.7384 14.4572 15.75 14.25 15.75C7.62255 15.75 2.25 10.3774 2.25 3.75C2.25 3.54278 2.26159 3.27515 2.28476 2.94713C2.31253 2.55441 2.6392 2.25 3.03289 2.25H5.68508C5.87758 2.25 6.03882 2.39582 6.05815 2.58735C6.0755 2.7593 6.09163 2.89735 6.10655 3.00151C6.25826 4.06104 6.56815 5.06952 7.01152 6.00227C7.08269 6.15199 7.03628 6.33119 6.90139 6.42754L5.28266 7.58385C6.26814 9.88583 8.11417 11.7319 10.4162 12.7174L11.5703 11.1014C11.6679 10.9649 11.8492 10.918 12.0007 10.9899C12.9334 11.4329 13.9418 11.7425 15.0012 11.8938C15.1047 11.9087 15.2419 11.9246 15.4126 11.9419C15.6042 11.9612 15.75 12.1225 15.75 12.315Z"
                                    fill="white" />
                            </svg>
                            <span class="txt2">Luar Negeri : +6221 8066 8000</span>
                        </div>
                        <div class="tel-dam">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path
                                    d="M2.25 2.25H15.75C16.1642 2.25 16.5 2.58579 16.5 3V15C16.5 15.4142 16.1642 15.75 15.75 15.75H2.25C1.83579 15.75 1.5 15.4142 1.5 15V3C1.5 2.58579 1.83579 2.25 2.25 2.25ZM9.04545 8.76218L4.23541 4.67828L3.26458 5.82172L9.05482 10.7378L14.7408 5.81712L13.7592 4.68288L9.04545 8.76218Z"
                                    fill="white" />
                            </svg>
                            <span class="txt2">salamuamalat@muamalat.co.id</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/slide.js"></script>
</body>

</html>