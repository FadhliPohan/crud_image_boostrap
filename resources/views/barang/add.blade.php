
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Input Laporan</h6>
        </div>
        <div class="card-body">

            <form action="add/laporan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="NOTIKET" class="col-sm-2 col-form-label">No.Tiket</label>
                    <div class="col-sm-3">
                        <input type="text" name="no_tiket" class="form-control" id="no_tiket" placeholder="10 Digit" maxlength="10" value="<?php echo  $num = create_random(10); ?>" readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="judulLaporan" class="col-sm-2 col-form-label">Judul Laporan</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul_laporan" class="form-control" id="judul_laporan" placeholder="Judul Laporan" value="">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="klasifikasi">Klasifikasi Kejahatan</label>
                        <select name="id_klasifikasi" id="id_klasifikasi" class="form-control">
                            <option disabled="disabled" selected="selected">--Klasifikasi Jenis Kejahatan--
                            </option>

                            <!-- <?php
                                    $category = mysqli_query($konek, "select * from klasifikasi");
                                    while ($p = mysqli_fetch_array($category)) {
                                        echo "<option value='$p[nama_masalah]' ";
                                        if ($row['id_klarifikasi'] == $p['id_klarifikasi']) {
                                            echo "selected";
                                        }
                                        echo ">$p[nama_masalah]</option>";
                                    }
                                    ?> -->


                            <?php

                            $tampil4 = mysqli_query($konek, "select * from klasifikasi");
                            while ($row4 = mysqli_fetch_array($tampil4)) {
                            ?>
                                <option value="<?php echo $row4['id_klasifikasi']; ?>"><?php echo $row4['nama_masalah']; ?></option>';
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tempatLahir">Lokasi Kejadian</label>
                        <input type="text" class="form-control" name="lokasi_kejadian" id="lokasi_kejadian" placeholder="lokasi Kejadian">

                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tglKejadian">Tanggal Kejadian</label>
                        <input type="date" class="form-control" name="tanggal_kejadian" id="tglKejadian">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="namaSaksi">Saksi</label>
                        <input type="text" name="saksi" id="namaSaksi" class="form-control" placeholder="Nama saksi yang melihat" maxlength="13" value="">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bukti">Bukti</label>
                        <input type="file" name="bukti" id="bukti" class="form-control" placeholder="Bukti yang mendukung" value="">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi Kejadian</label>
                    <div class="col-sm-10">
                        <textarea rows="6" name="isi_laporan" class="form-control" id="isi_laporan" placeholder="Harap isikan alur kejadian dengan lengkap!" value=""></textarea>

                    </div>
                </div>
                <div class="form-actions">
                    <button href="laporan-semua.php" class="btn btn-info mt-2"><i class="fas fa-fw fa-arrow-left"></i> Kembali</button>
                    <button type="submit" class="btn btn-success mt-2"> <i class="fa fa-check"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger mt-2"><i class="fa fa-times"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>