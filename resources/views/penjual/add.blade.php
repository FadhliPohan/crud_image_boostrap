@extends('penjual.main')
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

                <form action="{{ Route('penjual.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_penjual" class="col-sm-2 col-form-label">Kode penjual</label>
                        <div class="col-sm-3">
                            <input type="text" name="kode_penjual" class="form-control" id="kode_penjual"
                                placeholder="10 Digit" maxlength="10" value="">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_penjual" class="col-sm-2 col-form-label">Nama penjual</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_penjual" class="form-control" id="nama_penjual"
                                placeholder="Nama penjual" value="">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="harga_penjual">Harga penjual</label>
                            <input type="text" name="harga_penjual" id="harga_penjual" class="form-control"
                                placeholder="Harga penjual" maxlength="13" value="">

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="qty_penjual">Jumlah penjual</label>
                            <input type="text" name="qty_penjual" id="qty_penjual" class="form-control"
                                placeholder="Jumlah penjual" value="">

                        </div>
                    </div>

                    <div class="form-actions">
                        <button href="{{ Route('penjual.index') }}" class="btn btn-info mt-2"><i
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
