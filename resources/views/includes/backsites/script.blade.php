<script src="{{asset('backsites/js/demo-theme.min.js?1692870487')}}"></script>

<!-- Libs JS -->
<script src="{{asset('backsites/libs/apexcharts/dist/apexcharts.min.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/libs/jsvectormap/dist/maps/world.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/libs/jsvectormap/dist/maps/world-merc.js?1692870487')}}" defer></script>
<!-- Tabler Core -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('backsites/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/js/demo.min.js?1692870487')}}" defer></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
        chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 40.0,
            sparkline: {
                enabled: true
            },
            animations: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false,
        },
        fill: {
            opacity: .16,
            type: 'solid'
        },
        stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
        },
        series: [{
            name: "Profits",
            data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
        }],
        tooltip: {
            theme: 'dark'
        },
        grid: {
            strokeDashArray: 4,
        },
        xaxis: {
            labels: {
                padding: 0,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            type: 'datetime',
        },
        yaxis: {
            labels: {
                padding: 4
            },
        },
        labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ],
        colors: [tabler.getColor("primary")],
        legend: {
            show: false,
        },
    })).render();
    });
    <script src="./dist/libs/tinymce/tinymce.min.js?1692870487" defer></script>

<!-- Tabler Core -->
<script src="{{asset('backsites/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/js/demo.min.js?1692870487')}}" defer></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    let options = {
        selector: '#tinymce-mytextarea',
        height: 300,
        menubar: false,
        statusbar: false,
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
    }
    if (localStorage.getItem("tablerTheme") === 'dark') {
        options.skin = 'oxide-dark';
        options.content_css = 'dark';
    }
    tinyMCE.init(options);
    })
    @formatter:on

    @formatter:on
</script>

//ckeditor
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
    ga('send', 'pageview');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{asset('backsites/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backsites/js/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
<script src="{{asset('backsites/js/app.js')}}"></script>
<script src="{{asset('backsites/js/app_bs3.js')}}"></script>


//useinputtag
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    UseBootstrapTag(document.getElementById('example'))
</script>

//Deal input

<!-- JavaScript untuk Menampilkan/Menyembunyikan Input Berdasarkan Jenis Akad -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dealType = document.getElementById('deal_type');
            const carBrandInput = document.getElementById('carBrandInput');
            const carTypeInput = document.getElementById('carTypeInput');

            function toggleCarFields() {
                const selectedType = dealType.value;
                if (selectedType === 'Mobil Bekas' || selectedType === 'Mobil Baru') {
                    carBrandInput.style.display = 'block';
                    carTypeInput.style.display = 'block';
                } else {
                    carBrandInput.style.display = 'none';
                    carTypeInput.style.display = 'none';
                }
            }

            // Jalankan fungsi ketika jenis akad berubah
            dealType.addEventListener('change', toggleCarFields);

            // Panggil fungsi saat halaman pertama kali dimuat
            toggleCarFields();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
