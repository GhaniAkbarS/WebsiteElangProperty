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
        //cara mengakali kalau data tidak masuk itu dicoba coba tiap kolom untuk null, sekiranya apa data yang hanya masuk
        return [
            'branch_id' => 'required|exists:ep_branch,id',
            'car_brand' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Wajib jika jenis akad mobil
            'car_type' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Wajib jika jenis akad mobil
            // 'title' => 'required|string|max:255',
            'deal_date' => 'required|date',
            'deal_type' => 'required|string', // Validasi sederhana untuk tipe akad
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'keyword' => 'nullable|string',
            'content' => 'nullable|string',
            // 'deal_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'car_brand.required_if' => 'Merek mobil harus dipilih jika jenis akad adalah mobil baru atau mobil bekas.',
            'car_type.required_if' => 'Jenis mobil harus dipilih jika jenis akad adalah mobil baru atau mobil bekas.',
            'image.max' => 'Masukkan gambar.',
            // Tambahkan pesan lain sesuai kebutuhan
        ];
    }
}
