<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.navigation')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    @include('layouts.navtop')

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Illustrations -->
                    <div class="container-fluid">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary">DAFTAR PENYEWA</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="mb-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="dataTable_length"></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="dataTable_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search"
                                                            class="form-control form-control-sm col" placeholder=""
                                                            aria-controls="dataTable"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered dataTable" id="dataTable"
                                                    width="100%" cellspacing="0" role="grid"
                                                    aria-describedby="dataTable_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0"
                                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 76.2px;">No</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Position: activate to sort column ascending"
                                                                style="width: 105.2px;">e-Mail</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Office: activate to sort column ascending"
                                                                style="width: 59.2px;">Nama</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Age: activate to sort column ascending"
                                                                style="width: 30.2px;">Status NIK</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="dataTable" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Age: activate to sort column ascending"
                                                                style="width: 30.2px;">Membership</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="dataTable" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Start date: activate to sort column ascending"
                                                                style="width: 68.2px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataPenyewa as $item)
                                                            <tr class="odd">
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->pengguna->email }}</td>
                                                                <td>{{ $item->pengguna->name }}</td>
                                                                <td>{{ $item->status_nik == 'Valid' ? 'Valid' : ($item->status_nik == 'Tidak_Valid' ? 'Tidak Valid' : 'Proses') }}
                                                                <td>{{ $item->membership == 'Member' ? 'Member' : ($item->membership == 'Non_Member' ? 'Non Member' : 'Proses') }}
                                                                <td>
                                                                    <a href="#" class="btn btn-info btn-circle"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal{{ $item->id }}">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="hapusPenyewa({{ $item->id }})"
                                                                        class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>

                                                                </td>
                                                            </tr>
                                                            @if (isset($item))
                                                                <div id="myModal{{ $item->id }}" class="modal fade"
                                                                    role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <!-- konten modal-->
                                                                        <div class="modal-content">
                                                                            <!-- heading modal -->
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <!-- body modal -->
                                                                            <div class="modal-body">
                                                                                <form>
                                                                                    <div class="text-center">
                                                                                        <img src="{{ asset('img/' . $item->foto_ktp) }}"
                                                                                            class="img-thumbnail"
                                                                                            alt="{{ $item->foto_ktp }}">
                                                                                    </div>
    
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">NIK</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            value="{{ $item->nik }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">NAMA</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->pengguna->name }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Tempat
                                                                                            Lahir</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->tempat_lahir }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Tanggal
                                                                                            Lahir</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ \Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('dddd, DD/MM/YYYY') }}">
    
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Alamat</label>
                                                                                        <textarea type="text" class="form-control" id="exampleInputtext1">{{ $item->alamat }}</textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">RT/RW</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->rt_rw }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Kel/Desa</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->kelurahan }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Kecamatan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->kecamatan }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Pekerjaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->pekerjaan }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputtext1">Kewarganegaraan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputtext1"
                                                                                            value="{{ $item->kewarganegaraan }}">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function hapusPenyewa(kode) {
            Swal.fire({
                title: 'Apakah anda ingin menghapus penyewa?',
                html: `Jika penyewa telah melakukan penyewaan maka tidak dapat dihapus`,
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a hidden form
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ route('hapusPenyewa', ['id' => 'kode']) }}`.replace('kode',
                        kode); // Update with the appropriate URL
                    document.body.appendChild(form);

                    // Add the CSRF token input field to the form
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}'; // Update if necessary
                    form.appendChild(csrfInput);

                    // Add the hidden method field for PUT request
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);

                    // Submit the form
                    form.submit();
                }
            });
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
