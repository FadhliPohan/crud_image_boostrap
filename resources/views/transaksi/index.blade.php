@extends('layout.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Id Pembeli</th>
                                <th>Id Penjual</th>
                                <th>Id Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Total Barang</th>
                                <th>Button</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Id Pembeli</th>
                                <th>Id Penjual</th>
                                <th>Id Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Total Barang</th>
                                <th>Button</th>
                            </tr>

                            <tbody>
                                @foreach ($transaksi as $t)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->kode_transaksi }}</td>
                                        <td>{{ $t->id_pembeli }}</td>
                                        <td>{{ $t->id_penjual }}</td>
                                        <td>{{ $t->id_barang }}</td>
                                        <td>{{ $t->jumlah_barang }}</td>
                                        <td>{{ $t->total_barang }}</td>
                                        <td>
                                            <div class="flex">
                                                <a href="" class="badge badge-success">Show</a>
                                                <a href="" class="badge badge-primary">Edit</a>
                                                <a href="" class="badge badge-danger">Delete</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
