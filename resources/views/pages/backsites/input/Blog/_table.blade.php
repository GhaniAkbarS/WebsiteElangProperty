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
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->category->title }}</td> <!-- Menampilkan nama kategori -->
            <td>{{ $blog->status }}</td>
            <td>{{ $blog->pageview }}</td>
            <td>
                <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
