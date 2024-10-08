@extends('layouts.main')

@section('main-content')
<div class="container mt-4" style="margin-bottom: 6rem">
  {{-- breadcrumb --}}
  <nav class="my-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
      <li class="breadcrumb-item"><a href="/books" class="text-decoration-none">Koleksi Buku</a></li>
      <li class="breadcrumb-item active" aria-current="page">Title</li>
    </ol>
  </nav>

  {{-- card --}}
  <div class="row">

    <!-- Cover Image -->
    <div class="col-md-3">
      <div class="card shadow mb-4">
          <div class="card-body">
            @if($book->cover)
          <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
          @else
          <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
          @endif
          </div>
      </div>
    </div>

      <!-- Information -->
      <div class="col-md-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Detail Buku</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <table>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Judul : </td>
                    <td>{{$book->title}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penulis : </td>
                    <td>{{$book->author}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penerbit : </td>
                    <td>{{$book->publisher}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Tahun Terbit : </td>
                    <td>{{$book->year}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Kategori : </td>
                    <td>{{$book->category->name}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Deskripsi : </td>
                    <td>{{$book->description}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Stock : </td>
                    <td>{{$book->stock}}</td>
                  </tr>
                </table>
              </div>

              {{-- proses --}}
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Peminjaman</h6>
              </div>
              <div class="card-body">
                @auth
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Pinjam Buku
                </button>
                @else
                <a href="/login" class="btn btn-info" >Pinjam Buku</a>
                @endauth
                {{-- Komentar --}}
              <div class="card mt-4">
               <div class="card-header py-3">
               <h6 class="m-0 fw-bold">Ulasan</h6>
              </div>
              <div class="card-body">
              @foreach($book->comments as $comment)
              <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
               <div>
                 <div class="d-flex justify-content-between align-items-center mb-2">
                  <strong>{{ $comment->user->name }}</strong>
                   <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                  </div>
                <p class="mb-1">{{ $comment->content }}</p>
                 </div>
                @if(auth()->check() && $comment->user_id === auth()->id())
               <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ms-3">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus komentar ini?')">Hapus</button>
               </form>
              @endif
              </div>
             @endforeach

              {{-- Form Tambah Komentar --}}
               <div class="mt-4">
                @auth
                <form action="{{ route('comments.store') }}" method="POST">
                 @csrf
                 <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="mb-3">
                     <label for="content" class="form-label">Tambahkan ulasan</label>
                      <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                       <button type="submit" class="btn btn-primary">ulasan</button>
                    </form>
                   @else
                     <p>Silakan <a href="{{ route('login') }}">login</a> untuk menambahkan ulasan.</p>
                   @endauth
                 </div>
               </div>
              </div>
              </div>
          </div>
      </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="/booking" method="post">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku {{ $book->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="alasan" class="form-label">Alasan Pinjam</label>
            <textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
          </div>
          <div class="mb-3">
            <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="tgl_kembali" name="expired_at">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
          <input type="text" name="book_id" value="{{ $book->id }}" hidden>
          @auth
              <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
              <input type="text" name="status" value="{{ 'Diajukan' }}" hidden>
              <input type="text" name="is_denda" value="{{ 0 }}" hidden>
              <button type="submit" class="btn btn-info">Setuju Pinjam</button>
          @else
              <div class="alert alert-danger">
                  Anda harus <a href="{{ route('login') }}">login</a> terlebih dahulu untuk meminjam buku.
              </div>
          @endauth
      </div>      
      </form>
    </div>
  </div>
</div>
