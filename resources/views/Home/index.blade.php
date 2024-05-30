<x-layouts.app>

    <x-slot:title>
        Quick Invoice Dashboard
    </x-slot>

    <div class="container-fluid">

        <x-layouts.parts.breadcrumb title="Dashboard" />

        <x-messages.alert>
            <strong>Whoops!</strong> Something went wrong!
        </x-messages.alert>


        @include('Home.section_a_welcom')

        @include('Home.section_b_')

        @include('Home.section_c_')

    </div>


    <x-slot:scripts>
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    </x-slot>

</x-layouts.app>
