<?php 
  if (isset($_SESSION['status']) == "login") {
  }else{
    header("Location: http://localhost/persediaan");
  }

?>
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Barang Tersedia</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 50px;">No</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $n = "0";
                       $query = mysqli_query($koneksi,"SELECT * from barang_tersedia where jumlah_tersedia!='0' ");
                       while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                        <tr>
                          <td><?=$n;?></td>
                          <td><?=$rs['kd_barang'];?></td>
                          <td><?=$rs['jumlah_tersedia'];?></td>
                        </tr>
                       <?php }
                       ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>




<!--         <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Barang Tersedia</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 50px;">No</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $n = "0";
                       $query = mysqli_query($koneksi,"SELECT a.nama_barang, a.jumlah_masuk, COALESCE(b.jumlah_keluar,0) AS jumlah_keluar, (a.jumlah_masuk-COALESCE(b.jumlah_keluar,0)) AS stok FROM 
                                          (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a 
                                          LEFT JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk WHERE (a.jumlah_masuk-COALESCE(b.jumlah_keluar,0))!='0' ORDER BY a.nama_barang ASC ");
                       while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                        <tr>
                          <td><?=$n;?></td>
                          <td><?=$rs['nama_barang'];?></td>
                          <td><?=$rs['stok'];?></td>
                        </tr>
                       <?php }
                       ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div> -->
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