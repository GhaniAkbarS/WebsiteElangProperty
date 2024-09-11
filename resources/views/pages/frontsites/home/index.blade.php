<x-front-app-layout>

{{-- berguna agar merubah bagian slider nya --}}
@include('pages.frontsites.home._slide')

{{-- berguna agar bisa mengatur features --}}
@include('pages.frontsites.home._features')


{{-- manggil pages front home services --}}
@include('pages.frontsites.home._services')

{{-- panggil portofolio --}}
@include('pages.frontsites.home._portofolio')

{{-- manggil form "hitung simulasi online" --}}
@include('pages.frontsites.home._appointment')

{{-- memanggil faq --}}
@include('pages.frontsites.home._faq')

</x-front-app-layout>
