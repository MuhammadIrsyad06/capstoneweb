<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$profile->nama}} | Leanding Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->G
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a class="navbar-brand mr-auto" href="#">
        <img src="{{URL::to('/')}}/logo/{{$profile->logo}}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        {{$profile->nama}}
      </a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#berita">Berita</a></li>
          <li class="drop-down"><a href="#">Profile</a>
            <ul>
              <li><a href="#profile">Profile Sekolah</a></li>
              <li><a href="#ekstrakulikuler">Ekstrakulikuler</a></li>
              <li><a href="#gtk">Guru & Tenaga Kependidikan</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="">PPDB Online</a>
            <ul>
              <li><a href="#informasi_pendaftaran">Informasi Pendaftaran</a></li>
              @if ($informasi_pendaftaran->status==1)
              <li><a href="/register" target="_blank">Daftar Sekarang</a></li>
              @endif
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Selamat Datang</h1>

          @if ($informasi_pendaftaran->status==1)
          <h2>Di Website {{$profile->nama}}, untuk pendaftaran peserta didik baru silahkan klik tombol daftar dibawah.</h2>
          <div class="d-flex">
            <a href="/register" class="btn btn-outline-primary rounded mb-4 shadow  fw-bold" target="">Daftar Sekarang</a>
            <a href="#informasi_pendaftaran" class="btn-watch-video scrollto">Informasi Pendaftaran <i class="icofont-info-circle"></i></a>
          </div>
          @else
          <h2>Di Website {{$profile->nama}}, pendaftaran peserta didik baru <span class="badge badge-danger">Telah Ditutup</span> sampai jumpa pada PPDB tahun depan.</h2>
          @endif

          <!-- <h2>Di Website {{$profile->nama}}</h2>
          <div class="d-flex">
            <a href="/register" class="btn-get-started scrollto" target="_blank">Daftar Sekarang</a>
          </div> -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Berita Section ======= -->
    <section id="berita" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <span>Berita Terbaru</span>
          <h2>Berita Terbaru</h2>
          <p><a href="/home/berita" target="_blank">Lihat semua berita....</a></p>
        </div>

        <div class="owl-carousel testimonials-carousel">
          @foreach($berita_terbaru as $berita)
          <div class="panel panel-default px-2">
            <div class="panel-heading post-thumb" style="width: auto; height: 240px;">
              <img src="{{URL::to('/')}}/foto_berita/{{$berita->foto}}" class="testimonial-img" alt="">
            </div>
            <div class="panel-body post-body-berita">
              <h5><b>{{$berita->judul}}</b></h5>
              <h6>{{$berita->penulis}} - {{$berita->created_at->diffForHumans()}}</h6>
              <a href="/home/berita/{{$berita->id}}" target="_blank">Baca selengkapnya</a>
              <p>
                {!!substr($berita->deskripsi, 0, 220)!!}.....
              </p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section>
    <!-- End Berita Section -->

    <!-- ======= Profile Section ======= -->
    <section id="profile" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="{{URL::to('/')}}/gambar_profile/{{$profile->gambar}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Profil Sekolah</h3>
            <p>
              {{$profile->deskripsi}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Profile Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"> {{$profile->jumlah_rombel}}</span>
            <p>Ruang Kelasr</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"> {{$profile->jumlah_siswa}}</span>
            <p>Siswa</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"> {{$profile->jumlah_guru}}</span>
            <p>Guru</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"> {{$profile->jumlah_tendik}}</span>
            <p>Tenaga Kependidikan</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
       <!-- ======= Informasi Pendaftaran Section ======= -->
       <section id="informasi_pendaftaran" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="{{URL::to('/')}}/gambar_pendaftaran/{{$informasi_pendaftaran->gambar}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Informasi Pendafaran</h3>
            {!!$informasi_pendaftaran->deskripsi!!}

            @if ($informasi_pendaftaran->status==1)
            <a href="/register" class="btn btn-success" target="_blank" disabled>Daftar Sekarang</a>
            @else
            <a class="btn btn-danger disabled" aria-disabled="true">Pendaftaran Telah Ditutup</a>
            @endif
          </div>
        </div>

      </div>
    </section><!-- End Informasi Pendaftaran Section -->

    <!-- ======= Services Section ======= -->
    <section id="ekstrakulikuler" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <span>Ekskul</span>
          <h2>Ekskul</h2>
          <p>Untuk mengembangkan minat dan bakat siswa di {{$profile->nama}} terdapat beberapa kegiatan ekstrakulikuler, diantaraya :</p>
        </div>

        <div class="row">
          @foreach($ekstrakulikuler as $data_ekskul)
          <div class="col-lg-4 col-md-6 d-flex mt-0 mt-md-0">
            <div class="bg-white">
              <img src="{{URL::to('/')}}/foto_ekstrakulikuler/{{$data_ekskul->foto}}" class="card-img-top w-80" alt="...">
              <div class="container mt-2">
                <h4><a href="">{{$data_ekskul->nama}}</a></h4>
                <p>{{$data_ekskul->deskripsi}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->
    <!-- ======= Team Section ======= -->
    <section id="gtk" class="team section-bg">
    
        <div class="section-title">
          <span>Guru & Tenaga Kependidikan</span>
          <h2>Guru & Tenaga Kependidikan</h2>
        </div>
        <div class="slide-container" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
    <div class="slide-content" style="display: flex; flex-direction: row; margin-left:100px">

        
          @foreach($gurutendik as $gtk)
          <div class="card m-2" style="width: 24rem;">
              <img src="{{URL::to('/')}}/foto_gurutendik/{{$gtk->foto}}" alt="Gambar" style="width: auto; height: 300px;">
              <div class="card-body">
              <h4>{{$gtk->nama}}</h4>
              <span>{{$gtk->jabatan}}</span>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

 

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>Untuk informasi lebih lanjut, bisa menghubungi contact berikut</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{$contact->email}}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telpon/HP:</h4>
                <p>{{$contact->telpon}}</p>
              </div>

              <div class="phone">
                <i class="icofont-instagram"></i>
                <h4>Instagram:</h4>
                <p>{{$contact->instagram}}</p>
              </div>

              <div class="phone">
                <i class="icofont-facebook"></i>
                <h4>Facebook:</h4>
                <p>{{$contact->facebook}}</p>
              </div>
              <div class="phone">
                <i class="icofont-twitter"></i>
                <h4>Twitter:</h4>
                <p>{{$contact->twitter}}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat:</h4>
                <p>{{$contact->alamat}}</p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.595876486137!2d111.83097421431606!3d-6.818906168591899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e770907cfd9a29f%3A0xba8c5bb73cd18bcd!2sMTS%20MANBA&#39;UL%20HUDA!5e0!3m2!1sen!2sid!4v1609170598791!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        MTs. Manba'ul Huda | <strong><span>2020</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>