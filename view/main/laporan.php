<?php 
  if (isset($_SESSION['status']) == "login") {
  }else{
    header("Location: http://localhost/persediaan");
  }

if (isset($_POST['laporan'])==null) {
  $_POST['laporan'] = "0";
}
if (isset($_POST['bulan'])==null) {
  $_POST['bulan'] = '0';
  $_POST['tahun'] = '0';
}
?>

        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                </div>
                <div class="card-body">
                  <form method="POST"  action="<?=$baseurl?>view/cetak/cetak.php" target="_blank" autocomplete="off">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-12 col-12">
                                  <div class="col-12">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Pilih Laporan</span>
                                          </div>
                                          <div class="col-md-8">
                                            <select class="form-control" id="laporan" name="laporan" required>
                                              <option value="">Pilih Laporan</option>
                                              <option value="1" <?php if($_POST['laporan']=='1'){echo "selected";} ?> >Barang Masuk</option>
                                              <option value="2" <?php if($_POST['laporan']=='2'){echo "selected";} ?> >Barang Keluar</option>
                                              <option value="3" <?php if($_POST['laporan']=='3'){echo "selected";} ?> >Barang Tersedia</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Pilih Bulan</span>
                                          </div>
                                          <div class="col-md-8">
                                            <select class="form-control bulan masuk" id="bbarang_masuk" name="bulan" required>
                                              <option value="">Pilih Bulan</option>
                                              <?php
                                                $querybmasuk = mysqli_query($koneksi,"SELECT b.* FROM barang_masuk a JOIN bulan b ON MONTH(a.tanggal_masuk)=b.id GROUP BY MONTH(tanggal_masuk)");
                                                while ($rsmasuk = mysqli_fetch_array($querybmasuk) ) { ?>
                                                  <option value="<?=$rsmasuk['id'];?>" ><?=$rsmasuk['bulan'];?></option>
                                                 <?php } ?>
                                            </select>
                                            <select class="form-control bulan keluar" id="bbarang_keluar" name="bulan" required>
                                              <option value="">Pilih Bulan</option>
                                              <?php
                                                $querykeluar = mysqli_query($koneksi,"SELECT b.* FROM barang_keluar a JOIN bulan b ON MONTH(a.tanggal_keluar)=b.id GROUP BY MONTH(tanggal_keluar)");
                                                while ($rskeluar = mysqli_fetch_array($querykeluar) ) { ?>
                                                  <option value="<?=$rskeluar['id'];?>" ><?=$rskeluar['bulan'];?></option>
                                                 <?php } ?>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Pilih Tahun</span>
                                          </div>
                                          <div class="col-md-8">
                                            <select class="form-control tahun masuk" id="tbarang_masuk" name="tahun" required >
                                              <option value="">Pilih Tahun</option>
                                              <?php
                                                $querybmasuk = mysqli_query($koneksi,"SELECT YEAR(tanggal_masuk) AS tahun FROM barang_masuk GROUP BY YEAR(tanggal_masuk)");
                                                while ($rsmasuk = mysqli_fetch_array($querybmasuk) ) { ?>
                                                  <option value="<?=$rsmasuk['tahun'];?>" ><?=$rsmasuk['tahun'];?></option>
                                                 <?php } 
                                                $querybkeluar = mysqli_fetch_array(mysqli_query($koneksi,"SELECT YEAR(tanggal_keluar) AS tahun FROM barang_keluar GROUP BY YEAR(tanggal_keluar)")); 
                                              ?>
                                            </select>
                                            <select class="form-control tahun keluar" id="tbarang_keluar" name="tahun" required >
                                              <option value="">Pilih Tahun</option>
                                              <?php
                                                $querybkeluar = mysqli_query($koneksi,"SELECT YEAR(tanggal_keluar) AS tahun FROM barang_keluar GROUP BY YEAR(tanggal_keluar)"); 
                                                while ($rskeluar = mysqli_fetch_array($querybkeluar) ) { ?>
                                                  <option value="<?=$rskeluar['tahun'];?>" ><?=$rskeluar['tahun'];?></option>
                                                 <?php } 
                                              ?>
                                            </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12 offset-md-12">
                                    <div class="form-group row">
                                      <div class="col-md-4">
                                      </div>
                                      <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Tampilkan Laporan</button>
                                        <a href="<?=$baseurl?>view/cetak/index.php?l=<?=$_POST['laporan']?>&b=<?=$_POST['bulan']?>&t=<?=$_POST['tahun']?>" class="btn btn-primary mr-1 mb-1" id="cetak" target="_blank">Cetak</a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
              <div class="card shadow mb-4" id="datalaporan">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                </div>
                <div class="card-body">
                  <?php if($_POST['laporan']=='1'){ 
                    ?>
                    <table width="100%" class="table table-bordered">
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Masuk</th>
                        <th>User</th>
                        <th>Tanggal Masuk</th>
                      </tr>
                      <?php
                          $wherem = " WHERE MONTH(a.tanggal_masuk)='".$_POST['bulan']."' AND YEAR(a.tanggal_masuk)='".$_POST['tahun']."' ";
                          $n = "0";
                          $query = mysqli_query($koneksi,"SELECT a.*,b.nama from barang_masuk a JOIN pengguna b on a.id_pengguna=b.id_pengguna $wherem order by a.tanggal_masuk ASC ");
                          while ($rs = mysqli_fetch_array($query)) { $n++; ?> 
                      <tr>
                        <td><?=$n;?></td>
                        <td><?=$rs['nama_barang'];?></td>
                        <td><?=$rs['jumlah_masuk'];?></td>
                        <td><?=$rs['nama'];?></td>
                        <td><?=$rs['tanggal_masuk'];?></td>
                      </tr>
                      <?php } ?>
                    </table>

                  <?php } ?>

                  <?php if($_POST['laporan']=='2'){ ?>
                    <table width="100%" class="table table-bordered">
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Keluar</th>
                        <th>User</th>
                        <th>Tanggal Keluar</th>
                      </tr>
                      <?php
                          $wherek = " WHERE MONTH(a.tanggal_keluar)='".$_POST['bulan']."' AND YEAR(a.tanggal_keluar)='".$_POST['tahun']."' ";
                          $n = "0";
                          $query = mysqli_query($koneksi,"SELECT a.*,b.nama from barang_keluar a JOIN pengguna b on a.id_pengguna=b.id_pengguna $wherek order by a.tanggal_keluar ASC");
                          while ($rs = mysqli_fetch_array($query)) { $n++; ?> 
                      <tr>
                        <td><?=$n;?></td>
                        <td><?=$rs['id_masuk'];?></td>
                        <td><?=$rs['jumlah_keluar'];?></td>
                        <td><?=$rs['nama'];?></td>
                        <td><?=$rs['tanggal_keluar'];?></td>
                      </tr>
                      <?php } ?>
                    </table>
                  <?php } ?>

                  <?php if($_POST['laporan']=='3'){ ?>
                    <table width="100%" class="table table-bordered">
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php
                        $n = "0";
                        $query = mysqli_query($koneksi,"SELECT a.nama_barang, a.jumlah_masuk, b.jumlah_keluar, (a.jumlah_masuk-b.jumlah_keluar) AS stok FROM (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk order by a.nama_barang ASC ");
                        while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                        <tr>
                          <td><?=$n;?></td>
                          <td><?=$rs['nama_barang'];?></td>
                          <td><?=$rs['stok'];?></td>
                        </tr>
                        <?php } ?>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
    $(document).ready(function(){ 
      $('#datalaporan').hide();
      $('#cetak').hide();
      $('.keluar').hide();
      var laporan = "<?=$_POST['laporan'];?>";
      var bulan = "<?=$_POST['bulan'];?>";
      var tahun = "<?=$_POST['tahun'];?>";

      $('#laporan').change(function(){
        if ($('#laporan').val()=='3') {
          $('.bulan').attr('disabled', true);
          $('.tahun').attr('disabled', true);
          $('.bulan').val('');
          $('.tahun').val('');
          $('#cetak').hide();
        }else if($('#laporan').val()=='1'){
          $('.masuk').show();
          $('.keluar').hide();
          $('#bbarang_keluar').attr('disabled', true);
          $('#tbarang_keluar').attr('disabled', true);
          $('#bbarang_masuk').attr('disabled', false);
          $('#tbarang_masuk').attr('disabled', false);
          $('#cetak').hide();
        }else if($('#laporan').val()=='2'){
          $('.masuk').hide();
          $('.keluar').show();
          $('#bbarang_keluar').attr('disabled', false);
          $('#tbarang_keluar').attr('disabled', false);
          $('#bbarang_masuk').attr('disabled', true);
          $('#tbarang_masuk').attr('disabled', true);
          $('#cetak').hide();
        }
      });

      $('.bulan').change(function(){$('#cetak').hide();});
      $('.tahun').change(function(){$('#cetak').hide();});


      if (laporan=="3") {
        $('.bulan').attr('disabled', true);
        $('.tahun').attr('disabled', true);
      }

      if (laporan=="1" || laporan=="2" || laporan=="3") {
        $('#datalaporan').show();
        $('#cetak').show();
      }else {
        $('#datalaporan').hide();
      }


    });

</script>
<script type="text/javascript">
    function simpan_data_stok(){
        $.ajax({
                url : "<?=$urlcontroller?>/stok/simpan.php", // mengirim ke halaman ini, untuk mengambil nilai data
                method: 'post', // methode pengiriman
                dataType : 'json', // typenya datanya json
                success : function (rs) {
                }
            })
    }

    $(document).ready(function(){ 
        simpan_data_stok();
    });

</script>