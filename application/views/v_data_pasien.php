<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Data Pasien | Poliklinik BK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?=base_url('assets/img/medis.png')?>" rel="icon">
    <link href="<?=base_url('assets/img/apple-touch-icon.png')?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/quill/quill.snow.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/quill/quill.bubble.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/simple-datatables/style.css')?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="<?=base_url('assets/img/medis.png')?>" alt="">
                <span class="d-none d-lg-block">Poliklinik BK</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?=base_url('assets/img/profile-img.jpg')?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?=$user['username']?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?=$user['username']?></h6>
                            <span><?=$user['role']?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?=base_url('auth/logout')?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('admin/view_data_dokter')?>">
                    <i class="ri ri-stethoscope-line"></i>
                    <span>Data Dokter</span>
                </a>
            </li><!-- End Data Dokter Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('admin/view_data_pasien')?>">
                    <i class="ri ri-wheelchair-line"></i>
                    <span>Data Pasien</span>
                </a>
            </li><!-- End Data Pasien Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('admin/view_data_poli')?>">
                    <i class="ri ri-hospital-line"></i>
                    <span>Data Poli</span>
                </a>
            </li><!-- End Data Poli Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('admin/view_data_obat')?>">
                    <i class="ri ri-first-aid-kit-line"></i>
                    <span>Data Obat</span>
                </a>
            </li><!-- End Data Obat Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('auth/logout')?>">
                    <i class="ri ri-logout-box-line"></i>
                    <span>Sign Out</span>
                </a>
            </li><!-- End Sign Out Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Pasien</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Pasien</h5>

                            <!-- Tambah Data Pasien Form -->
                            <form class="row g-3">
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama" id="inputName5">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="inputAlamat">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNoKTP" class="form-label">Nomor KTP</label>
                                    <input type="number" class="form-control" name="no_ktp" id="inputNoKTP">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNoHP" class="form-label">Nomor HP</label>
                                    <input type="number" class="form-control" name="no_hp" id="inputNoHP">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary submit-data">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Tambah Data Pasien Form -->

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Data Pasien</h5>

                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Nomor KTP</th>
                                        <th>Nomor HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1; foreach($pasien as $dataPasien){?>
                                    <tr>
                                        <td><?=$x++;?></td>
                                        <td><?=$dataPasien['no_rm']?></td>
                                        <td><?=$dataPasien['nama']?></td>
                                        <td><?=$dataPasien['alamat']?></td>
                                        <td><?=$dataPasien['no_ktp']?></td>
                                        <td><?=$dataPasien['no_hp']?></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-success update-pasien"
                                                data-bs-toggle="modal" data-bs-target="#updatePasienForm"
                                                data-id='<?=$dataPasien['id']?>'>Update</a>
                                            | <a href="#" class="btn btn-sm btn-outline-danger delete-pasien"
                                                data-id='<?=$dataPasien['id']?>'>Delete</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="updatePasienForm" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pasien Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <input type="hidden" name="idpasien">
                            <input type="hidden" name="iduser">
                            <label>Nomor RM: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Nomor RM" name="no_rmPasien" class="form-control" disabled>
                            </div>
                            <label>Nama Pasien: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Nama Pasien" name="namaPasien" class="form-control">
                            </div>
                            <label>Alamat: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Alamat Pasien" name="alamatPasien" class="form-control">
                            </div>
                            <label>Nomor KTP: </label>
                            <div class="form-group">
                                <input type="number" placeholder="Nomor KTP Pasien" name="no_ktpPasien"
                                    class="form-control">
                            </div>
                            <label>Nomor HP: </label>
                            <div class="form-group">
                                <input type="number" placeholder="Nomor HP Pasien" name="no_hpPasien"
                                    class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update-data">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?=base_url('assets/vendor/apexcharts/apexcharts.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/chart.js')?>/chart.umd.js')?>"></script>
    <script src="<?=base_url('assets/vendor/echarts/echarts.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/quill/quill.js')?>"></script>
    <script src="<?=base_url('assets/vendor/simple-datatables/simple-datatables.js')?>"></script>
    <script src="<?=base_url('assets/vendor/tinymce/tinymce.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/php-email-form/validate.js')?>"></script>

    <!-- Template Main JS File -->
    <script src="<?=base_url('assets/js/main.js')?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {

        $('.submit-data').click(function(event) {
            event.preventDefault();

            var nama = $('[name=nama]').val();
            var alamat = $('[name=alamat]').val();
            var no_hp = $('[name=no_hp]').val();
            var no_ktp = $('[name=no_ktp]').val();

            if (nama.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nama pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (alamat.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Alamat pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (no_hp.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nomor HP wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (no_ktp.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nomor KTP wajib diisi !",
                    icon: "error"
                });
                return;
            }

            $.ajax({
                url: '<?=base_url("admin/tambah_pasien")?>',
                type: 'post',
                data: {
                    namapasien: nama,
                    alamatpasien: alamat,
                    no_hppasien: no_hp,
                    no_ktppasien: no_ktp,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data pasien telah ditambahkan.",
                            showConfirmButton: false,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    } 
                    else if (response.status === 'duplicate') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Nomor KTP sudah terdaftar.",
                            icon: "error"
                        });
                        return;
                    } 
                    else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data pasien gagal ditambahkan.",
                            icon: "error"
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan dalam melakukan tambah data pasien !",
                        icon: "error"
                    });
                    return;
                }
            });
        });

        $('.update-pasien').click(function(event) {
            event.preventDefault();

            var idpasien = $(this).data('id');

            $.ajax({
                url: '<?=base_url('admin/ambil_data_pasien_by_id')?>',
                type: 'post',
                data: {
                    id: idpasien
                },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#updatePasienForm input[name="idpasien"]').val(data.id);
                        $('#updatePasienForm input[name="iduser"]').val(data.id_user);
                        $('#updatePasienForm input[name="no_rmPasien"]').val(data.no_rm);
                        $('#updatePasienForm input[name="namaPasien"]').val(data.nama);
                        $('#updatePasienForm input[name="alamatPasien"]').val(data
                            .alamat);
                        $('#updatePasienForm input[name="no_hpPasien"]').val(data
                            .no_hp);
                        $('#updatePasienForm input[name="no_ktpPasien"]').val(data
                            .no_ktp);
                    } else {
                        alert('Data not found');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            });
        });

        $('.update-data').click(function(event) {
            event.preventDefault();

            var idpasien = $('[name=idpasien]').val();
            var iduser = $('[name=iduser]').val();
            var namapasien = $('[name=namaPasien]').val();
            var alamatpasien = $('[name=alamatPasien]').val();
            var no_hppasien = $('[name=no_hpPasien]').val();
            var no_ktppasien = $('[name=no_ktpPasien]').val();

            if (namapasien.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nama pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (alamatpasien.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Alamat pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (no_hppasien.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nomor HP pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            if (no_ktppasien.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Nomor KTP pasien wajib diisi !",
                    icon: "error"
                });
                return;
            }

            $.ajax({
                url: '<?=base_url('admin/ubah_pasien')?>',
                type: 'post',
                data: {
                    idPasien: idpasien,
                    iduser: iduser,
                    namaPasien: namapasien,
                    alamatPasien: alamatpasien,
                    no_hpPasien: no_hppasien,
                    no_ktpPasien: no_ktppasien,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data pasien telah diupdate.",
                            showConfirmButton: false,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    } 
                    else if(response.status === 'duplikat'){
                        Swal.fire({
                            title: "Gagal!",
                            text: "Nomor KTP sudah terdaftar.",
                            showConfirmButton: false,
                            icon: "error",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                    else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data pasien gagal diupdate.",
                            showConfirmButton: false,
                            icon: "error",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            });
        });

        $('.delete-pasien').click(function(event) {
            event.preventDefault();

            var idpasien = $(this).data('id');

            Swal.fire({
                title: "Anda yakin hapus data?",
                showCancelButton: true,
                confirmButtonText: "Yakin",
                confirmButtonColor: "#48c9b0",
                cancelButtonColor: "#ff0000",
                cancelButtonText: "Tidak",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?=base_url('admin/hapus_pasien')?>',
                        type: 'post',
                        data: {
                            id: idpasien
                        },
                        success: function(response) {
                            if (response.status === 'oke') {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data pasien telah dihapus.",
                                    showConfirmButton: false,
                                    icon: "success",
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                                return;
                            } else {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Data pasien gagal dihapus.",
                                    showConfirmButton: false,
                                    icon: "error",
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                                return;
                            }
                        },
                        error: function() {
                            Swal.fire('Error',
                                'Terjadi kesalahan saat mengirim data', 'error');
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        });
    });
    </script>

</body>

</html>