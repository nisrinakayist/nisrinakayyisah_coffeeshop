@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                <div class="label">{{ __('Place To Go') }}</div>

                <div>
                    @if(Auth()->user()?->level == 'admin')
                        @session('success')
                        <div class="alert alert-success" role="alert">{{$value}}</div>
                        @endsession

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Add location
                            </button>
                        </div>
                        <br>
                        @section('modal')
                        <form action="{{ route('tokos.store') }}" method="POST" >
                            @csrf
                                <div class="md-3">
                                    <label for="inputToko" class="form-label">Nama Toko </label>
                                    <input type="text" name="nama_toko" class="form-control" @error('nama_toko') is-invalid @enderror 
                                    id="inpuToko" placeholder="Masukkan Nama Toko">
                                    @error('nama_toko')
                                    <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="inputLokasi" class="form-label">Lokasi</label>
                                    <input type="url" name="lokasi" class="form-control" @error('lokasi') is-invalid @enderror 
                                    id="inputLokasi" placeholder="https://xxxx.xom">
                                    @error('lokasi')
                                    <div id="inputLokasi" class="form-text text-danger">{{ $message }}</div>
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
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-menu-add" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-menu-add">Save</button>
                                </div>
                        </form>
                        @endsection
                        <div class="table-responsive">
                        <table class=" table ctable">
                            @php
                            $i=1;
                            @endphp
                            <tbody>
                                @forelse ($tokos as $toko)
                        
                                <div class="row align-items-center py-2 border-bottom border-secondary">
                                    <div class="col-1 text-secondary"><i class="bi bi-geo-alt-fill" style="font-size:3rem;"></i></div>
                                    <div class="col-3">
                                        <span class="d-block fw-bold">{{ $toko->nama_toko }}</span>
                                        <small class="text-muted">
                                        <a href="{{ $toko->lokasi }}" target="_blank" class="btn btn-menu">location</a>
                                        </small>
                                    </div>
                                    <div class="col-3 text">
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $toko-> rating)
                                                    <i class="bi bi-star-fill"></i> 
                                                @else
                                                    <i class="bi bi-star text-secondary"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-1 text-secondary">
                                        
                                            <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#EditTokoModal{{ $toko->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="col-1 text-secondary">
                                            <form action="{{ route('tokos.destroy',$toko->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-menu" onclick="return confirm('Are you sure want to delete this {{ $toko->nama_toko}}?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="EditTokoModal{{ $toko->id }}" tabindex="-1" aria-labelledby="EditTokoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditTokoModalLabel">Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('tokos.update', $toko->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="inputToko" class="from-label">Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control" id="inputToko" value="{{ $toko->nama_toko }}"
                                @error('nama_toko') in-valid @enderror>

                                <label for="inputLokasi" class="from-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="inputLokasi" value="{{ $toko->lokasi }}"
                                @error('lokasi') in-valid @enderror>

                                <label for="inputRating" class="form-label d-block text-white">Rating</label>
                                    <div class="star-rating">
                                        @for($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="aditstar{{ $i }}-{{ $toko->id }}" name="rating" value="{{ $i }}" {{ $toko->rating == $i ? 'checked' : '' }}>
                                            <label for="aditstar{{ $i }}-{{ $toko->id }}" title="{{ $i }} stars">
                                                <i class="bi bi-star-fill"></i>
                                            </label>
                                        @endfor
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-menu-add">Update</button>
                        </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                                @empty
                                <td colspan="5">There are no data</td> 

                                @endforelse
                            </tbody>

                        </table>
                        </div>
                        {{ $tokos->links() }}
                    @elseif(Auth()->user()?->level == 'user')
                    <div class="table-responsive">
                        <table class=" table ctable">
                            @php
                            $i=1;
                            @endphp
                            <tbody>
                                @forelse ($tokos as $toko)
                                <tr>
                                    <th scope="row" class="ctable-td"><i class="bi bi-geo-alt-fill" style="font-size:3rem;"></i></td>
                                    <td class="ctable-td">{{ $toko->nama_toko }}</td>
                                    <td class="ctable-td ">
                                        <a href="{{ $toko->lokasi }}" target="_blank" class="btn btn-menu">location</a>
                                    </td>
                                    <td>
                                        <div class="text-waaring">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $toko-> rating)
                                                    <i class="bi bi-star-fill"></i> 
                                                @else
                                                    <i class="bi bi-star text-secondary"></i>
                                                @endif
                                            @endfor
                                            <span class="ms-1 text-white">({{ $toko->rating }})</span>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5">There are no data</td> 

                                @endforelse
                            </tbody>

                        </table>
                        </div>
                        {{ $tokos->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/83/ea/49/83ea4988f002a81e18789b188d7f79f9.jpg');
            background-size: cover;
            background-positon: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
        }
    .btn-menu {
            background-color: transparent;
            border: 2px solid #F3E9DC;
            color: #F3E9DC;
        }
    .btn-menu:hover{
            background-color: #F3E9DC;
            color: #703B3B;
        }
    .label{
            font-family: 'sans-serif';
            font-weight: bold;
            font-size: 50px;
            text-align: center;
         }
    .ctable{
        background-color: transparent !important;
        /* padding-top: 5rem; */
        /* padding-bottom: 10rem;
        border-collapse: separate;
        border-spacing: 80px 15px; 
         border: none;*/
        font-weight: bold;
        font-size: 20px;
    } 
    .ctable td{
        /* border: none;
        font-weight: bold;
        font-size: 20px; */
        /* padding-top: 30px;
        padding-bottom: 15px;
        padding-left: 10px;
        padding-right: 10px; */
    }
    .text{
        color: #F3E9DC;
        font-size: 25px;
    }
    .btn-menu-add{
            background-color: #F3E9DC;
            border: 2px solid #F3E9DC;
            color: #703B3B;
        }
     .btn-menu-add:hover{
            background-color: #703B3B;
            color: #F3E9DC;
        }
   
    .star-rating{
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
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
</style>


@endsection