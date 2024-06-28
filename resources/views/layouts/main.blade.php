<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <title>{{ $title }}</title> --}}


    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')






        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>

                            </a>
                            {{-- {{ auth()->user()->name }} --}}
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"> <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout</button>
                                </form>
                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a> --}}
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <main class="flex-shrink-0">
                        <div class="isi">

                            @yield('container')
                        </div>
                    </main>

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
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    {{-- datatable --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ketika tombol "Switch Tabel" ditekan
            $('#switchTableBtn').click(function() {
                var selectedTable = $('#tableSwitcher').val();
                $('#table').val(selectedTable);
            });

            // Ketika dropdown tabel berubah
            $('#tableSwitcher').change(function() {
                var selectedTable = $(this).val();
                $('#table').val(selectedTable);
            });
        });
    </script>
    <script>
        $.fn.editable.defaults.mode = "inline";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $('.editable').editable({
            url: "/nilaitugas/edit",
            type: 'text',
            name: 'tugas',
            tugas: 'Enter tugas'
        })
        $('.editablekuis').editable({
            url: "/nilaikuis/edit",
            type: 'text',
            name: 'tugas',
            tugas: 'Enter tugas'
        })
        $('.editableuts').editable({
            url: "/nilaiuts/edit",
            type: 'text',
            name: 'tugas',
            tugas: 'Enter tugas'
        })
        $('.editableuas').editable({
            url: "/nilaiuas/edit",
            type: 'text',
            name: 'tugas',
            tugas: 'Enter tugas'
        })


        $(document).ready(function() {
            $("#form_create_nilai").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mata_kuliah_id: $('#matakuliah_id').val(),
                    mahasiswa_id: $('#mahasiswa_id').val(),
                    tugas: $("#tugas").val(),
                };

                // Mengirim data ke server
                $.ajax({
                    type: "POST",
                    url: "/nilaitugas/tambah", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });
        $(document).ready(function() {
            $("#form_create_nilai_kuis").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mahasiswa_id: $('#mahasiswa_id').val(),
                    mata_kuliah_id: $('#matakuliah_id').val(),

                    kuis: $("#kuis").val(),
                };

                // Mengirim data ke server
                $.ajax({
                    type: "POST",
                    url: "/nilaitugas/tambahkuis", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });
        $(document).ready(function() {
            $("#form_create_nilai_uts").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mahasiswa_id: $('#mahasiswa_id').val(),
                    mata_kuliah_id: $('#matakuliah_id').val(),
                    uts: $("#uts").val(),
                };

                // Mengirim data ke server
                $.ajax({
                    type: "POST",
                    url: "/nilaitugas/tambahuts", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });
        $(document).ready(function() {
            $("#form_create_nilai_uas").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mahasiswa_id: $('#mahasiswa_id').val(),
                    mata_kuliah_id: $('#matakuliah_id').val(),
                    uas: $("#uas").val(),
                };

                // Mengirim data ke server
                $.ajax({
                    type: "POST",
                    url: "/nilaitugas/tambahuas", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });
        $(document).ready(function() {
            $("#form_create_bobot").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mahasiswa_id: $('#mahasiswa_id').val(),
                    mata_kuliah_id: $('#mata_kuliah_id').val(),
                    bobot_tugas: $("#bobot_tugas").val(),
                    bobot_kuis: $("#bobot_kuis").val(),
                    bobot_uts: $("#bobot_uts").val(),
                    bobot_uas: $("#bobot_uas").val(),
                };

                // Mengirim data ke server
                $.ajax({
                    type: "POST",
                    url: "/nilaibobot/tambahbobot", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });
        $(document).ready(function() {
            $("#form_create_nilaiakhir").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir default

                // Mengambil data dari formulir
                var formData = {
                    mahasiswa_id: $('#mahasiswa_nama').val(),
                    mata_kuliah_id: $('#mata_kuliah_id').val(),
                    sikap: $("#sikap").val(),
                    tugas: $("#tugas").val(),
                    kompetensi: $("#kompeten").val(),
                    nilaiakhir: $("#nilaiakhir").val(),
                };

                // Mengirim data ke server
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "/nilaiakhir/tambahnilaiakhir", //   Gantilah dengan URL endpoint yang sesuai
                    data: formData,
                    success: function(response) {
                        // Tindakan setelah berhasil membuat data
                        console.log("Data berhasil dibuat:", response);
                        location.reload();
                    },
                    error: function(error) {
                        // Tindakan jika ada kesalahan
                        console.error("Terjadi kesalahan:", error);
                    }
                });
            })
        });

        $('#mata_kuliah_id').change(function() {
            var id_mahasiswa = $("#mahasiswa_nama option:selected").val();
            var mata_kuliah_id = $("#mata_kuliah_id option:selected").val();

            $.ajax({
                type: "POST",
                url: "/nilaiakhir/nilai_mahasiswa",
                data: {
                    id: id_mahasiswa,
                    mata_kuliah_id: mata_kuliah_id
                },
                success: function(response) {
                    data = {
                        "tugas": response.nilai_rata.tugas,
                        "kuis": response.nilai_rata.kuis,
                        "uts": response.nilai_rata.uts,
                        "uas": response.nilai_rata.uas,
                    }
                    console.log(data);
                    var kompeten = $('#kompeten');
                    var nilai_akhir = $('#nilaiakhir');
                    nilai_akhir.val(response.nilai_bobot.nilai_akhir);
                    kompeten.empty();
                    for (key in data) {
                        console.log(data[key]);
                        kompeten.append('<option id=' + data[key] + ' value=' + data[key] + '>' + data[
                            key] + '</option>');
                    }
                    var sikap = $('#sikap');

                    for (key in data) {
                        console.log(data[key]);
                        sikap.append('<option id=' + data[key] + ' value=' + data[key] + '>' + data[
                            key] + '</option>');
                    }
                    var tugas = $('#tugas');

                    for (key in data) {
                        console.log(data[key]);
                        tugas.append('<option id=' + data[key] + ' value=' + data[key] + '>' + data[
                            key] + '</option>');
                    }
                    var nilai_akhir = $('#nilai_akhir');

                    for (key in data) {
                        console.log(data[key]);
                        nilai_akhir.append('<option id=' + data[key] + ' value=' + data[key] + '>' +
                            data[key] + '</option>');
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            })
        });
    </script>
    <script>
        document.getElementById('mata_kuliah_id').addEventListener('change', function() {
            // Ambil nilai dari dropdown
            var selectedCategory = this.value;

            // Lakukan request AJAX ke endpoint Laravel untuk mendapatkan nilai berdasarkan kategori
            axios.get('/get-values/' + selectedCategory)
                .then(function (response) {
                    // Isi nilai ke bidang otomatis
                    document.getElementById('automaticField').value = response.data.automaticFieldValue;

                    // Isi nilai ke bidang-bidang lainnya jika diperlukan
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    </script>


    @yield("script")

</body>

</html>
