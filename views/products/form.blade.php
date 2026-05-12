@extends('template')

@section('title', $title . ' Produk')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h2>{{ $title }} Produk</h2>

            <form method="POST"
                  action="{{ $route }}"
                  class="card p-4 shadow">

                @csrf

                @if($method === 'PUT')
                    @method('PUT')
                @endif

                <div class="mb-3">

                    <label class="form-label">Nama</label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $product->name) }}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}">

                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-secondary text-white">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection