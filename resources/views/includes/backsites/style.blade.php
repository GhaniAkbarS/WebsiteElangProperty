<!-- CSS files -->
<link href="{{asset('backsites/css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/demo.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsitescss/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
<link href="{{asset('backsites/css/demo.min.css?1692870487')}}" rel="stylesheet"/>
<style>
  @import url('https://rsms.me/inter/inter.css');
  :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }
  body {
      font-feature-settings: "cv03", "cv04", "cv11";
  }
</style>
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
      <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
      </style>

{{-- CKeditor --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
<style>
    /* Mengatur tinggi editor */
    .ck-editor__editable {
        min-height: 300px; /* Ganti dengan tinggi yang diinginkan */
    }
</style>

{{-- Tag input blog link nya buat berubah admin--}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}



{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="{{asset('backsites/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
<link rel="stylesheet" href="{{asset('backsites/css/app.css')}}"> --}}
{{-- <style>
    .bootstrap-tagsinput .tag {
           margin-right: 2px;
           color: #ffffff;
           background: #2196f3;
    @@ -72,14 +50,20 @@
       .bootstrap-tagsinput {
           width: 100%;
    }
    </style> --}}

{{-- Deal form layout --}}
<style>
    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .form-group {
        flex: 1 1 calc(50% - 20px); /* Membuat form-group mengambil 50% lebar dan ada jarak antar item */
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


