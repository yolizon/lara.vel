@extends('layouts.base')
@section('title', 'Front Page')

@section('page')
<div class="min-h-screen bg-gray-100 container mx-auto">
    {{-- navbar --}}
    @livewire("web.navigation")
    <div class="flex flex-wrap md:text-left  mt-0 mx-auto">
        @yield('aside')

        <main class=" px-4 w-full lg:w-5/6 md:3/4 text-center">
            {{ $slot }}
        </main>
    </div>
</div>
<x-web.footer></x-web.footer>
@endsection




@push('scripts')

    <script src="{{ asset('js/web.js') }}"></script>
@endpush
