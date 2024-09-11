<x-front-app-layout>

{{-- berguna agar merubah bagian slider nya --}}
@include('pages.frontsites.home.slide._slide')

{{-- berguna agar bisa mengatur features --}}
@include('pages.frontsites.home.features._features')


{{-- manggil pages front home services --}}
@include('pages.frontsites.home.services._services')

{{-- panggil portofolio --}}
@include('pages.frontsites.home.portofolio._portofolio')

{{-- manggil form "hitung simulasi online" --}}
@include('pages.frontsites.home.appointment._appointment')


</x-front-app-layout>
