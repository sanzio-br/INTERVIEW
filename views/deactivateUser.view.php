
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                        <a class="nav-link active" href="addUser.php"><i class="bx bx-user me-1"></i> Add user</a>
                        </li>
                    </ul>
                  <div class="card">
                    <h5 class="card-header">Deactivate Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to Deactivate <?=$model->name?>'s account?</h6>
                          <p class="mb-0">Once you deactivate the account, you can reactivate at any time again.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" method="POST" >
                      <input type="hidden" name="term" value="<?= $model->id; ?>" />
                        <button type="submit" value="Delete" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>

                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->