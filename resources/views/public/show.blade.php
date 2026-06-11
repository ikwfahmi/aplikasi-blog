@extends('layouts.public')

@section('title', $artikel->judul . ' - Blog Kami')

@push('styles')
<style>
    .breadcrumb-custom {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-bottom: 1.5rem;
    }
    .breadcrumb-custom a {
        color: #27ae60;
        text-decoration: none;
    }
    .breadcrumb-custom a:hover {
        text-decoration: underline;
    }
    .article-header {
        margin-bottom: 2rem;
    }
    .article-cover {
        width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .kategori-badge {
        background-color: #e3f2fd;
        color: #1565c0;
        font-weight: 500;
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 15px;
    }
    .article-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .author-info {
        display: flex;
        align-items: center;
        gap: 12px;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        margin-bottom: 2rem;
    }
    .author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #1565c0;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1rem;
    }
    .author-details {
        display: flex;
        flex-direction: column;
    }
    .author-name {
        font-weight: 600;
        font-size: 0.95rem;
        color: #2c3e50;
    }
    .article-date {
        font-size: 0.8rem;
        color: #7f8c8d;
    }
    .article-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #444;
        background-color: #fff;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.04);
    }
    
    .widget-terkait {
        background-color: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.04);
    }
    .widget-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1.2rem;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }
    .terkait-item {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        text-decoration: none;
    }
    .terkait-item:last-child {
        margin-bottom: 0;
    }
    .terkait-img {
        width: 70px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
    }
    .terkait-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .terkait-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2c3e50;
        line-height: 1.3;
        margin-bottom: 4px;
        transition: color 0.2s;
    }
    .terkait-item:hover .terkait-title {
        color: #27ae60;
    }
    .terkait-date {
        font-size: 0.75rem;
        color: #95a5a6;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="breadcrumb-custom">
            <a href="{{ route('public.index') }}">Beranda</a> / 
            <a href="{{ route('public.index', ['kategori' => $artikel->id_kategori]) }}">{{ $artikel->kategori->nama_kategori }}</a> / 
            <span class="text-muted">{{ Str::limit($artikel->judul, 40) }}</span>
        </div>
        
        <div class="article-header">
            <span class="kategori-badge">{{ $artikel->kategori->nama_kategori }}</span>
            <h1 class="article-title">{{ $artikel->judul }}</h1>
            
            <div class="author-info">
                <div class="author-avatar">
                    {{ strtoupper(substr($artikel->penulis->nama_depan, 0, 1)) }}
                </div>
                <div class="author-details">
                    <span class="author-name">{{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}</span>
                    <span class="article-date">{{ $artikel->hari_tanggal }}</span>
                </div>
            </div>
            
            <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" class="article-cover" alt="{{ $artikel->judul }}">
        </div>
        
        <div class="article-content">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
        
        <div class="mt-4">
            <a href="{{ route('public.index') }}" class="btn btn-outline-success" style="border-radius: 20px; padding: 8px 20px; font-weight: 500;">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="widget-terkait mt-4 mt-md-0">
            <h5 class="widget-title">Artikel Terkait</h5>
            
            @forelse($artikelTerkait as $terkait)
            <a href="{{ route('public.show', $terkait->id) }}" class="terkait-item">
                <img src="{{ asset('storage/gambar/' . $terkait->gambar) }}" class="terkait-img" alt="{{ $terkait->judul }}">
                <div class="terkait-info">
                    <span class="terkait-title">{{ Str::limit($terkait->judul, 45) }}</span>
                    <span class="terkait-date">{{ \Illuminate\Support\Str::limit($terkait->hari_tanggal, 20) }}</span>
                </div>
            </a>
            @empty
            <div class="text-muted small">Belum ada artikel terkait di kategori ini.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
