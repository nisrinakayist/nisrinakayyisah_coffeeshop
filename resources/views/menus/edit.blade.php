@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('menus.index') }}" 
                        class="btn btn-primary btn-sm">Back</a>
                    </div>

                    {{-- @section('modal') --}}
                    <form action="{{ route('menus.update', $menu->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputJenis" class="from-label">Jenis Coffee</label>
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

                            {{-- <label for="inputImage" class="from-label">Image</label>
                            <input type="file" name="image" class="form-control" id="inputImage" accept="image/*"
                            @error('image') in-valid @enderror> --}}

                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>

                    </form>

                    {{-- @endsection --}}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
