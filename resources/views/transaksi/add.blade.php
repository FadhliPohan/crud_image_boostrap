@extends('transaksi.main')
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

                <form action="{{ Route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_transaksi" class="col-sm-2 col-form-label">Kode transaksi</label>
                        <div class="col-sm-3">
                            <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi"
                                placeholder="10 Digit" maxlength="10" value="">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_transaksi" class="col-sm-2 col-form-label">Nama transaksi</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_transaksi" class="form-control" id="nama_transaksi"
                                placeholder="Nama transaksi" value="">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="harga_transaksi">Harga transaksi</label>
                            <input type="text" name="harga_transaksi" id="harga_transaksi" class="form-control"
                                placeholder="Harga transaksi" maxlength="13" value="">

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="qty_transaksi">Jumlah transaksi</label>
                            <input type="text" name="qty_transaksi" id="qty_transaksi" class="form-control"
                                placeholder="Jumlah transaksi" value="">

                        </div>
                    </div>

                    <div class="form-actions">
                        <button href="{{ Route('transaksi.index') }}" class="btn btn-info mt-2"><i
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
