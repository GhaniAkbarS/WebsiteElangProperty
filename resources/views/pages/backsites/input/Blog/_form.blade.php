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
                            <label for="content"  >Content Blog</label>
                            <textarea name="content" id="editor">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Input Keyword -->
                        <div class="form-group mb-3">
                            <label for="keyword"  >Keyword</label>
                            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ old('keyword') }}">
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
</x-back-app-layout>
