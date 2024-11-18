<x-back-app-layout>

    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">Input</div>
                        <h2 class="page-title">Akad</h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <!-- Button for larger screens -->
                            <a href="{{ route('deal.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                </svg>
                                Tambah Data Akad
                            </a>

                            <!-- Button for smaller screens -->
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modalAdd" aria-label="Tambah Data Akad">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Section with Table -->
        <div class="container-xl mt-3">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Daftar Akad</h2>
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
                        <!-- Table rows will be populated dynamically -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('after-style')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

<!-- Page wrapper -->


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

@push('after-script')
    <!-- jQuery and DataTables JS -->
    <script src="{{ asset('backsites/js/jquery-3.7.1.min.js') }}"></script>
    <!-- DataTables and Bootstrap JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#deals-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('deal.index') }}',
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'title' },
                    { data: 'branch.title', defaultContent: 'Branch Not Found' },
                    {
                        data: 'deal_type',
                        render: function(data) {
                            switch (data) {
                                case 'Mobil Bekas': return `<span class="badge bg-blue-lt">${data}</span>`;
                                case 'Mobil Baru': return `<span class="badge bg-purple-lt">${data}</span>`;
                                case 'Rumah': return `<span class="badge bg-orange-lt">${data}</span>`;
                                case 'Tanah': return `<span class="badge bg-red-lt">${data}</span>`;
                                case 'Ruko': return `<span class="badge bg-green-lt">${data}</span>`;
                                default: return `<span class="badge bg-secondary">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'updated_at',
                        defaultContent: 'Not Modified Yet',
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('id-ID', {
                                day: '2-digit', month: 'short', year: 'numeric',
                                hour: '2-digit', minute: '2-digit'
                            }) : '-';
                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = "{{ route('deal.edit', ':id') }}".replace(':id', row.id);
                            let deleteUrl = "{{ route('deal.destroy', ':id') }}".replace(':id', row.id);
                            return `
                                <button class="btn btn-sm btn-primary btn-edit" data-url="${editUrl}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-url="${deleteUrl}">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            `;
                        }
                    }
                ]
            });

            // Aksi Edit
            $('#deals-table').on('click', '.btn-edit', function() {
                let url = $(this).data('url');
                console.log("Fetching data from URL: ", url);

                $.get(url, function(data) {
                    console.log("Data received: ", data);

                    if (data) {
                        // Masukkan data ke form di dalam modal
                        $('#editModal #title').val(data.title);
                        $('#editModal #branch_id').val(data.branch_id).change(); // .change() untuk select2 atau select biasa
                        $('#editModal #deal_type').val(data.deal_type);
                        $('#editModal #deal_date').val(data.deal_date);
                        $('#editForm').attr('action', url.replace('/edit', '')); // Set action form
                        $('#editModal').modal('show'); // Tampilkan modal
                    } else {
                        alert('Gagal memuat data untuk diedit.');
                    }
                }).fail(function(xhr) {
                    alert('Terjadi kesalahan saat memuat data.');
                    console.error("Error: ", xhr.responseText);
                });
            });

            // Aksi Hapus
            $('#deals-table').on('click', '.btn-delete', function() {
                let url = $(this).data('url');
                if (confirm('Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Token CSRF Laravel
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#deals-table').DataTable().ajax.reload(null, false); // Reload DataTable tanpa refresh halaman
                                alert('Data berhasil dihapus.');
                            } else {
                                alert('Gagal menghapus data: ' + response.message);
                            }
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan saat menghapus data.');
                            console.error("Error: ", xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
</x-back-app-layout>
