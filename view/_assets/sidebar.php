  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/persediaan/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIP <sup>B</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if(isset($_GET['h'])=='' || $_GET['h']=='dashboard'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'){ ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengguna
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($_GET['h']=='pengguna'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=pengguna">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengguna</span>
        </a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->
      <?php } ?>
      
      <?php if($_SESSION['jabatan']=='2' || $_SESSION['jabatan']=='0'){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($_GET['h']=='nama_barang'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=nama_barang">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Nama Barang</span>
        </a>
      </li>
      <?php } ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Pendataan
      </div>


      <?php if($_SESSION['jabatan']=='2' || $_SESSION['jabatan']=='0'){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($_GET['h']=='pembelian'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=pembelian">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang Masuk</span>
        </a>
      </li>
      <?php } ?>

      <?php if($_SESSION['jabatan']=='3' || $_SESSION['jabatan']=='0'){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($_GET['h']=='penjualan'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=penjualan">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang Keluar</span>
        </a>
      </li>
      <?php } ?>



      <?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='3' || $_SESSION['jabatan']=='0'){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($_GET['h']=='stok_tersedia'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=stok_tersedia">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang Tersedia</span>
        </a>
      </li>

      <?php } ?>

      <?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'){ ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <li class="nav-item <?php if($_GET['h']=='laporan'){ echo "active";}?>">
        <a class="nav-link" href="http://localhost/persediaan/view/main/index.php?h=laporan">
          <i class="fas fa-fw fa-cog"></i>
          <span>Laporan</span>
        </a>
      </li>
      <?php } ?>



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>