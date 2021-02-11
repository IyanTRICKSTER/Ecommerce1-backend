@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>

                    <select name="product_id"
                        @foreach ($product as $product)
                            class="form-control @error('product_id') is-invalid @enderror">
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                            
                    @error('product_id')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" 
                            name="photo"
                            value="{{ old('photo') }}"
                            accept="image/*"
                            class="form-control @error('photo') is-invalid @enderror">
                    
                    @error('photo')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="is_default" class="">Jadikan Foto Default?</label>
                    <br>

                    <div class="form-check form-check-inline">
                        <input name="is_default" class="form-check-input @error('is_default') is-invalid @enderror" type="radio" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Ya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="is_default" class="form-check-input @error('is_default') is-invalid @enderror" type="radio" value="0" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Tidak
                        </label>
                    </div>
                   
                    @error('is_default')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
