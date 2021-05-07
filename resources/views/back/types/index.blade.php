@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home', ['id' => $typeInfo[0]['cat_id']]) }}">All</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('category.view', ['id' => $typeInfo[0]['cat_id']]) }}">{{ $typeInfo[0]['coinCategory'] }}</a>
        </li>
    </ol>

    <h1 class="mt-2">
        <img src="http://cdn.dev-php.site/public/img/coins/{{ str_replace(' ', '_', $typeInfo[0]['coinType']) }}.jpg" style="width: 40px; height: auto;" class="logo">
        {{ $typeInfo[0]['coinType'] }}
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Collected</th>
            <th scope="col">Face Value</th>
            <th scope="col">Investment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>100</td>
            <td>$20.33</td>
            <td>$400.23</td>
        </tr>
        </tbody>
    </table>

    <hr>
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
            @foreach ($typeCoins as $type)
                <tr>
                    <td class="w-auto"><a href="{{ route('coins.view', ['id' => $type['coin_id']]) }}"><img src="http://cdn.dev-php.site/public/img/coins/{!! str_replace(' ', '_', $type['coinVersion']) !!}.jpg" style="width: 40px; height: auto;" class="logo"></a></td>
                    <td class="w-75"><a href="{{ route('coins.view', ['id' => $type['coin_id']]) }}">{{ $type['coinName'] }}</a></td>
                    <td class="text-center">{{ $type['id'] }}</td>
                    <td class="text-right">$114,500</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script>
        console.log('ready');
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush

