<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Ke Poli | Poliklinik BK</title>
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
                <a class="nav-link " href="<?=base_url('')?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=base_url('pasien/view_daftar_poli')?>">
                    <i class="ri ri-hospital-line"></i>
                    <span>Daftar Poli</span>
                </a>
            </li><!-- End Daftar Poli Page Nav -->

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
            <h1>Daftar Poli</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('auth')?>">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Poli</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-7">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Poli</h5>

                            <!-- Daftar Poli -->
                            <form class="row g-3">
                                <div class="col-md-5">
                                    <label for="NamaPasien" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control" id="namapasien" name="namapasien"
                                        value="<?=$user['nama']?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label for="norm" class="form-label">Nomor RM</label>
                                    <input type="text" class="form-control" id="norm" name="norm"
                                        value="<?=$user['no_rm']?>" disabled>
                                </div>
                                <div class="col-7">
                                    <label for="poli" class="form-label">Tempat Poli</label>
                                    <select class="form-select" id="poli" name="poli">
                                        <<option value="">Pilih Poli</option>
                                            <?php foreach($poli as $data_poli): ?>
                                            <option value="<?= $data_poli['id'] ?>">
                                                <?= $data_poli['nama_poli'] ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-7">
                                    <label for="jadwal" class="form-label">Jadwal</label>
                                    <select class="form-select" id="jadwal" name="jadwal">
                                        <<option value="">Pilih Jadwal</option>
                                    </select>
                                </div>
                                <div class="col-7">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea type="time" class="form-control" id="keluhan" name="keluhan"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Riwayat Mendaftar Poli</h5>

                            <!-- List Riwayat Mendaftar Poli -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Jadwal</th>
                                        <th>Tgl Daftar</th>
                                        <th>Antrian</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; if($daftar_poli){ foreach($daftar_poli as $daftarpoli){ $originalDate = $daftarpoli['tanggal']; $newDate = date("d-m-Y", strtotime($originalDate))?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$daftarpoli['nama_poli']?></td>
                                        <td><?=$daftarpoli['dokter_nama']?></td>
                                        <td><?=$daftarpoli['hari']?> (<?=$daftarpoli['jam_mulai']?> -
                                            <?=$daftarpoli['jam_selesai']?>)</td>
                                        <td><?=$newDate?></td>
                                        <td><?=$daftarpoli['no_antrian']?></td>
                                        <td><button type="button"
                                                class="btn btn-info btn-sm"><?=$daftarpoli['status']?></button>
                                        </td>
                                        <?php if($daftarpoli['status']==='Sudah diperiksa'){?>
                                        <td><button type="button" class="btn btn-info btn-sm detail_periksa"
                                                data-bs-toggle="modal" data-bs-target="#detailPeriksa"
                                                data-id="<?=$daftarpoli['daftar_poli_id']?>">Detail
                                                Periksa</button></td>
                                        <?php }else{ ?>
                                        <td><button type="button" class="btn btn-danger btn-sm">Tidak
                                                Tersedia</button>
                                        </td>
                                        <?php }?>
                                    </tr>
                                    <?php } } else{?>
                                    <tr>
                                        <td colspan="10">
                                            <center>Tidak ada riwayat mendaftar poli</center>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

    <div class="modal fade" id="detailPeriksa" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Periksa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabel Detail Periksa -->
                    <table class="table table-bordered" id="detailperiksa">
                        <tbody>
                            <tr>
                                <th>Poli</th>
                                <td id="poli_detail"></td> <!-- Poli akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Dokter</th>
                                <td id="dokter_detail"></td> <!-- Dokter akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td id="tanggal_detail"></td> <!-- Tanggal akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td id="keluhan_detail"></td> <!-- Keluhan akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Obat</th>
                                <td id="obat_detail"></td> <!-- Obat akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Catatan Dokter</th>
                                <td id="catatan_dokter_detail"></td>
                                <!-- Catatan Dokter akan ditampilkan di sini -->
                            </tr>
                            <tr>
                                <th>Biaya Periksa</th>
                                <td id="biaya_periksa_detail"></td>
                                <!-- Biaya Periksa akan ditampilkan di sini -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

        $('#poli').change(function() {
            var idPoli = $(this).val();

            // Cek apakah id_poli terpilih
            if (idPoli !== "") {
                $.ajax({
                    url: '<?= base_url("pasien/get_jadwal_dokter") ?>', // Ganti dengan URL controller yang sesuai
                    type: 'POST',
                    data: {
                        id_poli: idPoli
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Kosongkan jadwal daftar sebelumnya
                        $('#jadwal').html('<option value="">Pilih Jadwal</option>');
                        if (data.length > 0) {

                            // Menampilkan jadwal untuk poli yang dipilih
                            $.each(data, function(index, jadwal) {
                                // Tambahkan jadwal ke select jadwal
                                $('#jadwal').append('<option value="' +
                                    jadwal
                                    .id + '">Dr. ' + jadwal.nama + ' | ' +
                                    jadwal
                                    .hari +
                                    ' | ' + jadwal
                                    .jam_mulai + ' - ' + jadwal.jam_selesai +
                                    '</option>');
                            });
                        } else {
                            // Jika tidak ada data yang ditemukan
                            $('#jadwal').html(
                                '<option value="">Jadwal tidak tersedia</option>');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data jadwal.');
                    }
                });
            } else {
                // Kosongkan daftar jadwal jika tidak ada poli yang dipilih
                $('#jadwal').html('<option value="">Pilih Poli terlebih dahulu</option>');
            }
        });

        $('.submitBtn').click(function(event) {
            event.preventDefault();

            var idjadwal = $('[name=jadwal]').val();
            var keluhan = $('[name=keluhan]').val();
            var poli = $('[name=poli]').val();


            if (poli === '' || idjadwal === '' || keluhan.length === 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Semua data wajib diisi !",
                    icon: "error"
                });
                return;
            }

            $.ajax({
                url: '<?=base_url("pasien/tambah_daftar_poli")?>',
                type: 'post',
                data: {
                    idjadwal: idjadwal,
                    keluhan: keluhan,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Nomor antrian berhasil dibuat.",
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
                            text: "Nomor antrian gagal dibuat.",
                            icon: "error"
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data',
                        'error');
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

        $('.detail_periksa').click(function(event) {
            event.preventDefault();

            var id_daftar_poli = $(this).data('id');

            $.ajax({
                url: '<?=base_url("dokter/get_detail_pasien_riwayat")?>',
                type: 'POST',
                data: {
                    daftar_poli_id: id_daftar_poli
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data); // Debug response di console browser
                    if (data && data.detail_periksa) {
                        $('#poli_detail').text(data.detail_periksa.nama_poli || '-');
                        $('#dokter_detail').text(data.detail_periksa.dokter_nama || '-');
                        $('#tanggal_detail').text(data.detail_periksa.tgl_periksa || '-');
                        $('#keluhan_detail').text(data.detail_periksa.keluhan || '-');
                        $('#catatan_dokter_detail').text(data.detail_periksa.catatan ||
                        '-');
                        $('#biaya_periksa_detail').text(data.detail_periksa.biaya_periksa ||
                            '-');

                        // Menampilkan daftar obat
                        var obatList = '';
                        if (data.obat && data.obat.length > 0) {
                            $.each(data.obat, function(index, obat) {
                                obatList +=
                                    `<li>${obat.nama_obat} - Rp${obat.harga} (${obat.kemasan})</li>`;
                            });
                        } else {
                            obatList = '<li>Tidak ada obat yang diberikan</li>';
                        }
                        $('#obat_detail').html(obatList);

                        // Tampilkan modal
                        $('#detailPeriksa').modal('show');
                    } else {
                        Swal.fire('Error', 'Data detail periksa tidak ditemukan.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error: ', xhr
                    .responseText); // Debug error di console browser
                    Swal.fire('Error', 'Terjadi kesalahan saat mengambil data.', 'error');
                }
            });
        });
    });
    </script>

</body>

</html>