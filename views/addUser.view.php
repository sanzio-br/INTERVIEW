<!-- Layout container -->
<div class="layout-page">

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row" <?php if(empty($view_bag['message'])){echo "hidden";} ?>>
      <div class="alert alert-success alert-dismissible" role="alert">
                        <?= $view_bag['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link active"
                 href="allUsers.php"><i class="bx bx-left-arrow-alt me-1"></i> back</a>
            </li>
          </ul>

          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
              <hr class="my-0" />
              <div class="card-body">
                <form id="formAccountSettings"
                      method="POST">
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="firstName"
                             class="form-label">Name</label>
                      <input class="form-control"
                             type="text"
                             id="name"
                             name="name"
                             autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="email"
                             class="form-label">E-mail</label>
                      <input class="form-control"
                             type="text"
                             id="email"
                             name="email"
                             placeholder="john.doe@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="organization"
                             class="form-label">ID Number</label>
                      <input type="text"
                             class="form-control"
                             id="id_number"
                             name="id_number"
                             placeholder="3458 6215" />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"
                             for="phoneNumber">Phone Number</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">KE (+254)</span>
                        <input type="text"
                               id="phone"
                               name="phone"
                               class="form-control"
                               placeholder="712 345 546" />
                      </div>
                    </div>
                  </div>
                  <div class="mt-2">
                    <button type="submit"
                            class="btn btn-primary me-2">Save</button>
                    <button type="reset"
                            class="btn btn-outline-secondary">Cancel</button>
                  </div>
                </form>
              </div>
              <!-- /Account -->
            </div>

          </div>
        </div>
      </div>
      <!-- / Content -->

      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->