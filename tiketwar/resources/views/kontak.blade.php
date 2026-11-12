@extends('layouts.main')

@section('title', 'Kontak')

@section('content')
    <a href="{{ route('konser.index') }}" class="btn btn-outline-secondary mb-3">&larr; Kembali kedaftar</a>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title h3">Halaman Kontak</h1>
            <p class="text-muted mb-1">Email : yosep@example.com</p>
            <p class="mb-1">Telepon : 081242942332</p>
        </div>
    </div>
@endsection