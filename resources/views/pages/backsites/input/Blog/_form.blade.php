<x-back-app-layout>
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
//ckeditor
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
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
    ga('send', 'pageview');
</script>
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
