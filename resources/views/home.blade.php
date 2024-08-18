@extends('layouts.app')
@section('Pesanan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-12 mb-5">
                <img src="{{ url('images/logopena.png')}}" alt="" class="rounded mx-auto d-block" width="200">
                <iframe src="https://giphy.com/embed/jt7bAtEijhurm" width="100%" height="50%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                <div style="width:50%;height:0;padding-bottom:50%;position:relative;"></div>
            </div>
            @foreach($barangs as $barang)
            <div class="col-md-10 mb-2">
             <div class="card">
                <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                        <strong>Stok :</strong> {{ $barang->stok }} <br>
                        <hr>
                        <strong>Keterangan :</strong> <br>
                        {{ $barang->keterangan }}
                    </p>
                    <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
