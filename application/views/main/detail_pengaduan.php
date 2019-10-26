<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Detail Pengaduan
    <!-- <small>full widtH layout witd mega menu</small> -->
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="note note-info">
    <h5><b>IDENTITAS PELAPOR</b></h5>
    <table>
        <tr>
            <td style="width:150px">TANGGAL LAPOR</td>
            <td>:</td>
            <td><?php echo date("d/m/Y | H:i", strtotime($aduHead->row()->tanggal)) ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">NAMA</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->nama ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">TTL</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->ttl ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">ALAMAT</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->alamat ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">PEKERJAAN</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->pekerjaan ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">AGAMA</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->agama ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">HO.HP</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->nohp ?></td>
        </tr>
        <tr>
            <td style="widtH:150px">EMAIL</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->email ?></td>
        </tr>
    </table>
    <hr>
    <table>
        <h5><b>URAIAN LAPORAN</b></h5>
        <tr>
            <td style="widtH:150px">DETAIL LAPORAN</td>
            <td>:</td>
            <td><?php echo $aduHead->row()->laporan ?></td>
        </tr>
    </table>
</div>



<h5><b>FOTO LAMPIRAN</b></h5>
<small><i>Open image in new tab</i> untuk melihat size/resolusi asli</small>
<ul class="images">
    <?php if (!empty($aduDet)) {
        foreach ($aduDet->result_array() as $file) { ?>

            <li>
                <img style="width:20%; height:35%" src="<?php echo base_url('uploads/files/' . $file['file_name']); ?>" >
            </li>

        <?php }
} else { ?>
        <p>Image(s) not found.....</p>
    <?php } ?>
</ul>

<style>
ul.images {
  margin: 0;
  padding: 0;
  white-space: nowrap;
  width: auto;
  overflow-x: auto;
  background-color: ;
  
}
ul.images li {
  display: inline;
  width: 150px;
  height: 150px;
}
img{
    border: 1px solid
}
</style>