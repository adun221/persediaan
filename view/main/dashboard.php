<?php 
  if (isset($_SESSION['status']) == "login") {
  }else{
    header("Location: http://localhost/persediaan");
  }

?>
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">
                        <?php $user  = mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM pengguna where jabatan NOT LIKE '0'")) ?>
<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$user['jumlah']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
                        <?php $stok  = mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(a.jumlah_masuk) AS masuk, SUM(b.jumlah_keluar) AS keluar, (SUM(a.jumlah_masuk)-SUM(b.jumlah_keluar)) AS stok 
                    FROM (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a LEFT JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk ORDER BY a.nama_barang ASC")) ?>
<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0' || $_SESSION['jabatan']=='2'){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$stok['masuk']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0' || $_SESSION['jabatan']=='3'){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$stok['keluar']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0' || $_SESSION['jabatan']=='3'){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Tersedia</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$stok['stok']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
          </div>
          <div class="row">

<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'  || $_SESSION['jabatan']=='2'){ ?>
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistic Barang Masuk</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="masuk"></canvas>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
<?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0' || $_SESSION['jabatan']=='3'  || $_SESSION['jabatan']=='2'){ ?>
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6" <?=$_SESSION['jabatan']=='2'? "style='display: none;'" : "" ; ?> >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistic Barang Terjual</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="terjual"></canvas>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
          </div>

        </div>
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<?php
$data = array();
$label = array();
$nabar = mysqli_query($koneksi,"SELECT a.id,a.bulan,IFNULL(b.terjual,0) AS terjual FROM bulan a LEFT JOIN (SELECT IFNULL(SUM(jumlah_keluar),0) AS terjual, tanggal_keluar  FROM barang_keluar a JOIN barang_masuk b ON a.id_masuk=b.id_masuk GROUP BY MONTH(tanggal_keluar)) b ON a.id=MONTH(b.tanggal_keluar) ORDER BY a.id ASC limit ".date('m')."");
while ($rsnabar = mysqli_fetch_array($nabar)) { 
 $n['data'] = $rsnabar['terjual'];
 $n['label'] = $rsnabar['bulan'];

 array_push($data, $n['data']);
 array_push($label, $n['label']);
}

$data1 = array();
$label1 = array();
$nabar1 = mysqli_query($koneksi,"SELECT a.id,a.bulan,IFNULL(b.masuk,0) AS masuk FROM bulan a LEFT JOIN (SELECT SUM(jumlah_masuk) AS masuk, tanggal_masuk FROM barang_masuk GROUP BY MONTH(tanggal_masuk)) b ON a.id=MONTH(b.tanggal_masuk) ORDER BY a.id ASC limit ".date('m')."");
while ($rsnabar1 = mysqli_fetch_array($nabar1)) { 
 $n1['data'] = $rsnabar1['masuk'];
 $n1['label'] = $rsnabar1['bulan'];

 array_push($data1, $n1['data']);
 array_push($label1, $n1['label']);

} 

?>
        <script>
          $(document).ready(function(){

// Area Chart Example
            var ctx = document.getElementById("terjual");
            var myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: <?=json_encode($label)?>,
                datasets: [{
                  label: "Terjual",
                  lineTension: 0.3,
                  backgroundColor: "rgba(78, 115, 223, 0.05)",
                  borderColor: "rgba(78, 115, 223, 1)",
                  pointRadius: 3,
                  pointBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointBorderColor: "rgba(78, 115, 223, 1)",
                  pointHoverRadius: 3,
                  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                  pointHitRadius: 10,
                  pointBorderWidth: 2,
                  data: <?=json_encode($data)?>,
                }],
              },
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                        return '' + value;
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': ' + tooltipItem.yLabel;
                    }
                  }
                }
              }
            });


            var ctxa = document.getElementById("masuk");
            var myLineChart = new Chart(ctxa, {
              type: 'line',
              data: {
                labels: <?=json_encode($label1)?>,
                datasets: [{
                  label: "Terjual",
                  lineTension: 0.3,
                  backgroundColor: "rgba(78, 115, 223, 0.05)",
                  borderColor: "rgba(78, 115, 223, 1)",
                  pointRadius: 3,
                  pointBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointBorderColor: "rgba(78, 115, 223, 1)",
                  pointHoverRadius: 3,
                  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                  pointHitRadius: 10,
                  pointBorderWidth: 2,
                  data: <?=json_encode($data1)?>,
                }],
              },
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                        return '' + value;
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': ' + tooltipItem.yLabel;
                    }
                  }
                }
              }
            });


          });

</script>