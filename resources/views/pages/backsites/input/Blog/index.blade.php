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
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->title }}</td>
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
                                    <a class="dropdown-item" href="#" onclick="handleAction('edit', {{ $blog->id }})">Edit</a>
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

                <!-- Form Edit -->
                <tr id="edit-form-{{ $blog->id }}" style="display: none;">
                    <td colspan="6">
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control">
                                    @foreach (App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="publish" {{ $blog->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                    <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" onclick="toggleEditForm({{ $blog->id }})">Batal</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function handleAction(action, blogId) {
            if (action === 'edit') {
                toggleEditForm(blogId); // Menampilkan atau menyembunyikan form edit
            } else if (action === 'delete') {
                if (confirm('Apakah Anda yakin ingin menghapus blog ini?')) {
                    document.getElementById(`delete-form-${blogId}`).submit(); // Mengirim form untuk menghapus
                }
            }
        }

        function toggleEditForm(blogId) {
            const editForm = document.getElementById(`edit-form-${blogId}`);
            editForm.style.display = editForm.style.display === 'none' ? 'table-row' : 'none'; // Menampilkan atau menyembunyikan form
        }
    </script>
</x-back-app-layout>
