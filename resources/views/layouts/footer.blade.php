<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-8 col-md-10">
                <ul class="text-center list-inline">
                    @foreach ($socials as $social)
                        <li class="list-inline-item">
                            <a href="{{ $social->url }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-{{ $social->slug }} fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <p class="copyright text-muted">Copyright &copy; 2011-{{ date('Y') }} {{ $config->footer }}</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('js/clean-blog.min.js') }}"></script>

</body>

</html>
