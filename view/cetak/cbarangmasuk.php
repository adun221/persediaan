<style type="text/css">
  body {
  margin: 0;
  padding: 0;
  /*background-color: #FAFAFA;*/
  font: 12pt "Tahoma";
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.page {
  width: 21cm;
  min-height: 29.7cm;
  padding: 2cm;
  margin: 1cm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
  padding: 0cm;
  /*border: 5px red solid;*/
  height: 256mm;
  /*outline: 2cm #FFEAEA solid;*/
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
</style>

<?php 

include '../../controller/konek.php';
  if ($_POST['bulan']=='1') {
  $bulan = "Januari";
  }elseif ($_POST['bulan']=='2') {
    $bulan = "Februari";
  }elseif ($_POST['bulan']=='3') {
    $bulan = "Maret";
  }elseif ($_POST['bulan']=='4') {
    $bulan = "April";
  }elseif ($_POST['bulan']=='5') {
    $bulan = "Mei";
  }elseif ($_POST['bulan']=='6') {
    $bulan = "Juni";
  }elseif ($_POST['bulan']=='7') {
    $bulan = "Juli";
  }elseif ($_POST['bulan']=='8') {
    $bulan = "Agustus";
  }elseif ($_POST['bulan']=='9') {
    $bulan = "Setember";
  }elseif ($_POST['bulan']=='10') {
    $bulan = "Oktober";
  }elseif ($_POST['bulan']=='11') {
    $bulan = "November";
  }elseif ($_POST['bulan']=='12') {
    $bulan = "Desember";
  }
$query = mysqli_query($koneksi, "select a.*,b.nama from barang_masuk a join pengguna b on a.id_pengguna=b.id_pengguna where month(a.tanggal_masuk)='".$_POST['bulan']."' and year(a.tanggal_masuk)='".$_POST['tahun']."' order by a.tanggal_masuk ASC");

?>


<div class="book">
  <div class="page">
    <div class="subpage">
      <table>
        <tr>
            <table width="100%" align="center" style="text-align: left; margin-top: -40px;">
              <tr>
                <td rowspan="3" width="120px">
                  <img src="../../assets/image/logo.jpeg" width="100px" >
                </td>
                <td style="text-align: center;"><strong>UD. KA DISTRIBUTION</strong></td>
              </tr>
              <tr><td style="text-align: center;"><strong>Laporan Barang Masuk</strong></td></tr>
              <tr><td style="text-align: center;"><strong>Bulan <?=$bulan?> <?=$_POST['tahun']?></strong></td></tr>
            </table>
        </tr>
        <tr>
          <br>
          <table width="100%" align="center" border="1" style="text-align: center">
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang</th>
              <th>User</th>
              <th>Tanggal Masuk</th>
            </tr>
            <?php
            $n = 0;
            if($cek= mysqli_num_rows($query)!='0'){


              while ($row = mysqli_fetch_array($query)){ 
                $n++;
              ?>
            <tr>
              <td><?=$n?></td>
              <td style="text-align: left; padding-left: 5px;"><?=$row['nama_barang']?></td>
              <td ><?=$row['jumlah_masuk']?></td>
              <td><?=$row['nama']?></td>
              <td><?=date("d M Y", strtotime($row['tanggal_masuk']))?></td>
            </tr>
            <?php 
            }
            } else { ?>
            <tr>
              <td colspan="5">Tidak Ada Data Pada Bulan Ini</td>
            </tr>
            <?php }
            ?>
          </table>
        </tr>
        <tr>
          <br>
          <br>
          <table width="100%" >
            <tr>
              <td width="50%" rowspan="2"></td>
              <td align="center" style="height: 75px; vertical-align: top;">
                Purbalingga, <?=date("d M Y")?>
              </td>
            </tr>
            <tr>
              <td align="center">(...........................)</td>
            </tr>
          </table>
        </tr>
        <tr>
          <br>
          <br>
	    	<table width="100%" align="center" style="text-align: center">
				<tr>
					<td>
						<a href="http://localhost/persediaan/view/cetak/index.php?l=<?=$_POST['laporan']?>&b=<?=$_POST['bulan']?>&t=<?=$_POST['tahun']?>" class="btn btn-primary mr-1 mb-1" id="cetak" target="_blank"><button>Cetak Pdf</button></a>
					</td>
				</tr>
			</table>
        </tr>
      </table>
    </div>
  </div>
</div>