@extends('layouts.app')

@section('content')
<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <!-- Input Title -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>

                    <!-- Input Excerpt -->
                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <input type="text" id="excerpt" name="excerpt" class="form-control">
                    </div>

                    <!-- Input Content -->
                    <div class="form-group">
                        <label for="content">Content Blog</label>
                        <textarea id="content" name="content" class="form-control" rows="10" required></textarea>
                    </div>

                    <!-- Input Keyword -->
                    <div class="form-group">
                        <label for="keyword">Keyword</label>
                        <input type="text" id="keyword" name="keyword" class="form-control">
                    </div>

                    <!-- Input Image -->
                    <div class="form-group">
                        <label for="image">Image Upload</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <!-- Input Kategori -->
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option> <!-- Menggunakan 'title' untuk menampilkan nama kategori -->
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
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
@endsection
