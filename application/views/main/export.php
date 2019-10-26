<!DOCTYPE html>
<html>

<head>
	<title>Daftar Pengaduan</title>
</head>
<style>
	body {
		font-size: 12px;
	}

	.imageAtt {
		width: 35%;
		height: 35%;
		margin: 5px;
		border: 1px solid;
	}

	.column {
		float: left;
		/* width: 50%; */
	}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}
</style>

<body>

	<div>
		<p style="text-align:center; font-size: 15px"><B>BADAN NAROKOTIKA NASIONAL</B><br>KABUPATEN GORONTALO UTARA<br><small>DAFTAR PENGADUAN</small><br><small> <?php echo $df . " s.d " . $dt ?></small></p>
		<small style="align:right"><i>Dicetak oleh: <?php echo $this->session->userdata('fullname')." / ". date('d-m-Y')?></i></small>
		<hr style="1px solid">
	</div>
	<?php $i = 1;
	foreach ($head->result() as $rowhead) { ?>
		<div>
			<h5><small>No: <?php echo $i++ ?></small><br><b>IDENTITAS PELAPOR</b></h5>
			<table>

				<tr>
					<td style="width:150px">TANGGAL LAPOR</td>
					<td>:</td>
					<td><?php echo date("d-m-Y | H:i:s", strtotime($rowhead->tanggal));  ?></td>
				</tr>
				<tr>
					<td style="width:150px">NAMA</td>
					<td>:</td>
					<td><?php echo $rowhead->nama ?></td>
				</tr>
				<tr>
					<td style="width:150px">TTL</td>
					<td>:</td>
					<td><?php echo $rowhead->ttl ?></td>
				</tr>
				<tr>
					<td style="width:150px">ALAMAT</td>
					<td>:</td>
					<td><?php echo $rowhead->alamat ?></td>
				</tr>
				<tr>
					<td style="width:150px">PEKERJAAN</td>
					<td>:</td>
					<td><?php echo $rowhead->pekerjaan ?></td>
				</tr>
				<tr>
					<td style="width:150px">AGAMA</td>
					<td>:</td>
					<td><?php echo $rowhead->agama ?></td>
				</tr>
				<tr>
					<td style="width:150px">hO.hP</td>
					<td>:</td>
					<td><?php echo $rowhead->nohp ?></td>
				</tr>
				<tr>
					<td style="width:150px">EMAIL</td>
					<td>:</td>
					<td><?php echo $rowhead->email ?></td>
				</tr>
			</table>
			<h5><b>URAIAN LAPORAN</b></h5>
			<table>
				<tr>
					<td>DETAIL LAPORAN</td>
					<td>:</td>
					<td style="width:500px"><?php echo $rowhead->laporan ?></td>
				</tr>
			</table>
			<h5><b>FOTO LAMPIRAN</b></h5>

			<div class="row">
				<div class="column">
					<table>
						<tr>
							
						
					<?php
						foreach ($files->result() as $rowFile) {
							if ($rowhead->id == $rowFile->idPengaduan) {
								?>
								<img class="imageAtt" src="<?php echo ('uploads/files/' . $rowFile->file_name); ?>">
							<?php
						} else {
							echo '';
						}
					}
					?>
					</tr>
					</table>
				</div>
			</div>
			<br>



		</div>
		<hr style=" border: 0; background-color: #fff; border-top: 1px dashed #8c8c8c;">
	<?php } ?>
</body>

</html>