<!-- Tabel dan tombol untuk membuat blog baru -->
<x-back-app-layout>
    <div class="mb-3">
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Buat Blog Baru</a>
    </div>

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
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! $blog->title !!}</td>
                    <td>{!! $blog->category->title !!}</td>
                    <td>{{ $blog->pageview }} kali</td>
                    <td>{{ $blog->status }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $blog->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $blog->id }}">
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBlogModal{{ $blog->id }}">
                                        Edit
                                    </a>
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
    @foreach ($blogs as $blog)
    <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel{{ $blog->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel{{ $blog->id }}">Edit Blog</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('blog.update', $blog->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="modal-title-{{ $blog->id }}">Judul</label>
                            <input type="text" id="modal-title-{{ $blog->id }}" name="title" class="form-control" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-category-{{ $blog->id }}">Kategori</label>
                            <select name="category_id" id="modal-category-{{ $blog->id }}" class="form-control">
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal-status-{{ $blog->id }}">Status</label>
                            <select name="status" id="modal-status-{{ $blog->id }}" class="form-control">
                                <option value="publish" {{ $blog->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@push("after-script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    UseBootstrapTag(document.getElementById('example'))
</script>
@endpush
</x-back-app-layout>
