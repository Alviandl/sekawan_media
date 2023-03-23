<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan Data Pemakaian Mobil ".' '.date('d-m-Y').".xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h2 style="text-align: center; size: 16;">Report Laporan Data Pemakaian Mobil Periode <?= date("d-m-Y", strtotime($tgl_mulai)); ?> - <?= date("d-m-Y", strtotime($tgl_selesai)); ?> </h2>

<table border="1" width="100%">

	<thead>

		<tr>

			<th>No</th>
			<th>No Pengajuan</th>
			<th>Sopir</th>
			<th>Lokasi Awal</th>
			<th>Lokasi Tujuan</th>
			<th>Waktu Mulai</th>
			<th>Waktu Selesai</th>
			<th>Menyetujui</th>
			<th>Alasan Pemakaian</th>
			<th>Status</th>
			<th>Tanggal Pengajuan</th>

		</tr>

	</thead>

	<tbody>
		<?php $no = 0; foreach ($data as $dt_data_pengajuan): $no++;?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $dt_data_pengajuan['no_pengajuan'] ?></td>
			<td><?= $dt_data_pengajuan['nama'] ?></td>
			<td><?= $dt_data_pengajuan['lokasi_awal'] ?></td>
			<td><?= $dt_data_pengajuan['lokasi_tujuan'] ?></td>
			<td><?= $dt_data_pengajuan['jam_mulai_aktual'] ?></td>
			<td><?= $dt_data_pengajuan['jam_selesai_aktual'] ?></td>
			<td><?= $dt_data_pengajuan['pemeriksa'] ?></td>
			<td><?= $dt_data_pengajuan['alasan_pemakaian'] ?></td>
			<td>
				<?php switch ($dt_data_pengajuan['status'])
				{
					case 1:
					$status = 'Menunggu Disetujui Pemeriksa 1';
					break;
					case 2:
					$status = 'Menunggu Disetujui Pemeriksa 2';
					break;
					case 3: 
					$status = 'Disetujui';
					break;
					case 4: 
					$status = 'Ditolak';
					break;

					default:
					break;
				} 
				echo $status;
				?>  
			</td>
			<td><?= $dt_data_pengajuan['created'] ?></td>
		</tr>
		<?php endforeach ?>

</tbody>

</table>