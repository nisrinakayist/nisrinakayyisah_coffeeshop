@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                <div class="label">{{ __('My Whislist Menu') }}</div>

                <div class="card-body">
                    @if(Auth()->user()?->level == 'admin')
                        @session('success')
                        <div class="alert alert-success pop" role="alert">{{$value}}</div>
                        @endsession

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Add menu
                            </button>
                        </div>
                        <br>
                        @section('modal')
                        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="md-3">            
                                <label for="inputJenis" class="form-label">Jenis Coffee</label>
                                <input type="text" name="jenis" class="form-control" @error('jenis') is-invalid @enderror 
                                id="inputJenis" placeholder="Masukkan Jenis">
                                @error('jenis')
                                <div id="inputJenis" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputDescription" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" @error('description') is-invalid @enderror 
                                id="inputDescription" placeholder="Masukkan Description">
                                @error('description')
                                <div id="inputDescription" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputImage" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" @error('image') is-invalid @enderror 
                                id="inputImage" placeholder="Masukkan Gambar">
                                @error('image')
                                <div id="inputImage" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-menu-add" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-menu-add">Save changes</button>
                            </div>
                        </form>
                        @endsection

                        <div class="layout">
                            @forelse ($menus as $menu)
                                <div class="card" style="width: 12rem;">
                                    @if ($menu->image)
                                        <img src="{{ asset('storage/'.$menu->image) }}" height="180" width="100" class="card-img-top">
                                            @else
                                            <span>No cover</span>
                                            @endif
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $menu->jenis }}</h5>
                                        <p class="card-text"> {{ $menu->description }}</p>
                                    </div>
                                    <div class="dropdown card-actions">
                                        <button class="btn btn-menu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                 <a href="{{ route('menus.edit', $menu->id) }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditMenuModal{{ $menu->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                               <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item " type="submit"  onclick="return confirm('Are you sure want to delete this {{ $menu->jenis}}?'); ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form> 
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                                
                                <div class="modal fade" id="EditMenuModal{{ $menu->id }}" tabindex="-1" aria-labelledby="EditTokoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EditMenuModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('menus.update', $menu->id ) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="inputJenis" class="from-label">Menu</label>
                                                        <input type="text" name="jenis" class="form-control" id="inputJenis" value="{{ $menu->jenis }}"
                                                        @error('jenis') in-valid @enderror>

                                                        <label for="inputDescription" class="from-label">Description</label>
                                                        <input type="text" name="description" class="form-control" id="inputDescription" value="{{ $menu->description }}"
                                                        @error('kategori') in-valid @enderror>
                                                        <br>
                                                        @if($menu->image)
                                                        <img src="{{ asset('storage/'.$menu->image) }}" width="120">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <input type="file" name="image">
                                                    </div>
                                                    <button type="submit" class="btn btn-menu-add">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>There are no data</p> 
                            @endforelse
                        </div>
                        {{ $menus->links() }}
                        @elseif(Auth()->user()?->level == 'user')
                            <div class="layout"> 
                                @forelse ($menus as $menu)
                                    <div class="card" style="width: 12rem;">
                                        @if ($menu->image)
                                                    <img src="{{ asset('storage/'.$menu->image) }}" height="180" width="100" class="card-img-top">
                                                    @else
                                                    <span>No cover</span>
                                                    @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $menu->jenis }}</h5>
                                            <p class="card-text"> {{ $menu->description }}</p>
                                        </div>
                                    </div> 
                                @empty
                                    <p>There are no data</p> 
                                @endforelse
                            </div>
                        @endif
                </div>
                {{ $menus->links() }}
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
        max-width: 280px; /* Batas maksimal ukuran card agar tetap proporsional */
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

    /* ================= TABLET RESPONSIVE ================= */
    @media (max-width: 992px) {
        .layout {
            gap: 25px;
        }

        .label {
            font-size: 42px;
        }
    }

    /* ================= MOBILE RESPONSIVE ================= */
    @media (max-width: 768px) {
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
    }

    /* ================= SMALL MOBILE RESPONSIVE ================= */
    @media (max-width: 480px) {
        .label {
            font-size: 25px;
        }

        .layout {
            /* Kunci menjadi 2 kolom ke samping di HP kecil agar tidak turun kebawah tunggal */
            grid-template-columns: 1fr !important; 
            gap: 20px;
            padding: 10px;
        }
    }
</style>

@endsection