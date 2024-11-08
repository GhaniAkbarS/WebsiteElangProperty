<script src="{{asset('backsites/js/demo-theme.min.js?1692870487')}}"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('backsites/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('backsites/js/demo.min.js?1692870487')}}" defer></script>
<script>

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






