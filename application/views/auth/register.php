<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css">
    <title>Register form - Bedimcode</title>
</head>
<body>
    <div class="login">
        <img src="<?=base_url()?>assets/img/lgregbg.jpg" alt="image" class="login__bg">
        <form action="<?= base_url('cauth/prosesregister') ?>" method="post" class="login__form">
            <h1 class="login__title">Register</h1>
            <?php
                $pesan = $this->session->flashdata('pesan');
                $color = $this->session->flashdata('color');
                if ($pesan != "") {
            ?>
                <div class="alert alert-<?=$color?> alert-dismissible fade show" role="alert">
                    <?php echo $pesan; ?>                        
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required class="login__input">
                    <i class="ri-user-fill"></i>
                </div>
                <div class="login__box">
                    <input type="email" name="email" placeholder="Email ID" required class="login__input">
                    <i class="ri-user-fill"></i>
                </div>
                <div class="login__box">
                    <input type="text" name="alamat" placeholder="Alamat" required class="login__input">
                    <i class="ri-user-fill"></i>
                </div>
                <div class="login__box">
                    <input type="text" name="no_hp" placeholder="No.Handphone" required class="login__input">
                    <i class="ri-user-fill"></i>
                </div>
                <div class="login__box">
                    <input type="password" name="password" placeholder="Password" required class="login__input" id="password">
                    <i class="ri-lock-2-fill" onclick="showpassword()" id="icon"></i>
                </div>
            </div>
    
            <button type="submit" class="login__button">Register</button>
            <div class="login__register">
            already a member! <a href="<?= base_url('cauth/login') ?>">Login</a>
            </div>
        </form>
    </div>

    <script language='javascript'>
        function showpassword() {
            var password = document.getElementById('password');
            var icon = document.getElementById('icon');
            if (password.type === 'password') {
                password.type = 'text';
                icon.className = 'ri-lock-2-line';
            } else {
                password.type = 'password';
                icon.className = 'ri-lock-2-fill';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
