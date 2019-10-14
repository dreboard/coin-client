@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('categories', ['id' => $coin[0]->cat_id]) }}">{{ $coin[0]->coinCategory }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('types', ['id' => $coin[0]->type_id]) }}">{{ $coin[0]->coinType }}</a>
        </li>
        <li class="breadcrumb-item active">{{ $coin[0]->coinName }}</li>
    </ol>
    <table class="table table-bordered">
        <thead>
        <tr>

            <th scope="col">Collected</th>
            <th scope="col">Unique</th>
            <th scope="col">Face Value</th>
            <th scope="col">Investment</th>
            <th>Add</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">100</th>
            <td>100</td>
            <td>$20.33</td>
            <td>$400.23</td>
            <td>
                <a href="{{ route('coin', ['id' => $coin[0]->id]) }}" class="btn btn-primary">Add</a>
            </td>
        </tr>
        </tbody>
    </table>


    <table width="100%" border="0">
        <tr>
            <td class="darker">Type</td>
            <td colspan="2"><a href="Small_Cent.php">Small Cent </a><a href="viewCoinType.php?coinType=Lincoln_Memorial"><strong>(138 Collected)</strong></a></td>
        </tr>
        <tr>
            <td class="darker">Total Graded</td>
            <td width="5%"><strong>107</strong></td>
            <td width="81%">77.5 %</td>
        </tr>
        <tr>
            <td width="14%" class="darker">Total Ungraded</td>
            <td><strong><a href="viewNoGradeType.php?coinType=Lincoln_Memorial">31</a></strong></td>
            <td>22.5 %</td>
        </tr>
        <tr>
            <td class="darker">Total Certified</td>
            <td><a title="View Number Of Certified Coins" href="viewCertTypeReport.php?coinType=Lincoln_Memorial"><strong>91</strong></a></td>
            <td>65.9 %</td>
        </tr>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Total Graded</th>
            <th scope="col">Ungraded</th>
            <th scope="col">Certified</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>21</td>
            <td>122</td>
            <td>520</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>

    @includeIf("back.types.info.{$typeLink}", ['subTypes' => $subTypes, 'varietyList' => $varietyList])
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
                    @foreach ($varieties as $variety)
                        <tr>
                            <td><a href="{{ route('coin', ['id' => $variety->id]) }}">{{ $variety->sub_type }}</a></td>
                            <td><a href="{{ route('coin', ['id' => $variety->id]) }}">{{ $variety->variety }}</a></td>
                            <td>{{ $variety->label }}</td>
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

