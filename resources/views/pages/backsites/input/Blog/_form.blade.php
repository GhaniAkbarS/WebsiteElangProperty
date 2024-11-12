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
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Input Title -->
                        <div class="form-group mb-3">
                            <label for="title"  >Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Excerpt -->
                        <div class="form-group mb-3">
                            <label for="excerpt"  >Excerpt</label>
                            <input type="text" id="excerpt" name="excerpt" class="form-control" value="{{ old('excerpt') }}">
                            @error('excerpt')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- input field --}}
                        <div class="form-group mb-3">
                            <label for="content" >Content Blog</label>
                            <textarea name="content" id="editor">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="keyword">Keyword</label>
                            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ old('keyword') }}" data-role="tagsinput">
                            @error('keyword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Input Image -->
                        <div class="form-group mb-3">
                            <label for="image"  >Image Upload</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Input Kategori -->
                        <div class="form-group mb-3">
                            <label for="category_id"  >Kategori</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Status -->
                        <div class="form-group mb-3">
                            <label for="status"  >Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@push("after-script")

<!-- CKeditor -->
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
<!-- Additional JS (If needed) -->
<script src="{{ asset('backsites/js/demo.min.js?1692870487') }}" defer></script>
<script src="./dist/libs/tinymce/tinymce.min.js?1692870487" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{asset('backsites/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backsites/js/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
<script src="{{asset('backsites/js/app.js')}}"></script>
<script src="{{asset('backsites/js/app_bs3.js')}}"></script>
    @endpush
</x-back-app-layout>
