<div class="row">
    <!-- Column for the Form and Table -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <!-- Form Section -->
            <div class="flex-shrink-1 me-3" style="width: 30%;">
              <form  action="{{ route('category.store') }}" method="POST">
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
                      <th>Blog</th>
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
                                <td>{{ $category->content }}</td>
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                <td><a href="#">Edit</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5">Tidak ada data kategori.</td></tr>
                    @endif
                    <!-- Lanjutkan dengan baris tambahan jika diperlukan -->
                </tbody
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
