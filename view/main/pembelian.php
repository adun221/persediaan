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
                  <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills" id="tab">
                        <li class="nav-item">
                            <a class="nav-link active" id="update-tab" data-toggle="pill" href="#update" aria-expanded="false">Tabmbah Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="true">Tampilkan Pembelian</a>
                        </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="update" role="tabpanel"  aria-labelledby="update-tab" aria-expanded="false">
                        <div class="card-body">
                            <form method="POST"  action="<?=$urlcontroller?>/pembelian/simpan.php" autocomplete="off">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Nama Barang</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="sel">
                                                        <select class="form-control" id="selnabar" name="nama_barang">
                                                          <option value=""></option>
                                                          <?php  
                                                            $nabar = mysqli_query($koneksi,"SELECT id_masuk,nama_barang from barang_masuk group by nama_barang order by nama_barang ASC ");
                                                            while ($rsnabar = mysqli_fetch_array($nabar)) { ?>
                                                          <option value="<?=$rsnabar['nama_barang'];?>"><?=$rsnabar['nama_barang'];?></option>
                                                           <?php } ?>
                                                        </select>
                                                      </div>
                                                      <div class="nonsel">
                                                        <input type="text" class="form-control" name="nama_barang" id="nonabar" placeholder="Nama Barang" disabled>
                                                      </div>
                                                      <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" value="1" id="tidakada">
                                                        <label class="custom-control-label" for="tidakada" style="line-height: 1.5rem; margin-top: 6px;">Tidak Ada Di List</label>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Jumlah Barang</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" min="0" class="form-control" name="jumlah_masuk" placeholder="Jumlah Barang" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Tanggal Masuk</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input type="date" class="form-control" name="tanggal_masuk" required>
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
                                  <th>Nama Barang</th>
                                  <th>Jumlah Barang</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $n = "0";
                                   $query = mysqli_query($koneksi,"SELECT * from barang_masuk order by tanggal_masuk DESC ");
                                   while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                                    <tr>
                                      <td><?=$n;?></td>
                                      <td><?=$rs['nama_barang'];?></td>
                                      <td><?=$rs['jumlah_masuk'];?></td>
                                      <td><?=$rs['tanggal_masuk'];?></td>
                                      <td><a class="btn btn-icon btn-outline-primary" title="Edit" data-value="<?=$rs['id_masuk'];?>"><i class="far fa-edit"></i></a> <a href="<?=$urlcontroller?>/pembelian/hapus.php?id=<?=$rs['id_masuk'];?>"  onclick="return confirm('Yakin Akan Menghapus ?')"  class="btn btn-icon btn-outline-primary"><i class="fas fa-trash"></i></a></td>
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
                    <h4 class="modal-title" style="font-size: 15px">Edit Pembelian</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="form" action="<?=$urlcontroller?>/pembelian/edit.php" autocomplete="off">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-12 col-12">
                                  <div class="col-12">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Nama Barang</span>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="hidden" id="id_masuk" name="id_masuk" />
                                              <!-- <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="" placeholder="Nama Barang" /> -->
                                              <div class="sel">
                                                <select class="form-control" id="eselnabar" name="nama_barang">
                                                  <option value=""></option>
                                                  <?php  
                                                    $nabar = mysqli_query($koneksi,"SELECT id_masuk,nama_barang from barang_masuk group by nama_barang order by nama_barang ASC ");
                                                    while ($rsnabar = mysqli_fetch_array($nabar)) { ?>
                                                  <option value="<?=$rsnabar['nama_barang'];?>"><?=$rsnabar['nama_barang'];?></option>
                                                   <?php } ?>
                                                </select>
                                              </div>
                                              <div class="nonsel">
                                                <input type="text" class="form-control" name="nama_barang" id="enonabar" placeholder="Nama Barang" disabled>
                                              </div>
                                              <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" value="1" id="nothing">
                                                <label class="custom-control-label" for="nothing" style="line-height: 1.5rem; margin-top: 6px;">Tidak Ada Di List</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Jumlah Barang</span>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="number" min="0" class="form-control" id="jumlah_masuk" name="jumlah_masuk" placeholder="Jumlah Barang" />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <span>Tanggal Masuk</span>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" >
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
        $('.nonsel').hide("");

        $('#selnabar').select2({
            placeholder: "Pilih Nama Barang"
        });
        $('#eselnabar').select2({
            placeholder: "Pilih Nama Barang"
        });     
        $(document).on("click", "a[title=Edit]", function(e){ // kodisi saat ckick tag a dengan title edit akan menjalankan fungsi ini
            e.preventDefault();
            let id = $(this).attr("data-value"); // mengambil nilai data pada tag a

            $.ajax({
                url : "<?=$urlcontroller?>/pembelian/get.php", // mengirim ke halaman ini, untuk mengambil nilai data
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
                        $('#eselnabar').select2("trigger", "select", {
                            data: {
                                id: rs.nama_barang,
                                name: rs.nama_barang
                            }
                        });

                    } else {
                       alert('Data Tidak ditemukan');  // jika terjadi masalah
                    }
                }
            })
        }).on('click', '#tidakada', function() {
            let bool = $(this).prop('checked');
            if (bool) {
                $(this).val('0');
                $('#nonabar').attr('disabled', false);
                $('#selnabar').attr('disabled', true);
                $('#selnabar').val("").trigger('change');
                
                $('.sel').hide("");
                $('.nonsel').show("");

            } else {
                $(this).val('1');
                $('#nonabar').attr('disabled', true);
                $('#selnabar').attr('disabled', false);
                $('#nonabar').val("");

                $('.nonsel').hide("");
                $('.sel').show("");
            }
        }).on('click', '#nothing', function() {
            let bool = $(this).prop('checked');
            if (bool) {
                $(this).val('0');
                $('#enonabar').attr('disabled', false);
                $('#eselnabar').attr('disabled', true);
                // $('#eselnabar').val("").trigger('change');
                
                $('.sel').hide("");
                $('.nonsel').show("");

            } else {
                $(this).val('1');
                $('#enonabar').attr('disabled', true);
                $('#eselnabar').attr('disabled', false);
                $('#enonabar').val("");

                $('.nonsel').hide("");
                $('.sel').show("");
            }
        });
    });

</script>