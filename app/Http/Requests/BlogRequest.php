<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Izinkan semua user untuk mengakses request ini
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:ep_category,id', // Pastikan category_id ada di tabel ep_category
            'title' => 'required|string|max:255', // Validasi judul
            'slug' => 'required|string|max:255|unique:ep_blog,slug,' . $this->blog, // Validasi slug, kecuali untuk blog yang sama saat update
            'content' => 'required|string', // Validasi konten
            'excerpt' => 'nullable|string|max:255', // Validasi excerpt, boleh kosong
            'status' => 'required|in:publish,draft', // Validasi status
            'pageview' => 'nullable|integer', // Validasi pageview, boleh kosong
            'keyword' => 'nullable|string', // Validasi keyword, boleh kosong
        ];
    }
}
