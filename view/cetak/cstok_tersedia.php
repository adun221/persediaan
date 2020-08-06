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
setlocale(LC_ALL, 'id-ID', 'id_ID');

include '../../controller/konek.php';
// $query = mysqli_query($koneksi, "SELECT a.nama_barang, a.jumlah_masuk, b.jumlah_keluar, (a.jumlah_masuk-b.jumlah_keluar) AS stok FROM (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk order by a.nama_barang ASC");
$query = mysqli_query($koneksi, "SELECT b.kd_barang,b.nama_barang,a.jumlah_tersedia FROM barang_tersedia a JOIN nama_barang b ON a.kd_barang=b.id WHERE a.jumlah_tersedia!='0'");

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
              <tr><td style="text-align: center;"><strong>Laporan Stok Barang</strong></td></tr>
            </table>
        </tr>
        <tr>
          <br>
          <table width="100%" align="center" border="1" style="text-align: center">
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang</th>
            </tr>
            <?php
            $n = 0;
            if($cek= mysqli_num_rows($query)!='0'){


              while ($row = mysqli_fetch_array($query)){ 
                $n++;
              ?>
            <tr>
              <td><?=$n?></td>
              <td style="text-align: left; padding-left: 5px;"><?=$row['kd_barang']?></td>
              <td style="text-align: left; padding-left: 5px;"><?=$row['nama_barang']?></td>
              <td><?=$row['jumlah_tersedia']?></td>
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
                Purbalingga, <?= strftime("%d %B %Y", strtotime(date("Y-m-d")))?>
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
						<a href="http://localhost/persediaan/view/cetak/index.php?l=<?=$_POST['laporan']?>&b=<?=date("m")?>&t=<?=date("Y")?>" class="btn btn-primary mr-1 mb-1" id="cetak" target="_blank"><button>Cetak Pdf</button></a>
					</td>
				</tr>
			</table>
        </tr>
      </table>
    </div>
  </div>
</div>