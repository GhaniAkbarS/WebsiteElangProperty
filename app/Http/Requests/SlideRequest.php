<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna berwenang untuk membuat permintaan ini.
     */
    public function authorize()
    {
        return true; // Pastikan ini true untuk mengizinkan semua user melakukan request
    }

    /**
     * Aturan validasi untuk permintaan ini.
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'nullable|url', // Opsional, hanya jika ada link
        ];
    }

    /**
     * Kustomisasi pesan kesalahan jika diperlukan.
     */

}
