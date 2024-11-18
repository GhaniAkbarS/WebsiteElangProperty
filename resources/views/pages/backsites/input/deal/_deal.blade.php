<x-back-app-layout>
    @push('after-style')
    <!-- Google Fonts -->
<style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>

  <!-- CKEditor Styling -->
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
  <style>
    /* Mengatur tinggi editor CKEditor */
    .ck-editor__editable {
        min-height: 300px;
    }
  </style>
    <!-- Table Styling -->
<style>
    /* Mengatur batas tabel */
    .table-bordered {
        border: 1px solid #dee2e6;
    }

    /* Mengatur batas untuk sel tabel */
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
  </style>

  <!-- Form Layout Styling -->
  <style>
    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .form-group {
        flex: 1 1 calc(50% - 20px); /* Membuat form-group mengambil 50% lebar dengan jarak antar item */
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-group input[type="file"] {
        padding: 5px;
    }

    /* Agar tampilan tetap responsif pada layar kecil */
    @media (max-width: 768px) {
        .form-group {
            flex: 1 1 100%; /* Membuat elemen form mengambil seluruh lebar layar pada ukuran kecil */
        }
    }
</style>
    @endpush
    <div class="page-wrapper">
        <!-- Page Header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Input</div>
                        <h2 class="page-title">Akad</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="container-xl">
            <form action="{{ route('deal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-container mt-4">
                    <!-- Input Cabang -->
                    <div class="form-group">
                        <label for="branch_id" class="block text-sm font-medium text-gray-700">Cabang</label>
                        <select name="branch_id" id="branch_id" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                            <option value="">Pilih Cabang</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                            @endforeach
                        </select>
                        @error('branch_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Tanggal Akad -->
                    <div class="form-group">
                        <label for="deal_date" class="block text-sm font-medium text-gray-700">Tanggal Akad</label>
                        <input type="date" name="deal_date" id="deal_date" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                        @error('deal_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Jenis Akad -->
                    <div class="form-group">
                        <label for="deal_type" class="block text-sm font-medium text-gray-700">Jenis Akad</label>
                        <select name="deal_type" id="deal_type" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                            <option value="">Pilih Jenis Akad</option>
                            @foreach($dealTypes as $dealType)
                                <option value="{{ $dealType }}">{{ $dealType }}</option>
                            @endforeach
                        </select>
                        @error('deal_type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Thumbnail (Gambar) -->
                    <div class="form-group">
                        <label for="image" class="block text-sm font-medium text-gray-700">Thumbnail (Gambar)</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Merek Mobil -->
                    <div id="carBrandInput" class="form-group" style="display: none;">
                        <label for="car_brand" class="block text-sm font-medium text-gray-700">Merek Mobil</label>
                        <select name="car_brand" id="car_brand" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                            <option value="">Pilih Merek Mobil</option>
                            @foreach($carBrands as $carBrand)
                                <option value="{{ $carBrand->title }}">{{ $carBrand->title }}</option>
                            @endforeach
                        </select>
                        @error('car_brand')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Jenis Mobil -->
                    <div id="carTypeInput" class="form-group" style="display: none;">
                        <label for="car_type" class="block text-sm font-medium text-gray-700">Jenis Mobil</label>
                        <input type="text" name="car_type" id="car_type" placeholder="Masukkan jenis mobil" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                        @error('car_type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Keyword (Tag) -->
                    <div class="mb-4">
                        <label for="keyword" class="block text-sm font-medium text-gray-700">Keyword (Tag)</label>
                        <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md" data-role="tagsinput">
                        @error('keyword')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @push("after-script")
    //Deal input

    <!-- JavaScript untuk Menampilkan/Menyembunyikan Input Berdasarkan Jenis Akad -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const dealType = document.getElementById('deal_type');
                const carBrandInput = document.getElementById('carBrandInput');
                const carTypeInput = document.getElementById('carTypeInput');

                function toggleCarFields() {
                    const selectedType = dealType.value;
                    if (selectedType === 'Mobil Bekas' || selectedType === 'Mobil Baru') {
                        carBrandInput.style.display = 'block';
                        carTypeInput.style.display = 'block';
                    } else {
                        carBrandInput.style.display = 'none';
                        carTypeInput.style.display = 'none';
                    }
                }

                // Jalankan fungsi ketika jenis akad berubah
                dealType.addEventListener('change', toggleCarFields);

                // Panggil fungsi saat halaman pertama kali dimuat
                toggleCarFields();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-back-app-layout>
