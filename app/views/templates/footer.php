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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <a class="btn btn-primary" href="<?=BASE_URL?>/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASE_URL?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASE_URL?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASE_URL?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASE_URL?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASE_URL?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=BASE_URL?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASE_URL?>/js/demo/datatables-demo.js"></script>

    <!-- custom jquery -->
    <script>
        $(document).ready(function() {
            // admin spp manajemen
            $('.spp-row').on('click', '#adminHapusSppBtn', function() {
                const id = $(this).parents('.spp-row').data('idspp')
                console.log('id', id)

                modal = $('#adminDeleteSppModal')
                modal.find('input[type=hidden]').val(id)
            })

            $('.spp-row').on('click', '#adminEditSppBtn', function() {
                const id = $(this).parents('.spp-row').data('idspp')
                console.log('id', id)

                getSppData(id)
            })

            $('#adminTambahSppBtn').on('click', function() {
                data = {
                    title: 'Tambah data SPP',
                    id_spp: '',
                    tahun: '',
                    nominal: '',
                    btn: 'Tambah',
                    action: '/sppay/public/admin-spp/store',
                }

                setSppModal(data)
            })

            function getSppData(id)
            {
                $.ajax({
                    url: '/sppay/public/admin-spp/getSppData',
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    method: 'post',
                    success: function(res) {
                        data = {
                            title: 'Ubah data SPP',
                            id_spp: res['id_spp'],
                            tahun: res['tahun'],
                            nominal: res['nominal'],
                            btn: 'Ubah',
                            action: '/sppay/public/admin-spp/update',
                        }
                        setSppModal(data)
                    },
                })
            }

            function setSppModal(data)
            {
                modal = $('#adminSppModal')

                modal.find('#adminSppModalLabel').html(data['title'])
                modal.find('form').attr('action', data['action'])
                modal.find('input[type=hidden]').val(data['id_spp'])
                modal.find('#adminSppTahunInput').val(data['tahun'])
                modal.find('#adminSppNominalInput').val(data['nominal'])

                modal.find('button[type=submit]').html(data['btn'])
            }
            // end of admin spp manajemen

            // admin kelas manajemen
            $('.kelas-row').on('click', '#adminEditKelasBtn', function () {
                const id = $(this).parents('.kelas-row').data('idkelas')

                getKelasData(id)
            })

            $('#adminTambahKelasBtn').on('click', function() {
                data = {
                    title: 'Tambah Data Kelas',
                    id_kelas: '',
                    nama: '',
                    komp: '',
                    btn: 'Tambah',
                    action: '/sppay/public/admin-kelas/store',
                }

                setKelasModal(data)
            })

            function getKelasData(id)
            {
                $.ajax({
                    url: '/sppay/public/admin-kelas/getKelasData',
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    method: 'post',
                    success: function(res) {
                        data = {
                            title: 'Ubah Data Kelas',
                            id_kelas: res['id_kelas'],
                            nama: res['nama_kelas'],
                            komp: res['kompetensi_keahlian'],
                            btn: 'Ubah',
                            action: '/sppay/public/admin-kelas/update',
                        }
                        setKelasModal(data)
                    },
                })
            }

            $('.kelas-row').on('click', '#adminHapusKelasBtn', function() {
                const id = $(this).parents('.kelas-row').data('idkelas')

                $modal = $('#adminDeleteKelasModal')
                $modal.find('input[type=hidden]').val(id)
            })

            function setKelasModal(data)
            {
                modal = $('#adminKelasModal')

                modal.find('#adminKelasModalLabel').html(data['title'])
                modal.find('form').attr('action', data['action'])
                modal.find('input[type=hidden]').val(data['id_kelas'])
                modal.find('#adminKelasNamaInput').val(data['nama'])
                modal.find('#adminKelasKompInput').val(data['komp'])

                modal.find('button[type=submit]').html(data['btn'])
            }
            // end of admin kelas manajemen

            // beginning of admin petugas manajemen
            $('.petugas-row').on('click', '#adminDeletePetugasBtn', function() {
                const id = $(this).parents('.petugas-row').data('idpetugas')

                modal = $('#adminDeletePetugasModal')
                modal.find('input[type=hidden]').val(id)
            })
            // end of admin petugas manajemen

            // bgeinning of admin siswa manajemen
            $('.siswa-row').on('click', '#adminDeleteSiswaBtn', function() {
                const id = $(this).parents('.siswa-row').data('idsiswa')

                $('#adminDeleteSiswaModal').find('input[type=hidden]').val(id)
            })
            // end of admin siswa manajemen

            // beginning of admin pembayaran manajemen
            var jumlahBulan = 0
            var totalHarga = 0

            function sumHarga(jBulan, harga) {
                return jBulan * harga
            }

            $('.spp-card').on('click', 'button[type=button]', function() {
                input = $(this).siblings('input[type=hidden]')

                val = $(this).siblings('input[type=hidden]').val()
                val = val == 'true' ? 'false' : 'true'
                input.val(val)

                form = $(this).parents('#adminBayarSppForm')
                harga = form.find('input[name=nominal]').val()
                console.log('harga', harga)

                bulan = $(this).siblings('#inputBulan').data('bulan')
                console.log('bulan', bulan)

                if (val == 'true')
                {
                    $(this).addClass('bg-warning text-white')
                    jumlahBulan++
                    totalHarga = sumHarga(jumlahBulan, harga)
                }
                else {
                    $(this).removeClass('bg-warning text-white')
                    jumlahBulan--
                    totalHarga = sumHarga(jumlahBulan, harga)
                }

                modal = $('#adminBayarSppModal')
                modal.find('#adminBayarSppModalTotalHarga').html('Rp ' + totalHarga)

                console.log('jumlah bulan', jumlahBulan)
                console.log('total harga', totalHarga)
            })

            $('#adminBayarSppModal').on('click', 'button.btn-success', function() {
                form = $('#adminBayarSppForm').submit()
            })

            $('#adminBayarSppBtn').on('click', function() {
                console.log('clicked')
            })
            // end of admin pembayaran manajemen

            // beginning of admin profile manajemen
            $('#adminResetPasswordModal').on('click', 'button.btn-warning', function() {
                form = $('#adminResetPasswordForm')
                form.submit()
            })
            // end of admin profile manajemen

            // beginning of admin transaksi manajemen
            $('#adminTransaksiBayarBtn').on('click', function() {
                form = $('#adminTransaksiForm').submit()
            })

            $('.transaksi-card-btn').on('click', function() {
                input = $(this).siblings('input[type=hidden]')
                val = input.val()
                if (val == '1') {
                    $(this).removeClass('bg-warning text-white')
                    val = 0
                }
                else {
                    $(this).addClass('bg-warning text-white')
                    val = 1
                }
                input.val(val)
            })
            // end of admin transaksi manajemen
        })
    </script>
</body>

</html>