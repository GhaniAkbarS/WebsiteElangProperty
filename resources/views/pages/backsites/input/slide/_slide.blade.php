<div class="row">
    <!-- Column for the Form and Table -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <!-- Form Section -->
            <div class="flex-shrink-1 me-3" style="width: 30%;">
                <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Deskripsi</label>
                        <textarea id="content" name="content" class="form-control" placeholder="Masukkan deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link (Opsional)</label>
                        <input type="url" id="link" name="link" class="form-control" placeholder="Masukkan link">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="flex-grow-1">
                <div class="table-responsive">
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
                                        <!-- Tombol Edit untuk membuka modal -->
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $slide->id }}">
                                            Edit
                                        </button>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('slide.destroy', $slide->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
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
                                <tr><td colspan="6">Tidak ada data slide.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
