<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    @include('includes.backsites.meta')

    @stack('before-style')

    @include('includes.backsites.style')

    @stack('after-style')
  </head>
  <body>
    <div class="page">
        <x-back-nav-layout></x-back-nav-layout>
        <div class="page-wrapper">
            <!-- Page Header -->
            {{-- <!-- Page Body --> --}}

                        {{-- MEMANGGIL INDEX BLADE --}}
                        {{ $slot ?? 'TIDAK ADA HALAMAN' }}

        </div>
    </div>

    @stack('before-script')
    @include('includes.backsites.script')
    @stack('after-script')
</body>

</html>
