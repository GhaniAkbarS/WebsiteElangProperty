<x-back-app-layout>
    <div class="container">
        <div class="row">
            <!-- Cek jika query string 'view' bernilai 'form' -->
            @if(request('view') === 'form')
                <!-- Panggil Form -->
                <div class="col-md-12">
                    @include('pages.backsites.input.blog._form')
                </div>
            @elseif(request('view') === 'table')
                <!-- Panggil Tabel -->
                <div class="col-md-12">
                    @include('pages.backsites.input.blog._table')
                </div>
            @else
                <!-- Tampilkan kedua-duanya jika tidak ada query -->
                <div class="col-md-6">
                    @include('pages.backsites.input.blog._form')
                </div>
                <div class="col-md-6">
                    @include('pages.backsites.input.blog._table')
                </div>
            @endif
        </div>
    </div>
</x-back-app-layout>
