        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <?php
              $query =  mysqli_query($koneksi,"SELECT b.nama_barang,a.jumlah_tersedia as stok FROM barang_tersedia a JOIN barang_masuk b ON a.id_masuk=b.id_masuk WHERE jumlah_tersedia<='10' ORDER BY a.jumlah_tersedia ASC");

              if ($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0') {
                
             
             ?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php
                if(mysqli_num_rows($query)!='0') {
                 ?>
                <span class="badge badge-danger badge-counter">&nbsp;</span>
                <?php } ?>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Peringatan Stok Menipis
                </h6>
                <?php
                if(mysqli_num_rows($query)!='0') {
                  while ($rs = mysqli_fetch_array($query)) { 
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle <?php if($rs['stok']<='5') { echo "bg-danger";}else{ echo "bg-warning";} ?>">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Stok <?=$rs['nama_barang']?> Tinggal <?=$rs['stok']?> Barang </span>
                  </div>
                </a>
                <?php } }else{ ?>

                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-info-circle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Tidak Ada Notifikasi </span>
                  </div>
                </a>
                <?php }
                ?>
                <a class="dropdown-item text-center small text-gray-500" href="http://localhost/persediaan/view/main/index.php?h=stok_tersedia">Lihat Semua</a>
              </div>
            </li>
          <?php  } ?>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama']?></span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>