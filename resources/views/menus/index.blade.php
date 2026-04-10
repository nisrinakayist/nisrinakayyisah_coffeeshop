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
                    <div class="alert alert-success" role="alert">{{$value}}</div>
                    @endsession

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            + Add menu
                        </button>
                    </div>
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

                        <div class="card" style="width: 9rem;">
                            @if ($menu->image)
                                    <img src="{{ asset('storage/'.$menu->image) }}" height="130" width="100" class="card-img-top">
                                    @else
                                    <span>No cover</span>
                                    @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->jenis }}</h5>
                                <p class="card-text"> {{ $menu->description }}</p>
                            </div>
                        </div> 
                        <div class="tom">
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#EditMenuModal{{ $menu->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                            </a>
                            <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-menu" onclick="return confirm('Are you sure want to delete this {{ $menu->jenis}}?'); ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </form>
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
                </div> 
                    {{ $menus->links() }}
                @elseif(Auth()->user()?->level == 'user')
                <div class="layout">
                       
                    @forelse ($menus as $menu)

                    <div class="card" style="width: 9rem;">
                        @if ($menu->image)
                                    <img src="{{ asset('storage/'.$menu->image) }}" height="130" width="100" class="card-img-top">
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

<style>
     body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/83/ea/49/83ea4988f002a81e18789b188d7f79f9.jpg');
            background-size: cover;
            background-positon: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
        }
        .layout{
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            /* flex: 0 0 auto;
            overflow: hidden;
            text-overflow: ellipsis;
            object-fit: cover; */

        }
        .btn-menu{
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
        .tlabel{
            color: #FFF8F0;
            font-family: sans-serif;
            font-size: 15px;
            line-height: 0.5;
            text-align: center;
            /* margin: 20px; */
        }
        /* .t3{
            background: none;
            border: none;
            color: #FFF8F0;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;

        } */
        /* .dropdown-item{
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        } */
        .tom{
            display: flex;
            flex-direction: column;
            gap: 5px;
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
</style>

@endsection