@extends('layouts.public')

@section('title', 'Beranda - Blog Kami')

@push('styles')
<style>
    .card-artikel {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.04);
        margin-bottom: 2rem;
        background-color: #fff;
    }
    .card-img-top {
        height: 240px;
        object-fit: cover;
    }
    .kategori-badge {
        background-color: #e3f2fd;
        color: #1565c0;
        font-weight: 500;
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 10px;
    }
    .artikel-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        text-decoration: none;
    }
    .artikel-title:hover {
        color: #1565c0;
    }
    .author-info {
        font-size: 0.8rem;
        color: #7f8c8d;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
    }
    .author-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: #1565c0;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.7rem;
    }
    .btn-readmore {
        background-color: #27ae60;
        color: white;
        border-radius: 20px;
        padding: 6px 16px;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        transition: background-color 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-readmore:hover {
        background-color: #219653;
        color: white;
    }
    
    .widget-kategori {
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
    }
    .kategori-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        color: #555;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 5px;
        transition: background-color 0.2s;
        font-size: 0.9rem;
    }
    .kategori-item:hover {
        background-color: #f8f9fa;
        color: #2c3e50;
    }
    .kategori-item.active {
        background-color: #e8f5e9;
        color: #27ae60;
        font-weight: 600;
    }
    .badge-count {
        background-color: #e9ecef;
        color: #6c757d;
        border-radius: 10px;
        padding: 3px 8px;
        font-size: 0.75rem;
    }
    .kategori-item.active .badge-count {
        background-color: #27ae60;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-8">
        @forelse($artikel as $item)
        <div class="card card-artikel">
            <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
            <div class="card-body p-4">
                <span class="kategori-badge">{{ $item->kategori->nama_kategori }}</span>
                <h3 class="mb-0">
                    <a href="{{ route('public.show', $item->id) }}" class="artikel-title">{{ $item->judul }}</a>
                </h3>
                
                <div class="author-info">
                    <div class="author-avatar">
                        {{ strtoupper(substr($item->penulis->nama_depan, 0, 1)) }}
                    </div>
                    <span>{{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }} &bull; {{ $item->hari_tanggal }}</span>
                </div>
                
                <p class="card-text text-muted" style="font-size: 0.95rem; line-height: 1.6;">
                    {{ Str::limit(strip_tags($item->isi), 150) }}
                </p>
                
                <a href="{{ route('public.show', $item->id) }}" class="btn-readmore mt-2">Baca Selengkapnya &rarr;</a>
            </div>
        </div>
        @empty
        <div class="alert alert-info border-0 shadow-sm" style="border-radius: 12px;">
            Belum ada artikel yang dipublikasikan.
        </div>
        @endforelse

        @if($artikel->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $artikel->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
    
    <div class="col-md-4">
        <div class="widget-kategori">
            <h5 class="widget-title">Kategori Artikel</h5>
            
            <a href="{{ route('public.index') }}" class="kategori-item {{ empty($kategori_id) ? 'active' : '' }}">
                <span>Semua Artikel</span>
                <span class="badge-count">{{ $totalArtikel }}</span>
            </a>
            
            @foreach($semuaKategori as $kat)
            <a href="{{ route('public.index', ['kategori' => $kat->id]) }}" class="kategori-item {{ $kategori_id == $kat->id ? 'active' : '' }}">
                <span>{{ $kat->nama_kategori }}</span>
                <span class="badge-count">{{ $kat->artikel_count }}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
