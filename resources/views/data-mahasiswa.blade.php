@props(['isEdit' => false])

<x-layout>
    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">CRUD</span>
        Data
        Mahasiswa
    </h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
        Untuk memenuhi tugas E-Learning Pertemuan 12 Mata Kuliah Web Programming 2
    </p>

    {{-- Form --}}
    @if ($isEdit)
        <form action="/{{ $emhs['id'] }}" method="POST" class="py-10">
            @csrf
            @method('PUT')
        @else
            <form action="/" method="POST" class="py-10">
                @csrf
    @endif
    <h2 class="text-4xl font-extrabold dark:text-white mb-5">{{ $isEdit ? 'Perbarui Data' : 'Tambah Data' }}</h2>
    <div class="mb-6 mx-4">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="nama"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="nama" autocomplete="off" required value="{{ $isEdit ? $emhs['nama'] : '' }}">
    </div>
    <div class="mb-6 mx-4">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
        <input type="number" id="default-input"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="nim" autocomplete="off" required value="{{ $isEdit ? $emhs['nim'] : '' }}">
    </div>
    <div class="mb-6 mx-4">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
        <input type="text" id="default-input"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="kelas" autocomplete="off" required value="{{ $isEdit ? $emhs['kelas'] : '' }}">
    </div>
    @if ($isEdit)
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg ms-4 text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Perbarui</button>
        <button type="button" onclick="location.href = '/'"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 cursor-pointer">Batal</button>
    @else
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg ms-4 text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Tambahkan</button>
    @endif
    </form>


    <h2 class="text-4xl font-extrabold dark:text-white mb-5">Data mahasiswa</h2>
    {{-- Search --}}
    <form class="max-w-md mx-auto mb-5 self-end">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari nama" name="search" autofocus autocomplete="off" />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Cari</button>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-40 mx-4">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $mhs['nama'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $mhs['nim'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $mhs['kelas'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/{{ $mhs['id'] }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline me-5">Edit</a>
                            <form action="/{{ $mhs['id'] }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
