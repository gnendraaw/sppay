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
                    action: '/sppay/public/spp/store',
                }

                setSppModal(data)
            })

            function getSppData(id)
            {
                $.ajax({
                    url: '/sppay/public/spp/getSppData',
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
                            action: '/sppay/public/spp/update',
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
                console.log('id', id)

                getKelasData(id)
            })

            $('#adminTambahKelasBtn').on('click', function() {
                data = {
                    title: 'Tambah Data Kelas',
                    id_kelas: '',
                    nama: '',
                    komp: '',
                    btn: 'Tambah',
                    action: '/sppay/public/kelas/store',
                }

                setKelasModal(data)
            })

            function getKelasData(id)
            {
                $.ajax({
                    url: '/sppay/public/kelas/getKelasData',
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
                            action: '/sppay/public/kelas/update',
                        }
                        setKelasModal(data)
                    },
                })
            }

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
        })
    </script>
</body>

</html>