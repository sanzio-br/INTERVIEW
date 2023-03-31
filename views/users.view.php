<!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                        <a class="nav-link active" href="allUsers.php"><i class="bx bx-user me-1"></i> All Members</a>
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
                                            <td><?=$user->contributions?></td>
                                            <td><?php
                                                      if($user->active == 1){
                                                        echo "<span class=\"badge bg-label-primary me-1\"></span>active</span>";
                                                      }else{
                                                        echo "<span class=\"badge bg-label-primary me-1\"></span>inactive</span>";
                                                      }
                                                      ?>
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