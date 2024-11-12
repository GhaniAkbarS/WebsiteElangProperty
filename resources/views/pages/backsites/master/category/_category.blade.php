<div class="row">
    <!-- Kolom untuk Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Kategori</h5>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype jika ada file upload -->
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Deskripsi</label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Masukkan deskripsi">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Kolom untuk Tabel -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Kategori</h5>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Blog</th> <!-- Ubah Deskripsi menjadi Jumlah Blog -->
                                <th>Modifikasi</th>
                                <th class="w-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($categories) && $categories->count() > 0)
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->blogs->count() }} </td> <!-- Menampilkan jumlah blog -->
                                    <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <!-- Dropdown untuk Aksi -->
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <!-- Tombol Edit yang membuka modal -->
                                                <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                                        Edit
                                                    </a>
                                                </li>

                                                <!-- Tombol Hapus yang menggunakan konfirmasi sebelum penghapusan -->
                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')){ document.getElementById('delete-form-{{ $category->id }}').submit(); }">
                                                        Hapus
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Form Hapus (disembunyikan) -->
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>

                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Judul</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $category->title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Deskripsi</label>
                                                        <textarea name="content" class="form-control">{{ $category->content }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            @else
                                <tr><td colspan="5">Tidak ada data kategori.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

(@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzZV7zIMU21b1LTAhYa9t6JU4Fea1Sc5mpJHVRjIEiPv" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuNc5JkMmJ3e6z2q49U9lGc7r7z2HgJ3z5MLXKI5gZ8oPkFTE9iG5feTxIjDhBy" crossorigin="anonymous"></script>
@endpush)
