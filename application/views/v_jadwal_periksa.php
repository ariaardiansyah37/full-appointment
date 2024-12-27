<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Admin | Poliklinik BK</title>
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
            <a href="<?=base_url('auth')?>" class="logo d-flex align-items-center">
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
                            <a class="dropdown-item d-flex align-items-center"
                                href="<?=base_url('dokter/view_profile')?>">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                <a class="nav-link " href="<?=base_url('auth')?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('dokter/view_profile')?>">
                    <i class="ri ri-user-settings-line"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('dokter/view_jadwal_periksa')?>">
                    <i class="ri ri-calendar-schedule-line"></i>
                    <span>Jadwal Periksa</span>
                </a>
            </li><!-- End Jadwal Periksa Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('dokter/view_periksa_pasien')?>">
                    <i class="ri ri-stethoscope-line"></i>
                    <span>Periksa Pasien</span>
                </a>
            </li><!-- End Periksa Pasien Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('dokter/view_riwayat_pemeriksaan')?>">
                    <i class="ri ri-history-line"></i>
                    <span>Riwayat Pemeriksaan</span>
                </a>
            </li><!-- End Riwayat Pemeriksaan Page Nav -->

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
            <h1>Jadwal Periksa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('auth')?>">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal Periksa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-5">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal Periksa</h5>

                            <!-- Jadwal Periksa -->
                            <form class="row g-3">
                                <div class="col-7">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select id="hari" name="hari" class="form-select">
                                        <option value="">Pilih Hari</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="col-7">
                                    <label for="jamMulai" class="form-label">Mulai Jam</label>
                                    <input type="time" class="form-control" id="jammulai" name="jammulai">
                                </div>
                                <div class="col-7">
                                    <label for="jamSelesai" class="form-label">Selesai Jam</label>
                                    <input type="time" class="form-control" id="jamselesai" name="jamselesai">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>

                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Jadwal Periksa</h5>

                            <!-- List Jadwal Periksa -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Mulai Jam</th>
                                        <th scope="col">Selesai Jam</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($jadwal as $jdw): ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $jdw['hari'] ?></td>
                                        <td><?= $jdw['jam_mulai'] ?></td>
                                        <td><?= $jdw['jam_selesai'] ?></td>
                                        <td>
                                            <!-- Radio button untuk status -->
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input jadwalToggle"
                                                    name="jadwal_aktif" id="statusRadio<?= $jdw['id'] ?>"
                                                    value="<?= $jdw['id'] ?>"
                                                    <?= ($jdw['status'] == 'aktif') ? 'checked' : ''; ?>>
                                                <label class="form-check-label"
                                                    for="statusRadio<?= $jdw['id'] ?>">Aktif</label>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm editBtn"
                                                data-bs-toggle="modal" data-bs-target="#updateJadwal"
                                                data-id="<?=$jdw['id']?>"><i class="bi bi-pencil-fill me-1"></i>
                                                Edit</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>


            </div>
        </section>


    </main><!-- End #main -->

    <div class="modal fade" id="updateJadwal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Basic Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="formUbahJadwal">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <label>Nama Obat: </label>
                        <div class="form-group">
                            <select class="form-control" id="ubahhari" name="ubahhari">
                                <option value="">Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <label>Jam Mulai: </label>
                        <div class="form-group">
                            <input type="time" class="form-control" id="ubahjammulai" name="ubahjammulai"
                                placeholder="Masukkan Jam Mulai">
                        </div>
                        <label>Jam Selesai: </label>
                        <div class="form-group">
                            <input type="time" class="form-control" id="ubahjamselesai" name="ubahjamselesai"
                                placeholder="Masukkan Jam Selesai">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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

        $('.submitBtn').click(function(event) {
            event.preventDefault();

            var hari = $('#hari').val();
            var jamMulai = $('#jammulai').val();
            var jamSelesai = $('#jamselesai').val();

            if (!hari || !jamMulai || !jamSelesai) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Semua data wajib diisi!',
                    icon: 'error'
                });
                return;
            }

            $.ajax({
                url: '<?=base_url("dokter/tambah_jadwal_periksa")?>',
                type: 'post',
                data: {
                    hari: hari,
                    jamMulai: jamMulai,
                    jamSelesai: jamSelesai
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Jadwal berhasil ditambahkan !",
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
                            text: "Jadwal gagal ditambahkan !",
                            icon: "error"
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan dalam mengirim data!",
                        icon: "error"
                    });
                    return;
                }
            });
        });

        $('.editBtn').click(function(event) {
            event.preventDefault();

            var id = $(this).data('id');

            $.ajax({
                url: '<?=base_url("dokter/get_data_jadwal_periksa")?>',
                data: {
                    idjadwal: id
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#formUbahJadwal input[name="id"]').val(data.id);
                        $('#formUbahJadwal select[name="ubahhari"]').val(data.hari);
                        $('#formUbahJadwal input[name="ubahjammulai"]').val(data.jam_mulai);
                        $('#formUbahJadwal input[name="ubahjamselesai"]').val(data
                            .jam_selesai);

                    } else {
                        alert('Data not found');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            })
        });

        $('.saveChanges').click(function(event) {
            event.preventDefault(); // Mencegah aksi default link

            var id = $('[name=id]').val();
            var hari = $('[name=ubahhari]').val();
            var jamMulai = $('[name=ubahjammulai]').val();
            var jamSelesai = $('[name=ubahjamselesai]').val();

            if (hari === 'Pilih Hari' || hari === '') {
                Swal.fire({
                    title: 'Gagal !',
                    text: 'Hari praktek wajib dipilih !',
                    icon: 'error'
                });
                return;
            }

            if (jamMulai === 'Pilih Jam' || jamMulai === '') {
                Swal.fire({
                    title: 'Gagal !',
                    text: 'Jam praktek wajib diisi !',
                    icon: 'error'
                });
                return;
            }

            if (jamSelesai === 'Pilih Jam' || jamSelesai === '') {
                Swal.fire({
                    title: 'Gagal !',
                    text: 'Jam selesai praktek wajib diisi !',
                    icon: 'error'
                });
                return;
            }

            $.ajax({
                url: '<?=base_url("dokter/update_jadwal")?>',
                type: 'post',
                data: {
                    idJadwal: id,
                    hariDokter: hari,
                    jamMulaiDokter: jamMulai,
                    jamSelesaiDokter: jamSelesai,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Jadwal berhasil diperbarui!',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // Refresh halaman setelah sukses
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Jadwal gagal diperbarui!',
                            icon: 'error'
                        });
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            });
        });

        $('.jadwalToggle').change(function() {
            const selectedId = $(this).val();

            // Kirim data menggunakan AJAX
            $.ajax({
                url: '<?= base_url("dokter/update_status_jadwal") ?>',
                type: 'POST',
                data: {
                    id: selectedId
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Jadwal berhasil diperbarui!',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // Refresh halaman setelah sukses
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Jadwal gagal diperbarui!',
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat mengirim data!',
                        icon: 'error'
                    });
                }
            });
        });
    });
    </script>

</body>

</html>