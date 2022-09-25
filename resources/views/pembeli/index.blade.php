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
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Pembeli</th>
                                <th>Nama Pembeli</th>
                                <th>NIK Pembeli</th>
                                <th>Alamat Pembeli</th>
                                <th>Jenis Kelamin</th>
                                <th>Button</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Foto Pembeli</th>
                                <th>Nama Pembeli</th>
                                <th>NIK Pembeli</th>
                                <th>Alamat Pembeli</th>
                                <th>Jenis Kelamin</th>
                                <th>Button</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($pembeli as $p)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $p->foto_pembeli }}</td>
                                    <td>{{ $p->nama_pembeli }}</td>
                                    <td>{{ $p->NIK }}</td>
                                    <td>{{ $p->alamat_pembeli }}</td>
                                    <td>{{ $p->jk_pembeli }}</td>
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
