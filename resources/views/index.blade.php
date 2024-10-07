@extends('layouts.main')

@section('style')
<style>
  .container-fluid{
    padding: 0 4rem;
  }

  section{
    margin-bottom: 4rem;
  }

  /* cta section */
  .cta-wrapper{
    /* height: 100vh; */
    border-radius: 20px;
    background: #0dcaf0;
    padding: 4rem;
  }
  .cta{
    max-width: 800px;
    margin: auto;
    padding: 0rem 2rem 4rem 2rem;
    text-align: center
  }
  .cta h1{
    font-size: 70px;
    font-weight: 700;
    line-height: 5rem;
    background: -webkit-linear-gradient(.5turn, #969696, #000000);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .cta p{
    padding: 1rem 2rem 1.25rem 2rem;
    font-size: 18px;
    font-weight: 500;
  }
  .cta a{
    padding: .2rem .6rem .2rem 1.2rem;
    border-radius: 10px;
    background: #90e5ff;
    color: #2d2d2d;
    font-weight: 600;
    text-decoration: none;
    width: fit-content;
    margin: auto;
    display: flex;
    gap: 1rem;
    align-items: center;
    justify-content: center;
  }
  .cta a i{
    color: #2d2d2d;
    transition: .3s all ease-in-out
  }
  .cta a:hover{
    background: #ffffff;
  }
  .cta a:hover i{
    color: #3d3d3d;
    transition: .3s all ease-in-out;
    margin-left: .25rem;
  }

  @media screen and (max-width: 800px){
    .container-fluid{
      padding: 0 2rem;
    }
    .cta-wrapper{
      padding: 2rem 1rem;
      max-height: 500px;
      overflow-y: auto; 
    }
    .cta h1{
      font-size: 52px;
      line-height: 4rem;
    }
  }
  @media screen and (max-width: 500px){
    .cta{
      padding: 0;
    }
    .cta h1{
      font-size: 36px;
      line-height: 2.5rem;
    }
    .cta p{
      font-size: 16px;
      padding: 1rem;
    }
    .cta a{

    }
    .table{
      display: none;
    }
  }

  /* categories section*/
  .categories ul{
    list-style: none;
    display: flex;
    gap: 1rem;
    justify-content: center;
    padding: unset;
  }
  .categories ul li button{
    all: unset;
    padding: .5rem 1.5rem;
    background: #86b7fe;
    border-radius: 20px;
    cursor: pointer;
    transition: .3s all ease-in-out;
    border: 1px solid transparent;
  }
  .categories ul li button:hover{
    background: #0dcaf0;
    border: 1px solid #2d2d2d;
  }
  .categories ul li button.active{
    background: #0dcaf0;
    border: 1px solid #2d2d2d;
  }

  .card{
  margin-top:20px;
  }
  .card .btn{
    border-radius:2px;
    text-transform:uppercase;
    font-size:12px;
    padding:7px 20px;
  }
  .card .card-img-block {
    width: 91%;
    margin: 0 auto;
    position: relative;
    top: -20px;
    transition: .3s all ease-in-out;
  }
  .card:hover .card-img-block{
    top: -30px;
  }
  .card .card-img-block img{
    border-radius:5px;
    box-shadow:
      0px 1.4px 2.2px rgba(0, 0, 0, 0.004),
      0px 3.4px 5.4px rgba(0, 0, 0, 0.007),
      0px 6.4px 10.1px rgba(0, 0, 0, 0.011),
      0px 11.4px 18.1px rgba(0, 0, 0, 0.016),
      0px 21.3px 33.8px rgba(0, 0, 0, 0.026),
      0px 51px 81px rgba(0, 0, 0, 0.05)
    ;
  }
  .card h5{
    font-weight:600;
    margin-top: -4px;
  }
  .card p{
    font-size:14px;
    font-weight:300;
  }

  .categories .more{
    text-align: center;
    margin:2rem;
  }
  .categories .more a{
    color: #2d2d2d;
    padding: .75rem 1.5rem;
    border-bottom: 1px solid #2d2d2d;
    border-radius: 5px;
    background: transparent;
    transition: .3s all ease-in-out;
  }
  .categories .more a:hover{
    background: #2d2d2d;
    color: white;
  }

  /* panduan */
  .panduan-section .wrapper{
    position: relative;
    width: 50%;
    box-shadow:
      0px 0.3px 2.2px rgba(0, 0, 0, 0.003),
      0px 0.7px 5.4px rgba(0, 0, 0, 0.005),
      0px 1.3px 10.1px rgba(0, 0, 0, 0.007),
      0px 2.2px 18.1px rgba(0, 0, 0, 0.011),
      0px 4.2px 33.8px rgba(0, 0, 0, 0.021),
      0px 10px 81px rgba(0, 0, 0, 0.05)
    ;
  }
  .panduan-section{
    padding: 0 2rem;
  }
  .panduan-section .container{
    padding: 0;
  }

  @media screen and (max-width: 1100px){
    .panduan-section .wrapper{
      width: 70%;
    }
  }
  @media screen and (max-width: 800px){
    .panduan-section .wrapper{
    width: 100%;
    padding: 1rem;
    }
  }
</style>
@endsection

@section('main-content')
    <section class="cta-wrapper mx-3 mx-sm-4 mx-lg-5" data-aos="fade-up" data-aos-duration="800" data-aos-anchor-placement="center-bottom">
      <div class="cta">
        <h1>Menjelajah Dunia dengan Membaca Buku</h1>
        <p>Temukan buku yang kamu sukai dan gemari. Jelajahi Bacaan Favorit dan buka pintu menuju dunia pengetahuan yang lebih menarik!</p>
        <a href="/books">Mulai Menjelajah<i class="bi bi-arrow-right-square-fill fs-2"></i></a>
      </div>

    </section>

    <section class="categories mb-5">
      <div class="container-fluid pb-4">
          <div class="header mb-4" data-aos="fade-up">
              <p class="fw-light text-center mb-1">KATEGORI</p>
              <h1 class="fw-bold text-center">Ragam Kategori Buku</h1>
          </div>
            <div class="categories-btn" data-aos="fade-up">
              <ul>
                @foreach ($categories as $category)
                <form action="/" method="post">
                  @csrf
                  <input type="hidden" name="selectedCategory" value="{{ $category->id }}">
                  @if ($_POST)
                  <li><button type="submit" id="btn-{{ $category->name }}" class="btn-category {{ ($category->id == $_POST['selectedCategory']) ? 'active' : '' }}" onclick="activateBtn(this)">{{ $category->name }}</button></li>
                  @else
                  <li><button type="submit" id="btn-{{ $category->name }}" class="btn-category" onclick="activateBtn(this)">{{ $category->name }}</button></li>
                  @endif
                </form>
                @endforeach
              </ul>
            </div>

            <div class="content-wrapper" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
              <div id="content-fiksi" class="content row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                @if ($selectedCategory->count() > 0)
                @foreach ($selectedCategory as $book)
                    
                <a href="/books/{{ $book->id }}" class="col-md-4 mt-4 text-decoration-none">
                  <div class="card">
                    <div class="card-img-block">
                      @if($book->cover)
                      <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
                      @else
                      <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
                      @endif
                      </div>
                      <div class="card-body pt-0">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                      </div>
                    </div>
                </a>
                @endforeach
                @else
                <p style="text-align: center; padding: 1rem; color: red">Buku dengan kategori ini sedang kosong</p>
                @endif
              </div>

              <div class="more">
                <a href="/books" class="text-decoration-none">See more</a>
              </div>
            </div>
      </div>
    </section>

    <section class="panduan-section mt-5 mb-5">
        <div class="header mb-4" data-aos="fade-up" >
          <p class="fw-light text-center mb-1">INFORMASI</p>
          <h1 class="fw-bold text-center">Panduan Peminjaman</h1>
        </div>
        <div class="content container mt-3">
                <div class="col-12 d-flex justify-content-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="wrapper rounded p-5">
                        <ol>
                            <li><p>Daftar dengan data pribadi dan login untuk <strong>autentikasi</strong></p></li>
                            <li><p>Cari dan pilih buku, pastikan <strong>ketersediaan</strong> stok buku</p></li>
                            <li>
                                <p>Setelah menyetujui <span class="fw-semibold">Syarat dan Ketentuan</span>, anda akan mendapatkan kode peminjaman <span class="bg-dark text-white badge">XX-XXXXXX</span> berjumlah 8 digit</p>
                            </li>
                            <li><p>Datang ke Perpustakaan SMKN 65 Jakarta lalu berikan kode peminjaman kepada pustakawan</p></li>
                            <li><p>Lakukan kembalikan buku jika sudah selesai membaca <br><span class="text-danger">*</span>Note: Pengembalian yang lewat dari tenggat waktu yang ditentukan akan dikenakan denda</p></li>
                        </ol>
                    </div>
                </div>
        </div>
    </section>
@endsection