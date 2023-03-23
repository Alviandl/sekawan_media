          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar Transaksi/</span> List Transaksi</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Daftar Transaksi</h5>
                <div class="card-body">
                  <?php if($this->session->userdata('role') == '1'):?>
                    <div class="demo-inline-spacing">
                      <a href="<?php echo base_url('transaksi/form_pengajuan') ?>" class="btn btn-outline-primary">Tambah Pengajuan</a>
                    </div>
                    <br>
                    <div class="form-control">
                      <div class="row g-3">
                        <div class="col mb-0">
                          <label for="emailBasic" class="form-label">Periode Awal</label>
                          <input type="datetime-local" id="tgl_awal" name="tgl_awal" class="form-control" placeholder="MM / DD / YY">
                        </div>
                        <div class="col mb-0">
                          <label for="dobBasic" class="form-label">Periode Akhir</label>
                          <input type="datetime-local" id="tgl_akhir" name="tgl_akhir" class="form-control" placeholder="MM / DD / YY">
                        </div>
                        <div class="col mb-0">                      
                          <div class="demo-inline-spacing">
                            <button type="button" onclick="export_excel()" class="btn btn-outline-success">Export Excel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <br>
                <div class="table-responsive text-nowrap">
                  <table class="table table-bordered" id="dataTable" width="" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Pengajuan</th>
                        <th>Sopir</th>
                        <th>Lokasi Awal</th>
                        <th>Lokasi Tujuan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Alasan Pemakaian</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; foreach ($data_pengajuan as $dt_data_pengajuan): $no++;?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $dt_data_pengajuan['no_pengajuan'] ?></td>
                          <td><?= $dt_data_pengajuan['nama'] ?></td>
                          <td><?= $dt_data_pengajuan['lokasi_awal'] ?></td>
                          <td><?= $dt_data_pengajuan['lokasi_tujuan'] ?></td>
                          <td><?= $dt_data_pengajuan['jam_mulai_aktual'] ?></td>
                          <td><?= $dt_data_pengajuan['jam_selesai_aktual'] ?></td>
                          <td><?= $dt_data_pengajuan['alasan_pemakaian'] ?></td>
                          <td>
                            <?php switch ($dt_data_pengajuan['status'])
                            {
                             case 1:
                             $status = '<span class="badge bg-secondary">Menunggu Disetujui Pemeriksa 1</span>';
                             break;
                             case 2:
                             $status = '<span class="badge bg-info">Menunggu Disetujui Pemeriksa 2</span>';
                             break;
                             case 3: 
                             $status = '<span class="badge bg-success">Disetujui</span>';
                             break;
                             case 4: 
                             $status = '<span class="badge bg-danger">Ditolak</span>';
                             break;

                             default:
                             break;
                            } 
                           echo $status;
                           ?>  
                          </td>
                          <td><?= $dt_data_pengajuan['created'] ?></td>
                          <td>
                            <?php if($this->session->userdata('role') == '1'):?>
                              <a href="<?= base_url('transaksi/form_detail_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
                              <?php if($dt_data_pengajuan['status'] == '1'):?>
                                <a href="<?= base_url('transaksi/form_ubah_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="<?= base_url('transaksi/hapus_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                              <?php endif; ?> 
                            <?php else :?>
                              <a href="<?= base_url('transaksi/form_detail_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
                              <?php if($dt_data_pengajuan['status'] == '1' || $dt_data_pengajuan['status'] == '2'):?>
                                <a href="<?= base_url('transaksi/form_approv_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin akan menyetujui data ini?')"><i class="fa fa-eye"></i> Setujui</a>
                                <a href="<?= base_url('transaksi/form_reject_pengajuan/' . $dt_data_pengajuan['id_pengajuan']) ?>" class="btn btn-sm btn-danger"onclick="return confirm('apakah anda yakin akan Menolak data ini?')"><i class="fa fa-eye"></i> Tolak</a>
                              <?php endif; ?> 
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
              
            </div>
            <!-- / Content -->

            <script type="text/javascript">
              function export_excel(){
                var url = "<?= site_url('transaksi/report_pengajuan_excel') ?>";
                var date_start = $("#tgl_awal").val();
                var date_end = $("#tgl_akhir").val();
                if(date_start!="" && date_end!=""){
                  window.open(url + '/' + date_start + '/' + date_end, '_blank');
                }
                else{
                  alert('Tanggal Periode Tidak Boleh Kosong!');
                }
              }
            </script>

            