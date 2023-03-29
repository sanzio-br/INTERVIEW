<!DOCTYPE html>
<html lang="en"
      class="light-style layout-menu-fixed"
      dir="ltr"
      data-theme="theme-default"
      data-assets-path="./assets/"
      data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>PDF</title>

  <meta name="description"
        content="" />

  <!-- Favicon -->
  <link rel="icon"
        type="image/x-icon"
        href="./assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect"
        href="https://fonts.googleapis.com" />
  <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet"
        href="./assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet"
        href="./assets/vendor/css/core.css"
        class="template-customizer-core-css" />
  <link rel="stylesheet"
        href="./assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
  <link rel="stylesheet"
        href="./assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet"
        href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="./assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <!-- <div class="row">
              <div class="col-md-12">
              <div class="divider">
                        <div class="divider-text">Text</div>
                      </div>
              </div>
            </div> -->

            <div class="row">
              <div class="col-md-12">
                <!-- Striped Rows -->
                <div class="card">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-left">ID</th>
                          <th class="text-left">Name</th>
                          <th class="text-left">Mpesa receipt</th>
                          <th class="text-left">Amount</th>
                          <th class="text-left">Date</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php foreach ($transactions as $transaction): ?>
                          <tr>
                            <td><i
                                 class="fab fa-angular fa-lg text-danger me-3"></i>
                              <strong>
                                <?= $transaction->id ?>
                              </strong>
                            </td>
                            <td>
                              <?= $transaction->name ?>
                            </td>
                            <td>
                              <?= $transaction->MpesaReceiptNumber ?>
                            </td>
                            <td>
                              <?= $transaction->amount ?>
                            </td>
                            <td>
                              <?= $transaction->time ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/ Striped Rows -->
              </div>
            </div>
            <!--/ Layout Demo -->

          </div>
          <!-- / Content -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="./assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./assets/vendor/libs/popper/popper.js"></script>
  <script src="./assets/vendor/js/bootstrap.js"></script>
  <script
          src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="./assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="./assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async
          defer
          src="https://buttons.github.io/buttons.js"></script>
</body>

</html>