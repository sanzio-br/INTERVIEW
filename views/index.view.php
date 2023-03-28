<div class="layout-page">
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-8 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Congratulations
                    <?= $view_bag['user'] ?>! 🎉
                  </h5>
                  <p class="mb-4">
                    You Are almost done with your contributions 🎉
                  </p>
                  <form action=""
                        method="POST">
                    <div class="flex">
                      <input type="hidden"
                             name="phone"
                             value="<?= $_SESSION['phone']; ?>">
                      <label for="organization"
                             class="form-label">
                        <h5 class="card-title text-primary">Enter amount to
                          contribute</h5>
                      </label>
                      <input type="text"
                             class="form-control mb-3"
                             id="amount"
                             name="amount"
                             placeholder="Enter amount to contribute" />
                      <button type="submit"
                              class="btn btn-sm btn-primary">contribute</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img src="./assets/img/illustrations/man-with-laptop-light.png"
                       height="140"
                       alt="View Badge User"
                       data-app-dark-img="illustrations/man-with-laptop-dark.png"
                       data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div
                       class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="./assets/img/icons/unicons/chart-success.png"
                           alt="chart success"
                           class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end"
                           aria-labelledby="cardOpt3">
                        <a class="dropdown-item"
                           href="javascript:void(0);">View More</a>
                        <a class="dropdown-item"
                           href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Personal</span>
                  <h5 class="card-title mb-2">Ksh
                    <?= $view_bag['total']; ?>
                  </h5>
                  <small class="text-success fw-semibold"><i
                       class="bx bx-up-arrow-alt"></i> +72.80%</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div
                       class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="./assets/img/icons/unicons/wallet-info.png"
                           alt="Credit Card"
                           class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button class="btn p-0"
                              type="button"
                              id="cardOpt6"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end"
                           aria-labelledby="cardOpt6">
                        <a class="dropdown-item"
                           href="javascript:void(0);">View More</a>
                        <a class="dropdown-item"
                           href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span>Total Contributions</span>
                  <h5 class="card-title text-nowrap mb-1">Ksh
                    <?= ($view_bag['g_total']); ?>
                  </h5>
                  <small class="text-success fw-semibold"><i
                       class="bx bx-up-arrow-alt"></i> +28.42%</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
            <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-outline-primary dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Filter
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);">Month to date</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">year to date</a></li>
                      </ul>
                    </div>
            </li>
          </ul>
          <!-- Striped Rows -->
          <div class="card">
            <div class="table-responsive text-nowrap">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mpesa receipt</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php foreach ($model as $transaction): ?>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
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


    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</div>