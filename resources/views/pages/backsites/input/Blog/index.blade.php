<x-back-app-layout>
    <!-- resources\views\pages\backsites\blog\index.blade.php -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Dilihat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <!-- Nomor Urut -->
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! $blog->title !!}</td> <!-- Gunakan untuk menghindari tag <p> -->
                    <td>{!! $blog->category->title !!}</td> <!-- Gunakan untuk menghindari tag <p> -->
                    <td>{{ $blog->pageview }} kali</td>
                    <td>{{ $blog->status }}</td>
                    <td>
                        <!-- Dropdown Aksi -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $blog->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $blog->id }}">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="openEditModal({{ $blog->id }}, '{!! $blog->title !!}', {!! $blog->category_id !!}, '{{ $blog->status }}')">Edit</a> <!-- Gunakan pada modal edit -->
                                </li>
                                <li>
                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $blog->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="button" onclick="handleAction('delete', {{ $blog->id }})">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Edit Blog -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editBlogForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="blog-id" name="blog_id">
                        <div class="form-group">
                            <label for="modal-title">Judul</label>
                            <input type="text" id="modal-title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-category">Kategori</label>
                            <select name="category_id" id="modal-category" class="form-control">
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal-status">Status</label>
                            <select name="status" id="modal-status" class="form-control">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengisi modal dengan data blog
        function openEditModal(id, title, categoryId, status) {
            // Set value pada form modal
            document.getElementById('blog-id').value = id;
            document.getElementById('modal-title').value = title;
            document.getElementById('modal-category').value = categoryId;
            document.getElementById('modal-status').value = status;

            // Set action URL pada form
            var form = document.getElementById('editBlogForm');
            form.action = `/blog/${id}`; // Sesuaikan dengan route edit Anda

            // Tampilkan modal
            $('#editBlogModal').modal('show');
        }

        // Fungsi untuk menangani aksi hapus
        function handleAction(action, blogId) {
            if (action === 'delete') {
                if (confirm('Apakah Anda yakin ingin menghapus blog ini?')) {
                    document.getElementById(`delete-form-${blogId}`).submit(); // Mengirim form untuk menghapus
                }
            }
        }
    </script>
</x-back-app-layout>
