@extends('layouts.main')

@push('nav')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pages:</h6>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin[0]->id]) }}">Errors</a>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin[0]->id]) }}">Color</a>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin[0]->id]) }}">Varieties</a>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin[0]->id]) }}">Grade</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
    </li>
@endpush

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
    <h4>Variety: {{ $coin[0]->variety }}</h4>

    <table class="table">

        <tr><th class="w-25">Label</th><td>{{ $coin[0]->label }}</td></tr>
        <tr><th class="w-25">Sub Type</th> <td>{{ $coin[0]->sub_type }}</td></tr>
        <tr><th class="w-25">Variety Group</th> <td>{{ $coin[0]->grouping }}</td></tr>
        <tr><th class="w-25">Designation</th> <td>{{ $coin[0]->designation }}</td></tr>
        <tr><th></th></tr>


    </table>










    <table class="table" border="0">
        <thead>
        <tr>

            <th scope="col">Strike</th>
            <th scope="col">Metal</th>
            <th scope="col">Varieties</th>
            <th scope="col">Investment</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $coin[0]->strike }}</td>
            <td>{{ $coin[0]->coinMetal }}</td>
            <td></td>
            <td>$400.23</td>
            <td class="text-right">
                <a href="{{ route('coins.year', ['coinYear' => $coin[0]->coinYear]) }}" class="btn btn-primary">{{ $coin[0]->coinYear }}</a> | <a href="{{ route('coins.add', ['id' => $coin[0]->id]) }}" class="btn btn-primary">Add</a>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Collected</th>
            <th scope="col">Unique</th>
            <th scope="col">Face Value</th>
            <th scope="col">Investment</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">100</th>
            <td>100</td>
            <td>$20.33</td>
            <td>$400.23</td>
            <td class="text-right">
                <a href="{{ route('coins.year', ['coinYear' => $coin[0]->coinYear]) }}" class="btn btn-primary">{{ $coin[0]->coinYear }}</a> | <a href="{{ route('coins.add', ['id' => $coin[0]->id]) }}" class="btn btn-primary">Add</a>
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
                        <th>Variety</th>
                        <th>Position</th>
                        <th>Designation</th>
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
                    @foreach ($collected as $variety)
                        <tr>
                            <td><a href="{{ route('coins.view', ['id' => $variety->id]) }}">{{ $variety->sub_type }}</a></td>
                            <td><a href="{{ route('coins.view', ['id' => $variety->id]) }}">{{ $variety->variety }}</a></td>
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

