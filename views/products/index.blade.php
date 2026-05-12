@extends('template')

@section('title', 'Daftar Produk')

@section('content')

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h2>Daftar Produk</h2>

                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        Tambah Produk
                    </a>

                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">

                    <span class="badge bg-dark">
                        Total Produk: {{ count($products) }}
                    </span>

                </div>

                <table class="table table-bordered table-hover shadow-sm">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Dibuat</th>
                            <th width="200">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php $no = 1; @endphp

                        @forelse($products as $product)

                            <tr>

                                <td>{{ $no++ }}</td>

                                <td>

                                    <strong>
                                        {{ $product->name }}
                                    </strong>

                                    <div style="margin-top:10px;">

                                        @foreach ($product->variants as $variant)
                                            <div
                                                style="
            background:#6c757d;
            color:white;
            display:inline-block;
            padding:5px 10px;
            border-radius:5px;
            margin-right:5px;
        ">

                                                {{ $variant->name }}

                                            </div>
                                        @endforeach

                                    </div>

                                </td>

                                <td>

                                    Rp {{ number_format($product->price, 0, ',', '.') }}

                                </td>

                                <td>

                                    {{ $product->created_at->format('d M Y') }}

                                </td>

                                <td>

                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display:inline" onsubmit="return confirm('Yakin hapus?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    Belum ada produk ditambahkan

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
