@extends('layout.main')
@section('content')
    
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                            <th>Foto penjual</th>
                            <th>Nama penjual</th>
                            <th>NIK penjual</th>
                            <th>Alamat penjual</th>
                            
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjual as $index => $item)
                             <tr>
                            <td>
                                {{ $index +1 }}
                            </td>
                            <td>
                               {{ $item->foto_penjual }}
                            </td>
                            <td>
                                {{ $item->nama_penjual }}
                            </td>
                            <td>
                                {{ $item->NIK }}
                            </td>
                            <td>
                                {{ $item->alamat_penjual }}
                            </td>
                            <td>
                                <div class="flex">
                                    <a href="" class="badge badge-success p-2">show</a>
                                    <a href="" class="badge badge-primary p-2">update</a>
                                    <a href="" class="badge badge-danger p-2">delete</a>
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