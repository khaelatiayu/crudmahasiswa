<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <strong>Error:</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('matakuliah.update', $matakuliah->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="kode_mk" class="block text-sm font-medium text-gray-700">Kode Mata Kuliah</label>
                            <input type="text" name="kode_mk" id="kode_mk" 
                                value="{{ old('kode_mk', $matakuliah->kode_mk) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="nama_mk" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                            <input type="text" name="nama_mk" id="nama_mk" 
                                value="{{ old('nama_mk', $matakuliah->nama_mk) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                            <input type="number" name="sks" id="sks" 
                                value="{{ old('sks', $matakuliah->sks) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                required min="1" max="6">
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                            <a href="{{ route('matakuliah.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>