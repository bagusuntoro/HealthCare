<?php
require_once "koneksi.php";
// Skrip untuk memproses login
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ganti ini dengan validasi pengguna dari database Anda
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];

        if ($row["level"] == "1") {
            header("Location: app/index.html");
        } else {
            header("Location: halaman_pengguna.php");
        }
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Care</title>
    <!-- custom css -->
    <style>
        body {
            width: 100%;
            height: 500px;
            background-image: url(assets/img/bg.PNG);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .cardCustom {
            width: 500px !important;
            margin: auto;
        }
    </style>

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 cardCustom">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 text-primary">Welcome Back!</h1>
                            </div>
                            <form class="user mt-5" method="POST" action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="email" class="form-control form-control-user" id="email"
                                            name="email"
                                        aria-describedby="emailHelp"
                                        placeholder="Masukkan Email"
                                        />
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password"
                                        placeholder="Masukkan Password"
                                        />
                                        <button type="button" class="btn btn-link input-group-text" id="showPassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mt-3 ">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    v-model="checked" />
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="float-end">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user mb-3 btn-block mt-3 w-100">
                                    Login
                                </button>

                                <a href="#">Dont have account? Sing Up!</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script>
        // JavaScript untuk menampilkan/menyembunyikan kata sandi
        const passwordInput = document.getElementById("password");
        const showPasswordButton = document.getElementById("showPassword");

        showPasswordButton.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>
</body>

</html>