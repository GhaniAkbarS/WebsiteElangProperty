<x-back-app-layout>
    @push('after-style')

        <!-- CKEditor Styling -->
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
        <style>
            @import url('https://rsms.me/inter/inter.css');

            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }

            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }

            /* CKEditor Styling */
            .ck-editor__editable {
                min-height: 300px;
            }

            /* Table Styling */
            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }

            /* Form Container */
            .form-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: space-between;
            }

            .form-column {
                flex: 1 1 calc(50% - 10px);
            }

            /* Form Group */
            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            /* Form Footer */
            .form-footer {
                margin-top: 20px;
                text-align: right;
            }

            /* Responsif */
            @media (max-width: 768px) {
                .form-column {
                    flex: 1 1 100%;
                }

                .form-footer {
                    text-align: center;
                }
            }

            /* Unisharp */
            .card {
                border: 1px solid #ddd;
                border-radius: 8px;
            }

            .card-header {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .img-thumbnail {
                border: 1px solid #ddd;
                border-radius: 8px;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
            }
        </style>

        <div class="page-wrapper">
            <!-- Page Header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page Pre-title -->
                            <div class="page-pretitle">Input</div>
                            <h2 class="page-title">Akad</h2>
                        </div>

                        <!-- Page Title Actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <!-- Button for Larger Screens -->
                                <a href="{{ route('deal.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                        <path d="M9 12h6" />
                                        <path d="M12 9v6" />
                                    </svg>
                                    Tambah Data Akad
                                </a>

                                <!-- Button for Smaller Screens -->
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modalAdd" aria-label="Tambah Data Akad">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                        <path d="M9 12h6" />
                                        <path d="M12 9v6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Akad Form -->
            <div class="container mt-4">
                @if ($deal)
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Form Edit Akad</h4>
                                    <form action="{{ route('deal.update', $deal->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Edit Title -->
                                        <div class="mb-4">
                                            <label for="title"
                                                class="block text-sm font-medium text-gray-700">Judul</label>
                                            <input type="text" name="title" id="title" value="{{ $deal->title }}"
                                                placeholder="Masukkan judul"
                                                class="mt-1 block w-full p-2 bg-white border border-gray-300 rounded-md">
                                            @error('title')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Input Cabang -->
                                        <div class="form-group mb-3">
                                            <label for="branch_id">Cabang</label>
                                            <select name="branch_id" id="branch_id" class="form-control">
                                                <option value="">Pilih Cabang</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}"
                                                        {{ $deal->branch_id == $branch->id ? 'selected' : '' }}>
                                                        {{ $branch->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('branch_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input ketereangan -->
                                        <div class="form-group">
                                            <label for="content"
                                                class="block text-sm font-medium text-gray-700">Keterangan</label>
                                            <textarea name="content" id="editor">{{ old('content', $deal->content) }}</textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input Keyword (Tag) -->
                                        <div class="form-group mb-3">
                                            <label for="keyword">Keyword (Tag)</label>
                                            <input type="text" name="keyword" id="keyword"
                                                value="{{ old('keyword', $deal->keyword) }}" placeholder="Masukkan keyword"
                                                class="form-control" data-role="tagsinput">
                                            @error('keyword')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Input Jenis Akad -->
                                    <div class="form-group mb-3">
                                        <label for="deal_type">Jenis Akad</label>
                                        <select name="deal_type" id="deal_type" class="form-control">
                                            <option value="">Pilih Jenis Akad</option>
                                            @foreach ($dealTypes as $dealType)
                                                <option value="{{ $dealType }}"
                                                    {{ $deal->deal_type == $dealType ? 'selected' : '' }}>
                                                    {{ $dealType }}</option>
                                            @endforeach
                                        </select>
                                        @error('deal_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Merek Mobil -->
                                    <div id="carBrandInput" class="form-group"
                                        style="{{ $deal->car_brand ? '' : 'display: none;' }}">
                                        <label for="car_brand">Merek Mobil</label>
                                        <select name="car_brand" id="car_brand" class="form-control">
                                            <option value="">Pilih Merek Mobil</option>
                                            @foreach ($carBrands as $carBrand)
                                                <option value="{{ $carBrand->title }}"
                                                    {{ $deal->car_brand == $carBrand->title ? 'selected' : '' }}>
                                                    {{ $carBrand->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('car_brand')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Jenis Mobil -->
                                    <div id="carTypeInput" class="form-group"
                                        style="{{ $deal->car_type ? '' : 'display: none;' }}">
                                        <label for="car_type">Jenis Mobil</label>
                                        <input type="text" name="car_type" id="car_type"
                                            value="{{ old('car_type', $deal->car_type) }}"
                                            placeholder="Masukkan jenis mobil" class="form-control">
                                        @error('car_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Tanggal Akad -->
                                    <div class="form-group mb-3">
                                        <label for="deal_date">Tanggal Akad</label>
                                        <input type="date" name="deal_date" id="deal_date"
                                            value="{{ old('deal_date', $deal->deal_date) }}" class="form-control">
                                        @error('deal_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Thumbnail (Gambar)</label>

                                        {{-- Input file untuk mengganti gambar --}}
                                        <input type="file" name="image" id="image" class="form-control mb-2">

                                        {{-- Tampilkan gambar yang ada jika sudah ada sebelumnya --}}
                                        @if ($deal->image)
                                            <div>
                                                <p>Thumbnail saat ini:</p>
                                                <img src="{{ asset('storage/' . $deal->image) }}" alt="Thumbnail"
                                                    style="width: 100px; height: auto; margin-top: 10px;">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center text-danger">Data tidak tersedia.</p>
                @endif

                <div class="container mt-4">
                    <div class="row">
                        <!-- Kolom 1: Form Upload -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Unggah Foto Akad</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('deal.photo.upload', $deal->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- Input Foto Akad -->
                                        <div class="input-group mb-3">
                                            <input id="deal_photo" class="form-control" type="file" name="photo"
                                                accept="image/*" required>
                                            <button type="button" id="previewButton" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> Preview
                                            </button>
                                        </div>

                                        <!-- Preview Foto -->
                                        <div id="holder" style="margin-top:15px; max-height:150px;">
                                            <img id="previewImage" class="img-thumbnail d-none"
                                                style="max-height: 150px; object-fit: cover;">
                                        </div>

                                        <!-- Tombol Unggah -->
                                        <button type="submit" class="btn btn-primary w-100 mt-3">Unggah</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom 2: Daftar Foto Akad -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Daftar Foto Akad</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @forelse($deal->photos as $photo)
                                            <div class="col-6 mb-3">
                                                <img src="{{ asset('storage/' . $photo->image) }}" alt="Foto Akad"
                                                    class="img-thumbnail"
                                                    style="max-height: 150px; max-width: 100%; object-fit: cover;">
                                                <form action="{{ route('deal.photo.destroy', [$deal->id, $photo->id]) }}"
                                                    method="POST" class="mt-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm w-100">Hapus</button>
                                                </form>
                                            </div>
                                        @empty
                                            <p class="text-center">Tidak ada foto yang diunggah.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>

        @push('after-script')
            <!-- Untuk unisharp -->
            <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                // JavaScript untuk Menampilkan/Menyembunyikan Input Berdasarkan Jenis Akad
                document.addEventListener('DOMContentLoaded', function() {
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
            <!-- JS Buat Keterangan -->
            <script type="importmap">
                {
                    "imports": {
                        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
                        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
                    }
                }
            </script>
            <script type="module">
                import {
                    ClassicEditor,
                    Essentials,
                    Bold,
                    Italic,
                    Font,
                    Paragraph
                } from 'ckeditor5';
                ClassicEditor
                    .create( document.querySelector( '#editor' ), {
                        plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                        toolbar: [
                            'undo', 'redo', '|', 'bold', 'italic', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                        ]
                    } )
                    .then( /* ... */ )
                    .catch( /* ... */ );
            </script>
        @endpush
    </x-back-app-layout>
