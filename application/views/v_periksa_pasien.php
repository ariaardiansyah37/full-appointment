<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Periksa Pasien | Poliklinik BK</title>
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
            <h1>Periksa Pasien</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('auth')?>">Home</a></li>
                    <li class="breadcrumb-item active">Periksa Pasien</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Periksa Pasien</h5>

                            <!-- Periksa Pasien -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. RM</th>
                                        <th>Pasien</th>
                                        <th>No. Antrian</th>
                                        <th>Tgl Daftar</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1; foreach($pasien as $pas){ $originalDate = $pas['tanggal']; $newDate = date("d-m-Y", strtotime($originalDate))?>
                                    <tr>
                                        <td><?=$x++;?></td>
                                        <td><?=$pas['no_rm']?></td>
                                        <td><?=$pas['pasien_nama']?></td>
                                        <td><?=$pas['no_antrian']?></td>
                                        <td><?=$newDate?></td>
                                        <td><?=$pas['hari']?> (<?=$pas['jam_mulai']?> - <?=$pas['jam_selesai']?>)</td>
                                        <td>
                                            <?php if($pas['status']==='Belum diperiksa'){?>
                                            <button type="button" class="btn btn-danger btn-sm btnPeriksa"
                                                data-bs-toggle="modal" data-bs-target="#periksaPasien"
                                                data-id="<?=$pas['daftar_poli_id']?>">
                                                Periksa</button>
                                            <?php } else{?>
                                            <a
                                                href="<?=base_url('dokter/detail_periksa/'.$pas['daftar_poli_id'])?>"><button
                                                    type="button" class="btn btn-success btn-sm">
                                                    Detail Periksa</button></a>
                                            <?php }?>
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

    <div class="modal fade" id="periksaPasien" tabindex="-1" aria-labelledby="periksaPasienLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="periksaPasienLabel">Periksa Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formDetailPeriksa">
                    <div class="modal-body">
                        <input type="hidden" name="iddaftarpoli" readonly>
                        <div class="form-group mb-3">
                            <label for="namapasien">Nama Pasien</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="namapasien" name="namapasien" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl">Tanggal</label>
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" id="tgl" name="tgl">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keluhan">Keluhan</label>
                            <div class="input-group">
                                <textarea class="form-control" id="Keluhan" name="Keluhan" placeholder="Keluhan"
                                    disabled></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="catatan">Catatan Dokter</label>
                            <div class="input-group">
                                <textarea class="form-control" id="catatan" name="catatan"
                                    placeholder="Catatan Dokter"></textarea>
                            </div>
                        </div>
                        <div id="obat-container">
                            <label for="obat">Pilih Obat</label>
                            <div class="input-group mb-2">
                                <select class="form-control obat" id="obat" name="obat[]">
                                    <option value="">Pilih Obat</option>
                                    <?php foreach ($obat as $daftarobat) { ?>
                                    <option value="<?= $daftarobat['harga'] ?>" data-id="<?= $daftarobat['id'] ?>">
                                        <?= $daftarobat['nama_obat'] ?> - <?= $daftarobat['kemasan'] ?> -
                                        <?= $daftarobat['harga'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-obat"
                                        style="display: none;">-</button>
                                    <button type="button" class="btn btn-success add-obat"
                                        style="margin-left: 5px;">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="biayaobat">Biaya Obat</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="biayaobat" name="biayaobat"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="totalbiaya">Total Biaya</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="totalbiaya" name="totalbiaya"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_button">Submit</button>
                    </div>
                </form>
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

        function updateButtons() {
            var dropdowns = $('#obat-container .input-group');
            var count = dropdowns.length;

            dropdowns.each(function(index) {
                var addButton = $(this).find('.add-obat');
                var removeButton = $(this).find('.remove-obat');

                // Jika hanya ada satu dropdown
                if (count === 1) {
                    addButton.show(); // Tombol + hanya pada dropdown pertama
                    removeButton.hide(); // Tidak ada tombol - jika hanya satu dropdown
                }
                // Jika ada dua atau lebih dropdown
                else {
                    if (index === count - 1) {
                        // Tombol + hanya pada dropdown terakhir
                        addButton.show();
                    } else {
                        // Tombol - ada di setiap dropdown selain dropdown terakhir
                        removeButton.show();
                        addButton.hide(); // Tidak ada tombol + di dropdown selain yang terakhir
                    }

                    // Tombol - muncul di semua dropdown yang lebih dari satu
                    removeButton.show();
                }
            });
        }

        // Ketika tombol + diklik
        $(document).on('click', '.add-obat', function() {
            var obatOptions = $('#obat').html();
            var newObatSelect = `
                <div class="position-relative">
                    <div class="input-group mt-2">
                        <select class="form-control obat" id="obat"
                            name="obat[]">
                            ${obatOptions}
                        </select>
                        <div class="input-group-append">
                            <button type="button"
                                class="btn btn-danger remove-obat"
                                style="display: none;">-</button>
                            <button type="button"
                                class="btn btn-success add-obat"
                                style="margin-left: 5px;">+</button>
                        </div>
                    </div>
            </div>
        `;
            $('#obat-container').append(newObatSelect);
            updateButtons(); // Perbarui tombol setelah menambah dropdown
            calculateTotal(); // Hitung total setiap kali dropdown ditambah
        });

        $(document).on('click', '.remove-obat', function() {
            $(this).closest('.input-group').remove();
            updateButtons(); // Perbarui tombol setelah menghapus dropdown
            calculateTotal(); // Hitung total setelah dropdown dihapus
        });


        // Fungsi untuk menghitung total biaya obat
        function calculateTotal() {
            var totalBiayaObat = 0;

            // Ambil semua pilihan obat yang dipilih
            $('.obat').each(function() {
                var harga = $(this).val(); // Ambil harga obat
                if (harga) {
                    totalBiayaObat += parseInt(harga); // Tambahkan ke total biaya obat
                }
            });

            // Menampilkan total biaya obat
            $('#biayaobat').val(totalBiayaObat);

            // Biaya Dokter tetap
            var biayaDokter = 150000; // Biaya dokter tetap

            // Total biaya periksa = biaya obat + biaya dokter
            var totalBiaya = totalBiayaObat + biayaDokter;

            // Tampilkan total biaya periksa
            $('#totalbiaya').val(totalBiaya);
        }

        // Fungsi untuk menangani perubahan pilihan obat secara langsung
        $(document).on('change', '.obat', function() {
            calculateTotal(); // Setiap kali pilihan obat berubah, hitung ulang total biaya
        });

        // Perbarui tombol dan hitung total saat halaman dimuat pertama kali
        updateButtons();
        calculateTotal();

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

        $('.btnPeriksa').on('click', function() {
            var daftarPoliId = $(this).data('id'); // Ambil ID dari tombol

            $.ajax({
                url: '<?= base_url("dokter/detail_periksa_pasien") ?>', // Endpoint controller
                method: 'POST', // Sesuaikan dengan controller
                data: {
                    daftarPoliId: daftarPoliId
                }, // Kirim data POST
                dataType: 'json',
                success: function(response) {
                    if (response.pasien.daftar_poli_id) {
                        // Isi data ke modal
                        $('[name=iddaftarpoli]').val(response.pasien.daftar_poli_id);
                        $('#namapasien').val(response.pasien.nama_pasien);
                        $('#tgl').val(response.pasien.tanggal);
                        $('#Keluhan').val(response.pasien.keluhan);

                        var obatOptions = '<option value="">Pilih Obat</option>';
                        response.obat.forEach(function(obat) {
                            obatOptions += `
                        <option value="${obat.harga}" data-id="${obat.id}">
                            ${obat.nama_obat} - ${obat.kemasan} - ${obat.harga}
                        </option>
                    `;
                        });
                        $('#obat').html(obatOptions);
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Data pasien tidak ditemukan!',
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal mengambil data pasien!',
                        icon: 'error'
                    });
                }
            });
        });

        $('#submit_button').click(function(event) {
            event.preventDefault();

            // Ambil nilai input lainnya
            var iddaftarpoli = $('[name=iddaftarpoli]').val();
            var tgl = $('[name=tgl]').val();
            var catatan = $('[name=catatan]').val();
            var totalbiaya = $('[name=totalbiaya]').val();

            if (tgl === '') {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Tanggal tidak boleh kosong!',
                    icon: 'error'
                });
                return;
            }
            // Ambil data-id dari setiap dropdown obat yang dipilih
            var obatIds = [];
            $('.obat').each(function() {
                var selectedOption = $(this).find('option:selected');
                var obatId = selectedOption.data('id');
                if (obatId) {
                    obatIds.push(obatId); // Simpan id obat ke dalam array
                }
            });

            // Jika ingin mengirim data ini ke server menggunakan AJAX
            $.ajax({
                url: '<?=base_url("dokter/periksa_pasien")?>', // Ganti dengan URL endpoint server Anda
                method: 'POST',
                data: {
                    iddaftarpoli: iddaftarpoli,
                    tanggal: tgl,
                    catatan: catatan,
                    totalbiaya: totalbiaya,
                    obat_ids: obatIds
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Pasien berhasil diperiksa!',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Pasien gagal diperiksa!',
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan:', error);
                }
            });
        });

    });
    </script>

</body>

</html>