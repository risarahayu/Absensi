<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{request()->is('absen')?'active':''}}">
                <a class="nav-link" href="/absen">Form Absen</a>
            </li>
            <li class="nav-item  {{request()->is('/riwayatAbsen')?'active':''}}">
                <a class="nav-link" href="">Riwayat Absen</a>
            </li>
        </ul>
    </div>
</nav>