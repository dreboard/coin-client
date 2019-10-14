@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home', ['id' => $typeInfo[0]->cat_id]) }}">All</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('categories', ['id' => $typeInfo[0]->cat_id]) }}">{{ $typeInfo[0]->coinCategory }}</a>
        </li>
        <li class="breadcrumb-item active">{{ $typeInfo[0]->coinType }}</li>
    </ol>
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
    @includeIf("back.types.info.{$typeLink}", ['some' => 'data'])
    <hr>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($typeCoins as $type)
                        <tr>
                            <td><a href="{{ route('coin', ['id' => $type->coin_id]) }}"><img src="http://cdn.dev-php.site/public/img/coins/{!! str_replace(' ', '_', $type->coinVersion) !!}.jpg" style="width: 40px; height: auto;" class="logo"></a></td>
                            <td><a href="{{ route('coin', ['id' => $type->coin_id]) }}">{{ $type->coinName }}</a></td>
                            <td>{{ $type->id }}</td>
                            <td>53</td>
                            <td>2009/10/22</td>
                            <td>$114,500</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

