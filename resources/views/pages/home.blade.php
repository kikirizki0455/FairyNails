@extends('layouts.home')

@section('title', 'Home - Fairy Nails')

@section('content')
    <div class="section max-w-full mx-auto">
        <x-sections.about />
        <x-sections.features />
        <x-sections.gallery />
        <x-sections.product />
        <x-sections.divider />
        <x-sections.testimony />
        <x-sections.location />
    </div>
@endsection

@push('styles')
    {{-- Tambahan CSS khusus halaman home --}}
@endpush

@push('scripts')
    {{-- Tambahan JavaScript khusus halaman home --}}
@endpush
