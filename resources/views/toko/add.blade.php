@extends('toko.main')
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

                <form action="{{ Route('toko.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_toko" class="col-sm-2 col-form-label">Kode toko</label>
                        <div class="col-sm-3">
                            <input type="text" name="kode_toko" class="form-control" id="kode_toko"
                                placeholder="10 Digit" maxlength="10" value="">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_toko" class="col-sm-2 col-form-label">Nama toko</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_toko" class="form-control" id="nama_toko"
                                placeholder="Nama toko" value="">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="harga_toko">Harga toko</label>
                            <input type="text" name="harga_toko" id="harga_toko" class="form-control"
                                placeholder="Harga toko" maxlength="13" value="">

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="qty_toko">Jumlah toko</label>
                            <input type="text" name="qty_toko" id="qty_toko" class="form-control"
                                placeholder="Jumlah toko" value="">

                        </div>
                    </div>

                    <div class="form-actions">
                        <button href="{{ Route('toko.index') }}" class="btn btn-info mt-2"><i
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
