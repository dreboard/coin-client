@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <h1>{{ $category[0]->coinCategory }}</h1>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Collected</th>
            <th scope="col">Face Value</th>
            <th scope="col">Investment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>100</td>
            <td>$20.33</td>
            <td>$400.23</td>
        </tr>
        </tbody>
    </table>
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
                    @foreach ($types as $type)
                        <tr>
                            <td><a href="{{ route('types', ['id' => $type->id]) }}"><img src="http://cdn.dev-php.site/public/img/coins/{!! str_replace(' ', '_', $type->coinType) !!}.jpg" style="width: 40px; height: auto;" class="logo"></a></td>
                            <td><a href="{{ route('types', ['id' => $type->id]) }}">{{ $type->coinType }}</a></td>
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

