@extends('layouts.base')

@section('title', 'Admin Dashboard')

@section('page')
    <div class="flex min-h-screen">
        <livewire:admin.sidebar/>
        <div class="flex flex-col w-full">
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                    </div>
                </header>
                <main>
                    {{ $slot }}
                </main>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush