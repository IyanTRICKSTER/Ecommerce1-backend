@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaksi</strong> {{ $data->uuid }}
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transaction.update', $data->id ) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" 
                            name="name" value="{{ old('name') ? old('name') : $data->name }}"
                            class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="text" 
                            name="email" value="{{ old('email') ? old('email') : $data->email }}"
                            class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-control-label">Telpon</label>
                    <input type="text" 
                            name="phone" value="{{ old('phone') ? old('phone') : $data->phone }}"
                            class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="form-control-label">Alamat Pemesan</label>
                    <input type="text" 
                            name="address" value="{{ old('address') ? old('address') : $data->address }}"
                            class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection