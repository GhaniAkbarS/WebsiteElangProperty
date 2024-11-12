<x-back-app-layout>

    <div class="col-md-20 mx-auto mt-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Daftar Akad</h2>
                <a href="{{ route('deal.create') }}" class="btn btn-primary">Tambah Data Akad</a>
            </div>
            <div class="card-body">
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
        </div>
    </div>

    @push('after-style')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Table Styling -->
<style>
    /* Mengatur batas tabel */
    .table-bordered {
        border: 1px solid #dee2e6;
    }

    /* Mengatur batas untuk sel tabel */
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
  </style>

  <!-- Form Layout Styling -->
  <style>
    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .form-group {
        flex: 1 1 calc(50% - 20px); /* Membuat form-group mengambil 50% lebar dengan jarak antar item */
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-group input[type="file"] {
        padding: 5px;
    }

    /* Agar tampilan tetap responsif pada layar kecil */
    @media (max-width: 768px) {
        .form-group {
            flex: 1 1 100%; /* Membuat elemen form mengambil seluruh lebar layar pada ukuran kecil */
        }
    }
  </style>
    @endpush

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Akad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <!-- Branch -->
                        <div class="mb-3">
                            <label for="branch" class="form-label">Cabang</label>
                            <select class="form-select" id="branch" name="branch_id" required>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Deal Type -->
                        <div class="mb-3">
                            <label for="deal_type" class="form-label">Akad</label>
                            <input type="text" class="form-control" id="deal_type" name="deal_type" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('after-script')
    <!-- jQuery and DataTables JS -->
    <script src="{{ asset('backsites/js/jquery-3.7.1.min.js') }}"></script>
    <!-- DataTables and Bootstrap JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#deals-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('deal.index') }}',
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'title' },
                    { data: 'branch.title', defaultContent: 'Cabang Tidak Ditemukan' },
                    { data: 'deal_type' },
                    { data: 'updated_at', defaultContent: 'Belum Dimodifikasi' },
                    { data: 'action', orderable: false, searchable: false }
                ],
                language: {
                    search: "Cari:",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 hingga 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
                }
            });

            // Action for Edit button
            $('#deals-table').on('click', '.btn-edit', function() {
                let url = $(this).data('url');
                $.get(url, function(data) {
                    $('#editModal #title').val(data.title);
                    $('#editModal #branch').val(data.branch_id);
                    $('#editModal #deal_type').val(data.deal_type);
                    $('#editForm').attr('action', url);
                    $('#editModal').modal('show');
                });
            });

            // Action for Delete button
            $('#deals-table').on('click', '.btn-delete', function() {
                let url = $(this).data('url');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#deals-table').DataTable().ajax.reload();
                            alert('Data berhasil dihapus');
                        },
                        error: function(response) {
                            alert('Terjadi kesalahan, data tidak dapat dihapus');
                        }
                    });
                }
            });
        });
    </script>
    @endpush
</x-back-app-layout>
