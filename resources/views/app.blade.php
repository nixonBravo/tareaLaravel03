<!DOCTYPE html>
<html lang="en">
<!-- Head -->
@section('title', 'Dashboard')
@include('template.header')
<!-- ./head -->

<body>

    <div class="wrapper">

        @include('template.sidebar')

        <div class="content-wrapper">
            @yield('contenido')
        </div>

        @include('template.footer')

    </div>

    @include('template.scripts')

</body>

</html>
