@extends('pembeli.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-light">Form Input {{ $title }}</h6>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong> Whoops!</strong> Ada yang saalah dengan inputan yang anda masukkan. <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">

                <form action="{{ Route('pembeli.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli"
                                placeholder="Nama pembeli" value="">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_pembeli" class="col-sm-2 col-form-label">Alamat Pembeli</label>
                        <div class="col-sm-10">
                            <textarea rows="6" name="alamat_pembeli" class="form-control" id="alamat_pembeli"
                                placeholder="Harap Alamat dengan lengkap!" value=""></textarea>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="NIK">NIK</label>
                            <input type="text" name="NIK" id="NIK" class="form-control"
                                placeholder="Isikan NIK anda" maxlength="13" value="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="jk_pembeli">Jenis Kelamin</label>
                            
                            <select name="jk_pembeli" id="jk_pembeli" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="foto_pembeli">Foto Pembeli</label>
                            <input type="file" name="foto_pembeli" class="form-control" placeholder="foto">
                        </div>
                    </div>



                    <div class="form-actions">
                        <button href="{{ Route('pembeli.index') }}" class="btn btn-info mt-2"><i
                                class="fas fa-fw fa-arrow-left"></i>
                            Kembali</button>
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
@endsection
