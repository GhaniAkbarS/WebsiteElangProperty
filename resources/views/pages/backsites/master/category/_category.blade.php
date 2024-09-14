<div class="row">
  <!-- Column for the Input Form -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" class="form-control" placeholder="Enter title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" class="form-control" placeholder="Enter description" required></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Column for the Table -->
    <div class="col-md-8">
      <div class="card">
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
              <tr>
                <td>1</td>
                <td>Pengaruh Teknologi</td>
                <td>Teknologi telah mengubah cara kita hidup</td>
                <td>2024-09-14</td>
                <td><a href="#">Edit</a></td>
              </tr>
              <!-- Lanjutkan dengan baris tambahan jika diperlukan -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
