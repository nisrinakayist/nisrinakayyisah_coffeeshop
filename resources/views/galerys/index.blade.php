@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                <div class="label">{{ __('Galery') }}</div>

                 <div class="card-body">
                    @if(Auth()->user()?->level == 'admin')
                        @session('success')  
                        <div class="alert alert-success pop" role="alert">{{$value}}</div>
                        @endsession

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Add Picture
                            </button>
                        </div>
                        <br>
                        @section('modal')
                        <form action="{{ route('galerys.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="md-3">
                                <label for="inputImage" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" @error('image') is-invalid @enderror 
                                id="inputImage" placeholder="Masukkan Gambar">
                                @error('image')
                                <div id="inputImage" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <span class="input-text" id="inputToko">Nama Toko</span>
                                <select name="nama_toko" id="inputToko" class="form-control" @error('nama_toko') is-invalid @enderror>
                                    <option> -- Pilih Nama Toko --</option>
                                        @foreach ($toko as $id => $nama)
                                            <option value="{{ $nama }}">{{ $nama }}</option>
                                        @endforeach
                                </select>
                                @error('nama_toko')
                                <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputRating" class="form-label d-block text-white">Rating</label>
                                <div class="star-rating">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="addstar{{ $i }}" name="rating" value="{{ $i }}">
                                        <label for="addstar{{ $i }}" title="{{ $i }} stars">
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                    @endfor
                                </div>

                                <label for="inputReview" class="form-label">Review</label>
                                <input type="text" name="review" class="form-control" @error('review') is-invalid @enderror 
                                id="inputReview" placeholder="Masukkan Review">
                                @error('review')
                                <div id="inputReview" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-menu-add" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-menu-add">Save changes</button>
                            </div>
                        </form>
                        @endsection
                        <div class="container mt-4">
                            <div class="row g-2 g-md-3">
                                @forelse ($galerys as $galery)
                                    <div class="col-6 col-sm-4">
                                        <div class="position-relative">
                                            
                                            <div class="position-relative overflow-hidden ratio ratio-1x1 bg-dark rounded image-container" 
                                                style="cursor: pointer; aspect-ratio: 1/1;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#DetailModal{{ $galery->id }}">
                                                
                                                @if ($galery->image)
                                                    <img src="{{ asset('storage/'.$galery->image) }}" class="w-100 h-100 object-fit-cover img-fluid" alt="Foto Kopi">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white">
                                                        <span style="font-size: 0.8rem;">No cover</span>
                                                    </div>           
                                                @endif
                                                
                                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-overlay"
                                                    style="background: rgba(0,0,0,0.4); transition: 0.3s;">
                                                    <span class="text-white fw-bold fs-6 fs-md-5 d-flex align-items-center gap-1">
                                                        <i class="bi bi-star-fill text-warning"></i> {{ $galery->rating }}
                                                    </span>
                                                </div>       
                                            </div>

                                            <div class="position-absolute" style="top: 8px; end: 8px; z-index: 10;">
                                                <div class="dropdown">
                                                    <button class="btn btn-dark btn-sm bg-opacity-75 border-0 rounded-circle py-1 px-2 text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.75rem;">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" style="font-size: 0.9rem;">
                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditModal{{ $galery->id }}">
                                                                <i class="bi bi-pencil me-2"></i> Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('galerys.destroy',$galery->id) }}" method="POST" class="delete-form"  data-image="{{ asset('storage/'.$galery->image) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="bi bi-trash me-2"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal fade" id="DetailModal{{ $galery->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold text-brown mb-0">
                                                        <i class="bi bi-geo-alt-fill"></i> {{ $galery->nama_toko }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    @if ($galery->image)
                                                        <img src="{{ asset('storage/'.$galery->image) }}" class="w-100 img-fluid rounded mb-3 object-fit-cover" style="max-height: 250px;" alt="Detail Kopi">
                                                    @endif

                                                    <div class="text-warning mb-3 fs-5 d-flex justify-content-center">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $galery->rating)
                                                                <i class="bi bi-star-fill"></i>
                                                            @else
                                                                <i class="bi bi-star text-secondary"></i>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                    <p class="text-dark bg-light p-3 rounded" style="font-size: 1rem; line-height: 1.5;">
                                                        "{{ $galery->review }}"
                                                    </p>

                                                    <hr class="text-muted opacity-25">

                                                    <div class="text-end">
                                                        <small class="text-uppercase text-secondary fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                            Uploaded on: {{ $galery->created_at->format('F d, Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="EditModal{{ $galery->id }}" tabindex="-1" aria-labelledby="EditModalLabel{{ $galery->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLabel{{ $galery->id }}">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('galerys.update', $galery->id ) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="inputImage" class="form-label">Image</label>
                                                            <br>
                                                            @if($galery->image)
                                                                <img src="{{ asset('storage/'.$galery->image) }}" width="120">
                                                            @endif
                                                            <br><br>
                                                            <input type="file" name="image">
                                                            <br><br>

                                                            <span class="input-text" id="inputToko">Nama Toko</span>
                                                            <select name="nama_toko" id="inputToko" class="form-control" @error('nama_toko') is-invalid @enderror>
                                                                <option> -- Pilih Nama Toko --</option>
                                                                @foreach ($toko as $id => $nama)
                                                                    <option value="{{ $nama }}" {{ $galery->nama_toko == $nama ? 'selected' : '' }}>{{ $nama }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('nama_toko')
                                                                <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                                            @enderror

                                                            <label for="inputRating" class="form-label d-block text-white ">Rating</label>
                                                            <div class="star-rating">
                                                                @for($i = 5; $i >= 1; $i--)
                                                                    <input type="radio" id="aditstar{{ $i }}-{{ $galery->id }}" name="rating" value="{{ $i }}" {{ $galery->rating == $i ? 'checked' : '' }}>
                                                                    <label for="aditstar{{ $i }}-{{ $galery->id }}" title="{{ $i }} stars">
                                                                        <i class="bi bi-star-fill"></i>
                                                                    </label>
                                                                @endfor
                                                            </div>

                                                            <label for="inputReview" class="form-label">Review</label>
                                                            <input type="text" name="review" class="form-control" id="inputReview" value="{{ $galery->review }}" @error('review') is-invalid @enderror>
                                                        </div>

                                                        <button type="submit" class="btn btn-menu-add">Update</button>
                                                    </form>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                @empty
                                    <div class="col-12 text-center my-5">
                                        <p class="text-muted fs-5">There are no data in your gallery feed.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                </div> 
                {{ $galerys->links() }}
                    @elseif(Auth()->user()?->level == 'user')
                     <div class="container mt-4">
                            <div class="row g-2 g-md-3">
                                @forelse ($galerys as $galery)
                                    <div class="col-6 col-sm-4">
                                        <div class="position-relative">
                                            
                                            <div class="position-relative overflow-hidden ratio ratio-1x1 bg-dark rounded image-container" 
                                                style="cursor: pointer; aspect-ratio: 1/1;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#DetailModal{{ $galery->id }}">
                                                
                                                @if ($galery->image)
                                                    <img src="{{ asset('storage/'.$galery->image) }}" class="w-100 h-100 object-fit-cover img-fluid" alt="Foto Kopi">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white">
                                                        <span style="font-size: 0.8rem;">No cover</span>
                                                    </div>           
                                                @endif
                                                
                                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-overlay"
                                                    style="background: rgba(0,0,0,0.4); transition: 0.3s;">
                                                    <span class="text-white fw-bold fs-6 fs-md-5 d-flex align-items-center gap-1">
                                                        <i class="bi bi-star-fill text-warning"></i> {{ $galery->rating }}
                                                    </span>
                                                </div>       
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="DetailModal{{ $galery->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold text-brown mb-0">
                                                        <i class="bi bi-geo-alt-fill"></i> {{ $galery->nama_toko }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    @if ($galery->image)
                                                        <img src="{{ asset('storage/'.$galery->image) }}" class="w-100 img-fluid rounded mb-3 object-fit-cover" style="max-height: 250px;" alt="Detail Kopi">
                                                    @endif

                                                    <div class="text-warning mb-3 fs-5 d-flex justify-content-center">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $galery->rating)
                                                                <i class="bi bi-star-fill"></i>
                                                            @else
                                                                <i class="bi bi-star text-secondary"></i>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                    <p class="text-dark bg-light p-3 rounded" style="font-size: 1rem; line-height: 1.5;">
                                                        "{{ $galery->review }}"
                                                    </p>

                                                    <hr class="text-muted opacity-25">

                                                    <div class="text-end">
                                                        <small class="text-uppercase text-secondary fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                            Uploaded on: {{ $galery->created_at->format('F d, Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
 
                                @empty
                                    <div class="col-12 text-center my-5">
                                        <p class="text-muted fs-5">There are no data in your gallery feed.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        {{ $galerys->links() }}
                    @endif
            </div>
        </div>
    </div>
</div>

<style>
     body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/83/ea/49/83ea4988f002a81e18789b188d7f79f9.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    .container {
        width: 100%;
    }

    /* ================= LAYOUT GRID ASLI (CLEAN & OTOMATIS KESAMPING) ================= */
    .layout {
        display: grid;
        /* Otomatis membagi kolom ke samping dengan ukuran stabil minimal 220px */
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 30px;
        justify-items: center;
        align-items: stretch;
        padding: 20px;
    }

    /* ================= CARD STABIL & RAPI ================= */
    .card {
        width: 100% !important;
        max-width: 280px; 
        min-height: 440px;
        border-radius: 18px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        /* height: 100%; */
        position: relative;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        flex: 1;
        padding: 20px;
        height: 100%;
    }

    /* .card-body > *:last-child{
        margin-top: auto;
    } */

    .btn-menu {
        background-color: transparent;
        border: 2px solid #F3E9DC;
        color: #F3E9DC;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .btn-menu:hover {
        background-color: #F3E9DC;
        color: #703B3B;
    }

    .label {
        font-family: 'sans-serif';
        font-weight: bold;
        font-size: 50px;
        text-align: center;
        margin-bottom: 20px;
        word-wrap: break-word;
    }

    .tlabel {
        color: #FFF8F0;
        font-family: sans-serif;
        font-size: 15px;
        line-height: 0.5;
        text-align: center;
    }

    .tom {
        display: flex;
        flex-direction: row;
        gap: 10px;
        justify-content: center;
        margin-top: auto;
        padding: 10px;
        align-items: center;
    }

    .btn-menu-add {
        background-color: #F3E9DC;
        border: 2px solid #F3E9DC;
        color: #703B3B;
        transition: all 0.3s ease;
    }

    .btn-menu-add:hover {
        background-color: #703B3B;
        color: #F3E9DC;
    }

    .pop {
        background-color: #F3E9DC;
    }

    .modal-dialog {
        max-width: 500px;
    }

    .form-control {
        width: 100%;
    }

    .pagination {
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .card-actions {
        display: flex;
        gap: 8px;
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }

    /* ================= FIX DROPDOWN: SAMING-SAMPINGAN & SEMBUNYI AWAL ================= */
    .dropdown-menu {
        /* JANGAN pakai display: flex di sini agar disembunyikan oleh Bootstrap saat awal */
        flex-direction: row !important;   /* Mengunci isi item ke samping */
        gap: 8px;                         /* Jarak antar ikon */
        min-width: auto !important;       
        width: max-content !important;    /* Kotak pas membungkus ikon */
        padding: 6px 8px !important;      
        border-radius: 12px;
        background-color: #ffffff;         
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border: 1px solid rgba(0,0,0,0.1); 
    }

    /* Pemicu dari Bootstrap: Hanya berubah jadi flex kesamping saat diklik (muncul .show) */
    .dropdown-menu.show {
        display: flex !important; 
    }

    .dropdown-item {
        display: flex !important;
        align-items: center;
        justify-content: center;
        padding: 6px !important;           
        width: auto !important;
        background: transparent !important;
        color: #333333;
        border-radius: 6px;
        transition: background 0.2s; 
    }

    .dropdown-item:hover {
        background-color: #f0f0f0 !important;
    }

    .dropdown-item:last-child:hover {
        background-color: #ffe5e5 !important;
        color: #ff4d4d;
    }

    .star-rating{
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 3px;
    }

    .star-rating input{
        display: none;
    }

    .star-rating label{
        font-size: 25px;
        color: #444;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f39c12;
    }

    .text-warning{
        font-size: 16px;
    }

    .pop{
        background-color: #F3E9DC;
    }

    .modal-dialog{
        max-width: 500px;
    }

    .form-control{
        width: 100%;
    }

    .pagination{
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 25px;
    }
   .image-container:hover .hover-overlay {
        opacity: 1 !important;
    }

    /* ================= TABLET ================= */

    @media (max-width: 992px){

        .layout{
            gap: 25px;
        }

        .label{
            font-size: 42px;
        }

        .card{
            width: 11rem !important;
        }
    }

    /* ================= MOBILE ================= */

    @media (max-width: 768px){

       .container {
            padding-left: 20px;
            padding-right: 20px;
        }

        .label {
            font-size: 32px;
            margin-bottom: 25px;
        }

        .layout {
            grid-template-columns: 1fr !important /* Tetap bagi 2 kolom rapi di HP */
            gap: 25px;
            padding: 10px 0;
        }

        .card {
            max-width: 100% !important; /* Biar flexibel mengikuti grid */
            min-height: auto;
        }

        .card-img-top{
            height: 250px;
        }

        .card-body {
            padding: 16px;
        }

        .card-title {
            font-size: 18px;
        }

        .card-text {
            font-size: 14px;
        }

        .tom {
            gap: 10px;
            padding-top: 15px;
            margin-top: auto;
        }

        .btn-menu {
            font-size: 13px;
            padding: 5px 8px;
        }

        .modal-dialog{
            margin: 1rem;
        }

        .star-rating{
            justify-content: center;
        }

        .pagination{
            gap: 5px;
        }
    }

    /* ================= SMALL MOBILE ================= */

    @media (max-width: 480px){

           .label {
            font-size: 25px;
        }

        .layout {
            /* Kunci menjadi 2 kolom ke samping di HP kecil agar tidak turun kebawah tunggal */
            grid-template-columns: 1fr !important; 
            gap: 20px;
            padding: 10px;
        }

        .card{
            max-width: 220px;
        }

        .card-title{
            font-size: 15px;
        }

        .card-text{
            font-size: 13px;
        }

        .btn-menu{
            font-size: 13px;
            padding: 5px 10px;
        }

        .star-rating label{
            font-size: 20px;
        }

        .modal-content{
            padding: 5px;
        }

        .form-label{
            font-size: 14px;
        }

        .form-control{
            font-size: 14px;
        }

        .pagination{
            font-size: 13px;
        }
    }
</style>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const image = form.dataset.image;

            Swal.fire({
                title: 'Delete this photo?',

                imageUrl: image,
                imageWidth: 400,
                imageHeight: 250,
                imageAlt: 'Gallery Image',

                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',

                confirmButtonColor: '#6f4e37',
                cancelButtonColor: '#999',

                background: '#fffaf5',
                color: '#3e2723',

                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                }

            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

    });

});
</script>
@endpush