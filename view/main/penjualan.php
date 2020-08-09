<?php 

  if (isset($_SESSION['status']) == "login") {
  }else{
    header("Location: http://localhost/persediaan");
  }

if (isset($_GET['save'])=='') {
}elseif ($_GET['save']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Menyimpan Data');</script>";
    echo "<script type='text/javascript'> $(document).ready(function(){simpan_data_stok(); })</script>";
}elseif ($_GET['save']=='1') {
    echo "<script type='text/javascript'>alert('Gagal Menyimpan Data');</script>";
}

if (isset($_GET['edit'])=='') {
}elseif ($_GET['edit']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
    echo "<script type='text/javascript'> $(document).ready(function(){simpan_data_stok(); })</script>";
}elseif ($_GET['edit']=='1') {
    echo "<script type='text/javascript'>alert('Gagal Mengedit Data');</script>";
}

if (isset($_GET['del'])=='') {
}elseif ($_GET['del']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
    echo "<script type='text/javascript'> $(document).ready(function(){simpan_data_stok(); })</script>";
}elseif ($_GET['del']=='1') {
    echo "<script type='text/javascript'>alert('Gagal Menghapus Data');</script>";
}
?>

        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Barang Keluar</h6>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills" id="tab">
                        <li class="nav-item">
                            <a class="nav-link active" id="update-tab" data-toggle="pill" href="#update" aria-expanded="false">Tambah Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="true">Tampilkan Penjualan</a>
                        </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="update" role="tabpanel"  aria-labelledby="update-tab" aria-expanded="false">
                        <div class="card-body">
                            <form method="POST" id="form" action="<?=$urlcontroller?>/penjualan/simpan.php" autocomplete="off">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Nama Barang</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="selmasuk" name="kd_barang" required>
                                                          <option value=""></option>
                                                          <?php  
                                                            $nabar = mysqli_query($koneksi,"SELECT * from nama_barang order by nama_barang asc");
                                                            while ($rsnabar = mysqli_fetch_array($nabar)) { ?>
                                                          <option data-value="<?=$rsnabar['id'];?>" value="<?=$rsnabar['id'];?>"><?=$rsnabar['nama_barang'];?></option>
                                                           <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Jumlah Barang</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" min="0" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" class="form-control" id="jkeluar" name="jumlah_keluar" placeholder="Jumlah Barang" required />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Tanggal Keluar</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input type="date" class="form-control" name="tanggal_keluar" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 offset-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-4">
                                                  </div>
                                                  <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane " id="data" role="tabpanel" aria-labelledby="data-tab" aria-expanded="true">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th style="width: 50px;">No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah Barang</th>
                                  <th>Tanggal Masuk</th>
                                  <?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'){ ?>
                                    <td>Sales</td>
                                  <?php } ?>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $n = "0";
                                    $where = "";
                                    if($_SESSION['jabatan']=='3') $where = " where a.id_pengguna='".$_SESSION['id']."'";
                                     // $query = mysqli_query($koneksi,"SELECT a.*,b.nama_barang,c.nama FROM barang_keluar a JOIN barang_masuk b ON a.id_masuk=b.id_masuk JOIN pengguna c ON a.id_pengguna=c.id_pengguna $where ORDER BY a.tanggal_keluar DESC ");
                                     $query = mysqli_query($koneksi,"SELECT id_keluar, nama_barang, jumlah_keluar, DATE_FORMAT(tanggal_keluar, '%d-%m-%Y') AS tanggal,c.nama,b.kd_barang FROM barang_keluar a JOIN nama_barang b ON a.kd_barang=b.id JOIN pengguna c ON a.id_pengguna=c.id_pengguna $where ORDER BY a.tanggal_keluar DESC ");
                                     while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                                      <tr>
                                        <td><?=$n;?></td>
                                        <td><?=$rs['kd_barang'];?></td>
                                        <td><?=$rs['nama_barang'];?></td>
                                        <td><?=$rs['jumlah_keluar'];?></td>
                                        <td><?=$rs['tanggal'];?></td>
                                        <?php if($_SESSION['jabatan']=='1' || $_SESSION['jabatan']=='0'){ ?>
                                        <td><?=$rs['nama'];?></td>
                                        <?php } ?>
                                        <td><a class="btn btn-icon btn-outline-primary" title="Edit" data-value="<?=$rs['id_keluar'];?>"><i class="fas fa-edit"></i></a> <a href="<?=$urlcontroller?>/penjualan/hapus.php?id=<?=$rs['id_keluar'];?>"  onclick="return confirm('Yakin Akan Menghapus ?')"  title="Hapus" class="btn btn-icon btn-outline-primary"><i class="fas fa-trash"></i></a></td>
                                      </tr>
                                 <?php }
                                 ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" style="font-size: 15px">Edit Penjualan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="" action="<?=$urlcontroller?>/penjualan/edit.php" autocomplete="off">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-12 col-12">
                                  <div class="col-12">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Nama Barang</span>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="hidden" id="id_keluar" name="id_keluar" />
                                              <!-- <input type="text" class="form-control" id="id_masuk" name="id_masuk" value="" placeholder="Nama Barang" /> -->
                                              <select class="form-control" id="eselmasuk"  readonly disabled>
                                                <option value=""></option>
                                                <?php  
                                                  $nabar = mysqli_query($koneksi,"SELECT id,nama_barang from nama_barang order by nama_barang ASC ");
                                                  while ($rsnabar = mysqli_fetch_array($nabar)) { ?>
                                                <option value="<?=$rsnabar['id'];?>"><?=$rsnabar['nama_barang'];?></option>
                                                 <?php } ?>
                                              </select>
                                              <!-- <input type="text" class="form-control" id="eselmasuk"  readonly> -->
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Jumlah Barang</span>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="number" min="0" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" class="form-control" id="jumlah_keluar" name="jumlah_keluar" placeholder="Jumlah Barang" required />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Tanggal Keluar</span>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12 offset-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-8">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                          <button type="button" class="btn btn-danger mr-1 mb-1" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

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


        $('#selmasuk').select2({
            placeholder: "Pilih Nama Barang"
        });
        $('#eselmasuk').select2({
            placeholder: "Pilih Nama Barang"
        });

        $("#selmasuk").change(function(){
          var id = $("#selmasuk").val();
          // console.log(a);
          $.ajax({
                url : "<?=$urlcontroller?>/stok/cekstok.php", // mengirim ke halaman ini, untuk mengambil nilai data
                method: 'post', // methode pengiriman
                dataType : 'json', // typenya datanya json
                data : {
                    'id' : id
                }, // data yang dikirim cuma id, karena buat parameter
                success : function (rs) {
                    if(!rs.null){
                        $("#jkeluar").val('');
                        $("#jkeluar").attr('placeholder','Maksimal '+rs.jumlah_tersedia+' Barang');
                        $("#jkeluar").attr('max', rs.jumlah_tersedia);
                    } else {
                       alert('Data Tidak ditemukan');  // jika terjadi masalah
                    }
                }
            })
        });

        $(document).on("click", "a[title=Edit]", function(e){ // kodisi saat ckick tag a dengan title edit akan menjalankan fungsi ini
            e.preventDefault();
            let id = $(this).attr("data-value"); // mengambil nilai data pada tag a

            $.ajax({
                url : "<?=$urlcontroller?>/penjualan/get.php", // mengirim ke halaman ini, untuk mengambil nilai data
                method: 'post', // methode pengiriman
                dataType : 'json', // typenya datanya json
                data : {
                    'id' : id
                }, // data yang dikirim cuma id, karena buat parameter
                success : function (rs) {
                  $('#myModal').modal('show'); // untuk menampilkan modal
                    if(!rs.null){

                        for(attrname in rs){ // fungsi looping untuk menampilkan di form edit data
                            $('#'+attrname).val(rs[attrname]); // untuk menampilkan di tag input
                        }
                        // $('#eselmasuk').val(rs.nama_barang);
                        $('#id_masuk').val(rs.id_masuk);
                        $('#jumlah_keluar').attr('max', rs.stok);
                        $('#jumlah_keluar').attr('placeholder', 'Maksimal '+rs.stok+' Barang');
                        $('#eselmasuk').select2("trigger", "select", {
                            data: {
                                id: rs.kodbar,
                                name: rs.nama_barang
                            }
                        });

                    } else {
                       alert('Data Tidak ditemukan');  // jika terjadi masalah
                    }
                }
            })
        });

    });

  function InvalidMsg(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Tolong Diisi Terlebih Dahulu');
    }
    else if(textbox.validity.rangeOverflow){
        textbox.setCustomValidity('Maaf Stok Tidak Mencukupi');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
  }

</script>