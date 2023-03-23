<!-- Layout container -->
<div class="layout-page">
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
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block"><?$model -> name?></span>
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
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                        <a class="nav-link active" href="addUser.php"><i class="bx bx-user me-1"></i> Add user</a>
                        </li>
                    </ul>
                    <!-- Striped Rows -->
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Number</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Contributions</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php foreach ($model as $user): ?>
                                        <tr>
                                            <td><i
                                                   class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong><?= $user->id_number ?></strong>
                                            </td>
                                            <td><?= $user->name ?></td>
                                            <td><?= $user->phone ?></td>
                                            <td><?= $user->email ?></td>
                                            <td>Ksh 3000</td>
                                            <td><?php
                                                      if($user->active === 1){
                                                        echo "<span class=\"badge bg-label-primary me-1\"></span>active</span>";
                                                      }else{
                                                        echo "<span class=\"badge bg-label-primary me-1\"></span>inactive</span>";
                                                      }
                                                      ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                        <i
                                                           class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                           href="updateUser.php?key=<?= $user -> id ?>">
                                                           <i class="bx bx-edit-alt me-1"></i>
                                                            Edit</a>
                                                            <a class="dropdown-item" 
                                                           href="deactivateUser.php?key=<?= $user -> id ?>">
                                                            Deactivate</a>
                                                            <a class="dropdown-item"
                                                           href="activateUser.php?key=<?= $user -> id ?>">
                                                            Activate</a>
                                                    </div>
                                                </div>
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
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>
<!-- / Layout page -->