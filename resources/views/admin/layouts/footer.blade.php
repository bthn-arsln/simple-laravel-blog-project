<!-- Footer -->
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="my-auto text-center copyright">
            <span>Copyright &copy; {{ $config->footer }}</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="rounded scroll-to-top" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Çıkmak istediğine emin misin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Mevcut oturumunuzu sonlandırmaya hazırsanız aşağıdaki "Oturumu Kapat" ı seçin.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal Et</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Oturumu Kapat</a>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.script')
