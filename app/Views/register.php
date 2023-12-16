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

    .alert-failed {
      color: #571515;
      background-color: #edd4d4;
      border-color: #e6c3c3;
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

    function toggleConfirmPasswordVisibility() {
      var passwordInput = document.getElementById("confirm_password");

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
              <form action="/register_action" method="POST">

                <div class="mb-md-0 mt-md-0 pb-0">

                  <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                  <?php if (session()->getFlashdata('pesan_failed')) : ?>
                    <div class="alert alert-failed" role="alert">
                      <?= session()->getFlashdata('pesan_failed'); ?>
                    </div>
                  <?php endif; ?>

                  <div class="form-outline form-white mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" required />
                  </div>

                  <div class="form-outline form-white mb-2">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required />
                  </div>

                  <div class="password-container form-outline form-white mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required />
                    <span class="toggle-button" onclick="togglePasswordVisibility()"><img src="<?php echo base_url('/eye-fill.svg'); ?>" alt="O"></span>
                  </div>

                  <div class="password-container form-outline form-white mb-4">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" required />
                    <span class="toggle-button" onclick="toggleConfirmPasswordVisibility()"><img src="<?php echo base_url('/eye-fill.svg'); ?>" alt="O"></span>
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                </div>

                <div>
                  <p class="mb-0">Already have an account? <a href="<?php echo base_url('login'); ?>" class="text-white-50 fw-bold">Log in</a>
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