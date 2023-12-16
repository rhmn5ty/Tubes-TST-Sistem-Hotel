<!-- <html>

<body>
    <h2>Login</h2>
    <form action="/login_action" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">
            Signin</button>
    </form>
</body>

</html> -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <script rel="stylesheet" src="<?= base_url('js/bootstrap.min.js') ?>"></script>

    <style>
        .gradient-custom {
            background: #ddd;
        }

        .toggle-button {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-container {
            position: relative;
        }

        .alert {
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");

            // Toggle the input type between "password" and "text"
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="/login_action" method="POST">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-4">Please enter your email and password!</p>
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" />
                                    </div>

                                    <div class="password-container form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                                        <span class="toggle-button" onclick="togglePasswordVisibility()"><img src="<?php echo base_url('/eye-fill.svg'); ?>" alt="O"></span>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="<?php echo base_url('register'); ?>" class="text-white-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>