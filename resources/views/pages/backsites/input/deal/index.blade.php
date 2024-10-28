<x-back-app-layout>
    <body>
        <div class="container mt-4">
            <!-- Tombol Tambah Data Akad -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar Akad</h2>
                <a href="{{ route('deal.create') }}" class="btn btn-primary">Tambah Data Akad</a>
            </div>

            <!-- Tabel Data -->
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Cabang</th>
                        <th>Akad</th>
                        <th>Modifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deals as $index => $deal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <!-- Kondisi untuk Judul Akad -->
                            <td>
                                @if($deal->deal_type == 'Rumah' || $deal->deal_type == 'Ruko')
                                    {{ $deal->deal_type }} (unit) - {{ $deal->car_brand }} - {{ $deal->car_type }} - {{ $deal->branch->name }}
                                @elseif($deal->deal_type == 'Tanah')
                                    {{ $deal->deal_type }} (sebidang) - {{ $deal->car_brand }} - {{ $deal->car_type }} - {{ $deal->branch->name }}
                                @else
                                    {{ $deal->deal_type }} - {{ $deal->car_brand }} - {{ $deal->car_type }} - {{ $deal->branch->name }}
                                @endif
                            </td>
                            <td>{{ $deal->branch->name }}</td>
                            <td>{{ $deal->deal_type }}</td>
                            <td>{{ $deal->modification ?? 'Tidak Ada' }}</td>
                            <td>
                                <a href="{{ route('deal.edit', $deal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('deal.destroy', $deal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </body>
</x-back-app-layout>
