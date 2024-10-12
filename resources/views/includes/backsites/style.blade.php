<!-- CSS files from assets -->
<link href="{{ asset('backsites/css/tabler.min.css?1692870487') }}" rel="stylesheet"/>
<link href="{{ asset('backsites/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet"/>
<link href="{{ asset('backsites/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet"/>
<link href="{{ asset('backsites/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet"/>
<link href="{{ asset('backsites/css/demo.min.css?1692870487') }}" rel="stylesheet"/>

<!-- Font from Inter -->

{{-- modal backstyle --}}
<style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>

<!-- Bootstrap 3.4.1 -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"/>

<!-- Custom Styles for Table and Editor -->
<style>
    /* Tabel Styling */
    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-bordered th, .table-bordered td {
      border: 1px solid #dee2e6;
    }

    /* CKEditor height adjustment */
    .ck-editor__editable {
        min-height: 300px;
    }
</style>

<!-- Tags Input Style -->
<style>
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #ffffff;
        background: #2196f3;
        padding: 3px 7px;
        border-radius: 3px;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }
</style>

{{-- Modal edit blog back --}}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Tags Input -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

<!-- CKEditor -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css"/>

<!-- Additional Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
<link rel="stylesheet" href="{{ asset('backsites/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('backsites/app.css') }}">

