<footer class="container-fluid row row-cols-1 row-cols-sm-2 row-cols-md-4 pt-2 mt-2 border-top bottom-0">
    <div class="col mb-6">
        <p class="text-muted text-center">&copy; Copyright <strong>EAFC PERUWELZ</strong> - {{\Carbon\Carbon::parse(date('Y'))->format('Y') }} <br> Numéro d'entreprise 450.456.125</p>
    </div>

    <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            <li class="nav-item mb-2"><a href="{{ route('homecontact') }}" class="nav-link p-0 text-muted">Contacter-nous</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
    </div>
</footer>
<!-- End  Footer -->




 <!-- Boostrap JS Files -->
  <script src="{{asset('template/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('template/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/bootstrap/js/custom.js')}}"></script>
  <script src="{{asset('template/prismjs/prism.js')}}"></script>
  @yield('javascript')

</body>

</html>
