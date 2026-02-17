<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Welcome Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h2>
                    <p class="text-gray-600">
                        Email: {{ Auth::user()->email }}
                    </p>
                </div>
            </div>

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('mahasiswa.index') }}" class="block p-6 text-white hover:bg-blue-600">
                        <h3 class="text-lg font-semibold mb-2">Total Mahasiswa</h3>
                        <p class="text-4xl font-bold">{{ $totalMahasiswa }}</p>
                    </a>
                </div>

                <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('matakuliah.index') }}" class="block p-6 text-white hover:bg-green-600">
                        <h3 class="text-lg font-semibold mb-2">Total Mata Kuliah</h3>
                        <p class="text-4xl font-bold">{{ $totalMatakuliah }}</p>
                    </a>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Aksi Cepat</h3>
                    <div class="flex gap-4">
                        <a href="{{ route('mahasiswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Tambah Mahasiswa</a>
                        <a href="{{ route('matakuliah.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Tambah Mata Kuliah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>