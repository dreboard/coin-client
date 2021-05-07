@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <h1 class="mt-2">
        <img src="http://cdn.dev-php.site/public/img/coins/{{ str_replace(' ', '_', $category[0]['coinCategory']) }}.jpg" style="width: 40px; height: auto;" class="logo">
        {{ $category[0]['coinCategory'] }}
    </h1>

    <table class="table table-borderless mt-2">
        <thead>
        <tr>
            <th scope="col">Collected</th>
            <th scope="col">Face Value</th>
            <th scope="col">Investment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $category[0]['catCount'] }}</td>
            <td>${{ $category[0]['catFace'] }}</td>
            <td>${{ $category[0]['catInvest'] }}</td>
        </tr>
        </tbody>
    </table>
    <!-- DataTables Example -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th></th>
                <th>Type</th>
                <th>Collected</th>
                <th>Investment</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th></th>
                <th>Type</th>
                <th>Collected</th>
                <th>Investment</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($types as $k => $type)
                <tr>
                    <td><a href="{{ route('type.view', ['id' => $type['id']]) }}"><img src="http://cdn.dev-php.site/public/img/coins/{!! str_replace(' ', '_', $type['coinType']) !!}.jpg" style="width: 40px; height: auto;" class="logo"></a></td>
                    <td class="w-75"><a href="{{ route('type.view', ['id' => $type['id']]) }}">{{ $type['coinType'] }}</a></td>
                    <td>{{ $type['details'][0]['typeCount'] }}</td>
                    <td>${{ $type['details'][0]['typeInvest'] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <home-component></home-component>
@endsection
@push('scripts')
    <script>
        console.log('ready');
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush

