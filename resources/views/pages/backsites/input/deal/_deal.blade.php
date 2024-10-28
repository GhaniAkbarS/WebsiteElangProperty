<x-back-app-layout>
    <form action="{{ route('deal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <!-- Input Cabang -->
            <div class="form-group">
                <label for="branch_id" class="block text-sm font-medium text-gray-700">Cabang</label>
                <select name="branch_id" id="branch_id" required class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                    <option value="">Pilih Cabang</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                    @endforeach
                </select>
                @error('branch_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Tanggal Akad -->
            <div class="form-group">
                <label for="deal_date" class="block text-sm font-medium text-gray-700">Tanggal Akad</label>
                <input type="date" name="deal_date" id="deal_date" required class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
            </div>

            <!-- Input Jenis Akad -->
            <div class="form-group">
                <label for="deal_type" class="block text-sm font-medium text-gray-700">Jenis Akad</label>
                <select name="deal_type" id="deal_type" required class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                    <option value="">Pilih Jenis Akad</option>
                    @foreach($dealTypes as $dealType)
                        <option value="{{ $dealType }}">{{ $dealType }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Thumbnail (Gambar) -->
            <div class="form-group">
                <label for="image" class="block text-sm font-medium text-gray-700">Thumbnail (Gambar)</label>
                <input type="file" name="image" id="image" required class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
            </div>

            <!-- Input Merek Mobil -->
            <div id="carBrandInput" class="form-group" style="display: none;">
                <label for="car_brand" class="block text-sm font-medium text-gray-700">Merek Mobil</label>
                <select name="car_brand" id="car_brand" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                    <option value="">Pilih Merek Mobil</option>
                    @foreach($carBrands as $carBrand)
                        <option value="{{ $carBrand->title }}">{{ $carBrand->title }}</option>
                    @endforeach
                </select>
                @error('car_brand')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Jenis Mobil -->
            <div id="carTypeInput" class="form-group" style="display: none;">
                <label for="car_type" class="block text-sm font-medium text-gray-700">Jenis Mobil</label>
                <input type="text" name="car_type" id="car_type" placeholder="Masukkan jenis mobil" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md">
                @error('car_type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Keyword (Tag) -->
            <div class="mb-4">
                <label for="keyword" class="block text-sm font-medium text-gray-700">Keyword (Tag)</label>
                <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword" class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md" data-role="tagsinput">
            </div>

            <!-- Submit Button -->
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</x-back-app-layout>
