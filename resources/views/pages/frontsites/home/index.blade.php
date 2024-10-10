<x-front-app-layout>

{{-- _ menandakan bahwa dia sub dari index --}}

{{-- berguna agar merubah bagian slider nya --}}
@include('pages.frontsites.home._slide')

{{-- berguna agar bisa mengatur features --}}
@include('pages.frontsites.home._about')


{{-- manggil pages front home services --}}
@include('pages.frontsites.home._services')

{{-- panggil syarat pengajuan --}}
@include('pages.frontsites.home._requierment')

{{-- manggil form "hitung simulasi online" --}}
@include('pages.frontsites.home._simulation')

{{-- manggil form "tampilan blog" --}}
@include('pages.frontsites.home._blog')

{{-- memanggil faq --}}
@include('pages.frontsites.home._faq')

</x-front-app-layout>
