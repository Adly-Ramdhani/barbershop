<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HairCut - Hair Salon HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    

    <!-- Favicon -->
    <link href="{{ asset('hair-salon-html-template/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('hair-salon-html-template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('hair-salon-html-template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('hair-salon-html-template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('hair-salon-html-template/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    .product-card {
    background-color: #191c24;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(108, 114, 147, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    }

    .product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(108, 114, 147, 0.8);
    }

    .product-img {
    width: 100%;
    height: 220px;
    object-fit: contain;
    background-color: white;
    padding: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .product-title {
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #ffffff;
    }

    .price {
    color: #d62828;
    font-weight: bold;
    }

    .product-description {
    font-size: 0.95rem;
    color: #e0e0e0;
    }


 </style>

</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fa fa-cut me-3"></i>Brother Scissors Barber</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#" class="nav-item nav-link active">Halaman</a>
                <a href="#reservation-section" class="nav-item nav-link">Reservasi</a>
                <a href="#about" class="nav-item nav-link">Tentang Kami</a>
                <a href="#services" class="nav-item nav-link">Layanan</a>
            </div>
            @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger rounded-0 py-2 px-lg-4 d-none d-lg-block">Logout <i class="fa fa-sign-out-alt ms-3"></i></button>
            </form>
        @else
            <a href="{{ route('register') }}" class="btn btn-success rounded-0 py-2 px-lg-4 d-none d-lg-block me-2">Register <i class="fa fa-user-plus ms-3"></i></a>
            <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block">Login <i class="fa fa-arrow-right ms-3"></i></a>
        @endauth
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('hair-salon-html-template/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-3 animated slideInDown">Kami Akan Menjaga Penampilan Anda Yang Luar Biasa</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Raya Bogor-Sukabumi, RT.04/RW.05,Pakuan,Kec.Bogor Sel.,Kota Bogor, Jawa Barat 16134</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-phone-alt text-primary me-3"></i>+6288293077838</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('hair-salon-html-template/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Potongan Rambut Mewah dengan Harga Terjangkau</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Raya Bogor-Sukabumi, RT.04/RW.05,Pakuan,Kec.Bogor Sel.,Kota Bogor, Jawa Barat 16134</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-phone-alt text-primary me-3"></i>+6288293077838</h4>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="{{ asset('hair-salon-html-template/img/about.jpg') }}" alt="">
                        <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-primary mb-3">
                            25 Tahun</h1>
                            <h2 class="text-uppercase mb-0">Pengalaman</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" id="about">
                    <!-- <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                    Tentang Kami</p> -->
                    <h1 class="text-uppercase mb-2">Lebih dari sekadar potongan rambut. Pelajari lebih lanjut tentang kami!</h1>
                    <p>
                    Brother's Barbershop adalah tempat di mana setiap pria menemukan gaya terbaiknya. Dengan tukang cukur berpengalaman dan layanan berkualitas tinggi, kami memberikan pengalaman perawatan yang elegan dan memuaskan. Dari potongan rambut modern hingga cukur tradisional, kami memperhatikan setiap detail untuk memastikan Anda tampil sempurna.</p>
                    <p class="mb-4">Kami percaya bahwa perawatan diri adalah seni, dan setiap pria berhak mendapatkan yang terbaik. Jadikan Barbershop Brother sebagai mitra gaya Anda.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-2">
                            Sejak 2000</h3>
                            <p class="mb-0">Barbershop Brother telah menjadi simbol keahlian dan dedikasi dalam dunia perawatan. Dengan pengalaman puluhan tahun, kami terus memberikan layanan terbaik bagi setiap pelanggan.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-2">1000+ klien</h3>
                            <p class="mb-0">
                            Lebih dari 1000 klien telah mempercayakan gaya mereka kepada kami. Setiap potong rambut dan perawatan merupakan bukti komitmen kami untuk memberikan hasil yang memuaskan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-xxl py-5" id="reservation-section">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="bg-secondary p-5">
                    <h1 class="text-uppercase mb-4">Dapatkan reservasi Anda sekarang!</h1>
            
                    @auth
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf
                            <div id="servicesContainer"></div> 
                            <div class="row g-3">
                                <!-- User ID (Hidden, diisi otomatis) -->
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Nama</label>
                                    </div>
                                </div>
            
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="phone" name="phone" placeholder="Your Phone" required>
                                        <label for="phone">Telepon</label>
                                    </div>
                                </div>
            
                                <!-- Date -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-transparent" id="date" name="date" placeholder="Date" required>
                                        <label for="date">Tanggal</label>
                                    </div>
                                </div>
            
                                 <!-- Services -->
                                 <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select bg-transparent" id="services">
                                            <option value="">Pilih layanan</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <button type="button" class="btn btn-success mt-2" id="addService">Tambah Layanan</button>
                                </div>
                                
                                <!-- Daftar layanan yang dipilih -->
                                <div class="col-12 mt-3">
                                    <ul id="selectedServices" class="list-group"></ul>
                                </div>
                                
                                <!-- Input Hidden untuk Submit -->
                                <input type="hidden" name="services" id="servicesInput">
                                
                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                    Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <!-- Jika user belum login -->
                        <p class="text-white mb-4">Silakan login terlebih dahulu untuk melakukan reservasi.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4">Login</a>
                    @endauth
                </div>
            </div>
            
            <div class="row g-4 text-center" id="services">
            <h1 class="text-uppercase">
            Layanan kami!</h1>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/haircut.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">
                            Potong rambut</h3>
                            <p>Potongan rambut presisi yang disesuaikan dengan gaya dan kebutuhan Anda. Hasil yang rapi dan bergaya setiap saat.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/beard-trim.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">
                            Pemangkasan Jenggot</h3>
                            <p>Perawatan jenggot profesional untuk tampilan yang rapi dan maskulin. Dapatkan bentuk yang sempurna dengan sentuhan ahli kami.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/mans-shave.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Pria Bercukur</h3>
                            <p>Pengalaman bercukur klasik dengan pisau cukur dan handuk panas, memberikan kenyamanan dan hasil yang halus.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/hair-dyeing.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">
                            Pewarnaan Rambut</h3>
                            <p>Ubah rambut Anda dengan warna yang sesuai dengan kepribadian Anda. Kami menggunakan produk premium untuk hasil terbaik.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/mustache.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Kumis</h3>
                            <p>Perawatan khusus untuk kumis, mulai dari pemangkasan hingga penataan, untuk menciptakan penampilan yang rapi dan bergaya.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="{{ asset('hair-salon-html-template/img/stacking.png') }}" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">
                            Menumpuk</h3>
                            <p>Gaya rambut berlapis modern dan segar, dirancang untuk menambah dimensi dan volume pada rambut Anda.</p>
                            <!-- <span class="text-uppercase text-primary">From $15</span> -->
                        </div>
                        {{-- <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Price Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <!-- Bagian Pertama (Working Hours) -->
                <div class="col-lg-6 d-flex flex-column h-100">
                    <div class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                            <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Jam Kerja</p>
                            <h1 class="text-uppercase mb-4">Tukang Cukur Profesional Menunggu Anda</h1>
                            <div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Senin</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Selasa</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Rabu</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Kamis</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Jumat</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <h6 class="text-uppercase mb-0">Sabtu</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Minggu</h6>
                                    <span class="text-uppercase">Pukul 09.00 - 20.00</span>
                                </div>
                                <h6 class="text-uppercase mb-0 text-primary text-center mt-3">Hari Besar (Tutup)</h6>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Bagian Kedua (Price & Plan) -->
                <div class="col-lg-6 d-flex flex-column h-100">
                    <div class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                            <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Harga & Paket</p>
                            <h1 class="text-uppercase mb-4">Lihat Layanan dan Harga Pangkas Rambut Kami</h1>
                            <div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Dewasa</h6>
                                    <span class="text-uppercase text-primary">Rp. 30.000</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Anak-anak</h6>
                                    <span class="text-uppercase text-primary">Rp. 25.000</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Cuci rambut</h6>
                                    <span class="text-uppercase text-primary">Rp. 10.000</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Creambath</h6>
                                    <span class="text-uppercase text-primary">Rp. 40.000</span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">Dewasa + Cuci rambut</h6>
                                    <span class="text-uppercase text-primary">Rp. 35.000</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <h6 class="text-uppercase mb-0">Semir rambut + keramas</h6>
                                    <span class="text-uppercase text-primary">Rp. 60.000</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <h6 class="text-uppercase mb-0">Cat rambut + potong rambut</h6>
                                    <span class="text-uppercase text-primary">Rp. 80.000</span>
                                </div>
                            </div>
                            <div class="text-center text-muted small mt-3">*Harga dapat berubah sewaktu-waktu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Price End -->

    {{-- card start --}}
    <div class="container py-5">
        <h1 class="text-center mb-5 section-heading">PRODUK</h1>
        <div class="row g-4">
          @forelse($products as $product)
          <div class="col-md-4">
            <div class="product-card text-white d-flex flex-column h-100">
              <!-- Menampilkan gambar pertama dari produk -->
              @if ($product->images->isNotEmpty())
                    @foreach ($product->images as $image)
                    <img src="{{ asset( $image->image_path) }}" 
                    alt="{{ $product->name }}" 
                    class="product-img">
                    @endforeach
                @endif

      
              <div class="p-3 d-flex flex-column gap-2 h-100">
                <div class="product-title">{{ strtoupper($product->name) }}</div>
                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="product-description">{{ strtolower($product->description) }}</div>
                {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-detail mt-auto">Lihat Detail</a> --}}
              </div>
            </div>
          </div>
          @empty
          <div class="col-12 text-center text-muted">Belum ada produk.</div>
          @endforelse
        </div>
      </div>
      

  

    
      

    {{-- Card End --}}


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-uppercase">Suasana Kerja</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="hair-salon-html-template/img/test1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <!-- <h5 class="text-uppercase">John Doe</h5> -->
                            <span class="text-primary">Suasana kerja profesional dengan tukang cukur berpengalaman yang siap memberikan pelayanan terbaik.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="hair-salon-html-template/img/test.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <!-- <h5 class="text-uppercase">Alex Brown</h5> -->
                            <span class="text-primary">Ruang tunggu yang nyaman dengan desain modern untuk pengalaman yang lebih menyenangkan.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="hair-salon-html-template/img/test2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <!-- <h5 class="text-uppercase">Ryan Lee</h5> -->
                            <span class="text-primary">Peralatan lengkap dan lingkungan bersih untuk memastikan kepuasan pelanggan.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="hair-salon-html-template/img/test5.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <!-- <h5 class="text-uppercase">Noah Harris</h5> -->
                            <span class="text-primary">
                            Tampilan luar barbershop ini menarik dengan tempat parkir yang luas dan mudah ditemukan oleh pelanggan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                Kesaksian</p>
                <h1 class="text-uppercase">Apa Kata Klien Kami!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-1.jpg' alt=''>">
                    <h4 class="text-uppercase">Fiedely Halim</h4>
                    <!-- <p class="text-primary">Profession</p> -->
                    <span class="fs-5">Pemotongannya cepat dan hasilnya sesuai permintaan, area parkirnya luas muat 3 mobil, ada AC dan ada sofa untuk menunggu</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-2.jpg' alt=''>">
                    <h4 class="text-uppercase">Shandika</h4>
                    <!-- <p class="text-primary">Profession</p> -->
                    <span class="fs-5">Hasil diskonnya lumayan dengan harga 30rb, buka jam 09.00-20.00</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-3.jpg' alt=''>">
                    <h4 class="text-uppercase">Ripto</h4>
                    <!-- <p class="text-primary">Profession</p> -->
                    <span class="fs-5">Cukup Bagus</span>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">
                    Hubungi Kami</h4>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-map-marker-alt text-primary"></span>
                        </div>
                        <span>Jl. Raya Bogor-Sukabumi, RT.04/RW.05,Pakuan,Kec.Bogor Sel.,Kota Bogor, Jawa Barat 16134</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-phone-alt text-primary"></span>
                        </div>
                        <span>+6288293077838</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-envelope-open text-primary"></span>
                        </div>
                        <span>@uuaer447@gmail.com</span>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Newsletter</h4>
                    <div class="position-relative mb-4">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                    <div class="d-flex pt-1 m-n1">
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                    <!-- </div>
                </div>
            </div>
        </div> --> 
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('hair-salon-html-template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('hair-salon-html-template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('hair-salon-html-template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('hair-salon-html-template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('hair-salon-html-template/js/main.js') }}"></script>
   <script>
document.addEventListener("DOMContentLoaded", function () {
    let selectedServices = [];
    const servicesDropdown = document.getElementById("services");
    const addServiceBtn = document.getElementById("addService");
    const selectedServicesList = document.getElementById("selectedServices");
    const servicesInput = document.getElementById("servicesInput");

    addServiceBtn.addEventListener("click", function () {
        const selectedServiceId = servicesDropdown.value;
        const selectedServiceName = servicesDropdown.options[servicesDropdown.selectedIndex].text;

        if (selectedServiceId && !selectedServices.includes(selectedServiceId)) {
            selectedServices.push(selectedServiceId);
            updateServicesInput(); // Perbarui input hidden

            // Tambah ke daftar tampilan
            const li = document.createElement("li");
            li.className = "list-group-item d-flex justify-content-between align-items-center";
            li.innerHTML = `
                ${selectedServiceName}
                <button type="button" class="btn btn-danger btn-sm remove-service" data-id="${selectedServiceId}">Hapus</button>
            `;
            selectedServicesList.appendChild(li);
        }
    });

    selectedServicesList.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-service")) {
            const serviceId = e.target.getAttribute("data-id");

            // Hapus dari array
            selectedServices = selectedServices.filter(id => id !== serviceId);
            updateServicesInput(); // Perbarui input hidden

            // Hapus dari tampilan
            e.target.parentElement.remove();
        }
    });

    function updateServicesInput() {
        servicesInput.value = JSON.stringify(selectedServices); // Simpan sebagai JSON
        console.log("Updated servicesInput:", servicesInput.value); // Debugging
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    @if (session('success'))
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    @endif

    @if (session('error'))
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    @endif
});
</script>
    
</body>

</html>