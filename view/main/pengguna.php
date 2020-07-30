<?php 
  if (isset($_SESSION['status']) == "login") {
  }else{
    header("Location: http://localhost/persediaan");
  }

if (isset($_GET['save'])=='') {
}elseif ($_GET['save']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Menyimpan Data');</script>";
}elseif ($_GET['save']=='1') {
    echo "<script type='text/javascript'>alert('Gagal Menyimpan Data');</script>";
}elseif ($_GET['save']=='2') {
    echo "<script type='text/javascript'>alert('User Name Sudah Digunakan');</script>";
}

if (isset($_GET['edit'])=='') {
}elseif ($_GET['edit']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
}elseif ($_GET['edit']=='1') {
    echo "<script type='text/javascript'>alert('Gagal Mengedit Data');</script>";
}elseif ($_GET['edit']=='2') {
    echo "<script type='text/javascript'>alert('User Name Sudah Digunakan');</script>";
}

if (isset($_GET['del'])=='') {
}elseif ($_GET['del']=='0') {
    echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
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
                  <h6 class="m-0 font-weight-bold text-primary"> Pengguna</h6>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills" id="tab">
                        <li class="nav-item">
                            <a class="nav-link active" id="update-tab" data-toggle="pill" href="#update" aria-expanded="false">Tambah Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="true">Tampilkan Pengguna</a>
                        </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="update" role="tabpanel"  aria-labelledby="update-tab" aria-expanded="false">
                        <div class="card-body">
                            <form method="POST"  action="<?=$urlcontroller?>/pengguna/simpan.php" autocomplete="off">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>User Name</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Password</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Nama</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Jabatan</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control" id="seljab" name="jabatan">
                                                        <option value=""></option>
                                                        <option value="1">Pemilik</option>
                                                        <option value="2">Gudang</option>
                                                        <option value="3">Sales</option>
                                                      </select>
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
                                  <th>User Name</th>
                                  <th>Password</th>
                                  <th>Nama</th>
                                  <th>Jabatan</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $n = "0";
                                     $query = mysqli_query($koneksi,"SELECT * from pengguna where jabatan NOT LIKE '0' order by id_pengguna DESC ");
                                     while ($rs = mysqli_fetch_array($query)) { $n++; ?>
                                      <tr>
                                        <td><?=$n;?></td>
                                        <td><?=$rs['username'];?></td>
                                        <td><?=$rs['password'];?></td>
                                        <td><?=$rs['nama'];?></td>
                                        <td><?php if($rs['jabatan']=='1'){ echo "Pemilik"; }elseif($rs['jabatan']=='2'){ echo "Gudang"; }elseif($rs['jabatan']=='3'){ echo "Sales"; }?></td>
                                        <td><a class="btn btn-icon btn-outline-primary" title="Edit" data-value="<?=$rs['id_pengguna'];?>"><i class="far fa-edit"></i></a> <a href="<?=$urlcontroller?>/pengguna/hapus.php?id=<?=$rs['id_pengguna'];?>" onclick="return confirm('Yakin Akan Menghapus ?')" class="btn btn-icon btn-outline-primary"><i class="fas fa-trash"></i></a></td>
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
                    <form method="POST" id="form" action="<?=$urlcontroller?>/pengguna/edit.php" autocomplete="off">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-12 col-12">
                                  <div class="col-12">
                                      <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>User Name</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" id="id_pengguna" name="id_pengguna">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Password</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Nama</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Jabatan</span>
                                            </div>
                                            <div class="col-md-8">
                                              <select class="form-control" id="eseljab" id="jabatan" name="jabatan">
                                                <option value=""></option>
                                                <option value="1">Pemilik</option>
                                                <option value="2">Gudang</option>
                                                <option value="3">Sales</option>
                                              </select>
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
    $(document).ready(function(){ 

        $('#seljab').select2({
            placeholder: "Pilih Jabatan"
        });
        $('#eseljab').select2({
            placeholder: "Pilih Jabatan"
        });     
        $(document).on("click", "a[title=Edit]", function(e){ // kodisi saat ckick tag a dengan title edit akan menjalankan fungsi ini
            e.preventDefault();
            let id = $(this).attr("data-value"); // mengambil nilai data pada tag a

            $.ajax({
                url : "<?=$urlcontroller?>/pengguna/get.php", // mengirim ke halaman ini, untuk mengambil nilai data
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
                        $('#eseljab').select2("trigger", "select", {
                            data: {
                                id: rs.jabatan,
                                name: rs.jabatan
                            }
                        });

                    } else {
                       alert('Data Tidak ditemukan');  // jika terjadi masalah
                    }
                }
            })
        });
    });

</script>