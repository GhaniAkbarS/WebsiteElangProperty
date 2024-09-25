<div class="row">
    <!-- Form Section (Col 1 - Kiri) -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Deskripsi</label>
                        <textarea id="content" name="content" class="form-control" placeholder="Masukkan deskripsi" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link (Opsional)</label>
                        <input type="url" id="link" name="link" class="form-control" placeholder="Masukkan link" value="{{ old('link') }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Table Section (Col 2 - Kanan) -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Slide</h5>
                <table class="table table-vcenter card-table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Link</th>
                            <th class="w-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($slides) && $slides->count() > 0)
                            @foreach ($slides as $slide)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $slide->title }}</td>
                                <td>{{ $slide->content }}</td>
                                <td>
                                    @if($slide->image)
                                        <img src="{{ asset('storage/' . $slide->image) }}" alt="Image" style="width: 100px; height: auto;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $slide->link ?? 'No Link' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $slide->id }}">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')){ document.getElementById('delete-form-{{ $slide->id }}').submit(); }">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Form Hapus -->
                                    <form id="delete-form-{{ $slide->id }}" action="{{ route('slide.destroy', $slide->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $slide->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $slide->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $slide->id }}">Edit Slide</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Judul</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $slide->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="content" class="form-label">Deskripsi</label>
                                                    <textarea name="content" class="form-control" required>{{ $slide->content }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <input type="file" name="image" class="form-control">
                                                    @if($slide->image)
                                                        <img src="{{ asset('storage/' . $slide->image) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="link" class="form-label">Link</label>
                                                    <input type="url" name="link" class="form-control" value="{{ $slide->link }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data slide.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
