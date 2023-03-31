
  <!-- Navbar -->

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
       id="layout-navbar">
    <div
         class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4"
         href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center"
         id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
          <i class="bx bx-search fs-4 lh-0"></i>
          <input type="text"
                 class="form-control border-0 shadow-none"
                 placeholder="Search..."
                 aria-label="Search..." />
        </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
          <a class="github-button"
             href="https://github.com/themeselection/sneat-html-admin-template-free"
             data-icon="octicon-star"
             data-size="large"
             data-show-count="true"
             aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow"
             href="javascript:void(0);"
             data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="./assets/img/avatars/1.png"
                   alt
                   class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item"
                 href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="./assets/img/avatars/1.png"
                           alt
                           class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">John
                      Doe</span>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item"
                 href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item"
                 href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item"
                 href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                  <span class="flex-grow-1 align-middle">Billing</span>
                  <span
                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item"
                 href="logout.php">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- <div class="row">
        <div class="col-md-12">
        <div class="alert alert-success alert-dismissible" role="alert">
                        User added Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link active"
                 href="users.php"><i class="bx bx-left-arrow-alt me-1"></i> back</a>
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
                      <input type="hidden" name="id" value="<?= $model->id; ?>" />
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="firstName"
                             class="form-label">Name</label>
                      <input class="form-control"
                             type="text"
                             id="name"
                             name="name"
                             value="<?= $model->name; ?>"
                             autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="email"
                             class="form-label">E-mail</label>
                      <input class="form-control"
                             type="text"
                             id="email"
                             name="email"
                             value="<?= $model->email?>"
                             placeholder="john.doe@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="organization"
                             class="form-label">ID Number</label>
                      <input type="text"
                             class="form-control"
                             id="id_number"
                             name="id_number"
                             value="<?= $model->id_number; ?>"
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
                               value="<?= substr($model-> phone,4); ?>"
                               class="form-control"
                               placeholder="712 345 546" />
                      </div>
                    </div>
                  </div>
                  <div class="mt-2">
                    <button type="submit"
                            class="btn btn-primary me-2">Update</button>
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