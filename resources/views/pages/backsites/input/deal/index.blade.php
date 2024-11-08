<x-back-app-layout>
    @push('after-style')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Akad</h2>
            <a href="{{ route('deal.create') }}" class="btn btn-primary">Tambah Data Akad</a>
        </div>

        <table id="deals-table" class="table table-bordered">
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
        </table>
    </div>

    @push('after-script')
    <!-- jQuery and DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backsites/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#deals-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('deal.index') }}', // Route ke controller method untuk mengambil data
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false }, // Nomor baris
                    { data: 'title' },
                    { data: 'branch.title', defaultContent: 'Cabang Tidak Ditemukan' },
                    { data: 'deal_type' },
                    { data: 'modification', defaultContent: 'Tidak Ada' },
                    { data: 'action', orderable: false, searchable: false } // Tombol aksi
                ]
            });
        });
    </script>
    @endpush
</x-back-app-layout>
