<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'branch_id' => 'required|exists:ep_branch,id',
            'car_brand' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Merek mobil nullable tapi required_if
            'car_type' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Jenis mobil wajib untuk Mobil_Baru atau Mobil_Bekas
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:ep_deal,slug', // Sesuaikan nama tabel
            'deal_date' => 'required|date',
            'deal_type' => 'required|string', // Validasi sederhana untuk tipe akad
            'image' => 'nullable|string|max:255', // Menyesuaikan dengan migrasi yang tidak menggunakan tipe file
            'keyword' => 'string',
            'content' => 'nullable|string',
            'deal_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'car_brand.required_if' => 'Merek mobil harus dipilih jika jenis akad adalah mobil baru atau mobil bekas.',
            'car_type.required_if' => 'Jenis mobil harus dipilih jika jenis akad adalah mobil baru atau mobil bekas.',
            'image.max' => 'Ukuran maksimal untuk gambar adalah 2048KB.',
            // Tambahkan pesan lain sesuai kebutuhan
        ];
    }
}
