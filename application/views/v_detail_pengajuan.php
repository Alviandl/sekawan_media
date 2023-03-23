          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar Transaksi/</span> Detail Pengajuan</h4>

              <!-- Basic Bootstrap Table -->
              <div class="row">
                <!-- Basic -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Detail Pengajuan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <input name="id" id="id" type="hidden" value="<?= $data_pengajuan['id_pengajuan'] ?>">
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Jenis Mobil</label>
                        <select class="form-select" id="jns_kendaraan" name="jns_kendaraan" required disabled>
                          <option value="">Pilih Mobil</option>
                          <?php foreach ($data_mobil as $dt_data_mobil): ?>
                            <option value="<?=$dt_data_mobil['id_kendaraan'] ?>" <?php if($dt_data_mobil['id_kendaraan'] == $data_pengajuan['id_mobil']) echo"selected"; ?>><?=$dt_data_mobil['no_polisi'] ?> - <?=$dt_data_mobil['merk'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Sopir</label>
                        <select class="form-select" id="sopir" name="sopir" required disabled>
                          <option value="">Pilih Sopir</option>
                          <?php foreach ($data_sopir as $dt_data_sopir): ?>
                            <option value="<?=$dt_data_sopir['id_sopir'] ?>" <?php if($dt_data_sopir['id_sopir'] == $data_pengajuan['id_sopir']) echo"selected"; ?>><?=$dt_data_sopir['nama'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Lokasi Awal</label>
                        <select class="form-select" id="lokasi_awal" name="lokasi_awal" required disabled>
                          <option value="">Pilih Lokasi Awal</option>
                          <option value="Kantor Pusat" <?php if($data_pengajuan['lokasi_awal'] == "Kantor Pusat") echo"selected"; ?>>Kantor Pusat</option>
                          <option value="Kantor Cabang" <?php if($data_pengajuan['lokasi_awal'] == "Kantor Cabang") echo"selected"; ?>>Kantor Cabang</option>
                          <option value="Tambang 1" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 1") echo"selected"; ?>>Tambang 1</option>
                          <option value="Tambang 2" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 2") echo"selected"; ?>>Tambang 2</option>
                          <option value="Tambang 3" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 3") echo"selected"; ?>>Tambang 3</option>
                          <option value="Tambang 4" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 4") echo"selected"; ?>>Tambang 4</option>
                          <option value="Tambang 5" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 5") echo"selected"; ?>>Tambang 5</option>
                          <option value="Tambang 6" <?php if($data_pengajuan['lokasi_awal'] == "Tambang 6") echo"selected"; ?>>Tambang 6</option>
                        </select>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Lokasi Tujuan</label>
                        <select class="form-select" id="lokasi_tujuan" name="lokasi_tujuan" required disabled>
                          <option value="">Pilih Lokasi Tujuan</option>
                          <option value="Kantor Pusat" <?php if($data_pengajuan['lokasi_tujuan'] == "Kantor Pusat") echo"selected"; ?>>Kantor Pusat</option>
                          <option value="Kantor Cabang" <?php if($data_pengajuan['lokasi_tujuan'] == "Kantor Cabang") echo"selected"; ?>>Kantor Cabang</option>
                          <option value="Tambang 1" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 1") echo"selected"; ?>>Tambang 1</option>
                          <option value="Tambang 2" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 2") echo"selected"; ?>>Tambang 2</option>
                          <option value="Tambang 3" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 3") echo"selected"; ?>>Tambang 3</option>
                          <option value="Tambang 4" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 4") echo"selected"; ?>>Tambang 4</option>
                          <option value="Tambang 5" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 5") echo"selected"; ?>>Tambang 5</option>
                          <option value="Tambang 6" <?php if($data_pengajuan['lokasi_tujuan'] == "Tambang 6") echo"selected"; ?>>Tambang 6</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Merged -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">&nbsp;</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Waktu Mulai</label>
                         <input type="datetime-local" id="jam_mulai_aktual" name="jam_mulai_aktual" class="form-control" value="<?= $data_pengajuan['jam_mulai_aktual'] ?>" placeholder="MM / DD / YY, HH:MM:TT" required readonly>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Waktu Selesai</label>
                         <input type="datetime-local" id="jam_selesai_aktual" name="jam_selesai_aktual" class="form-control" value="<?= $data_pengajuan['jam_selesai_aktual'] ?>" placeholder="MM / DD / YY, HH:MM:TT" required readonly>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Menyetujui</label>
                        <select class="form-select" id="id_pemeriksa" name="id_pemeriksa" required disabled>
                          <option selected="">Pilih Atasan</option>
                          <?php foreach ($data_atasan as $dt_data_atasan): ?>
                            <option value="<?=$dt_data_atasan['id_user'] ?>~<?=$dt_data_atasan['id_jabatan'] ?>" <?php if($dt_data_atasan['id_user'] == $data_pengajuan['id_user_pemeriksa']) echo"selected"; ?> ><?=$dt_data_atasan['nama'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Alasan Pemakaian</label>
                         <input type="text-local" id="alasan_pemakaian" name="alasan_pemakaian" class="form-control"  value="<?= $data_pengajuan['alasan_pemakaian'] ?>" required readonly>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <div style="text-align: center;">
                      <button type="button" onclick="location.href='<?= site_url('transaksi') ?>'" class="btn btn-outline-danger">Kembali</button>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              
            </div>
            <!-- / Content -->