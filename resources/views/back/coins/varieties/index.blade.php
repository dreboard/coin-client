@extends('layouts.main')

@push('nav')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pages:</h6>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}">Errors</a>
            @if(in_array($coin['info'][0]->coinType, config('coins.colorTypes')))
                <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}">Color</a>
            @endif


            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}">Varieties</a>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}">Grade</a>
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
            <a href="{{ route('category.view', ['id' => $coin['info'][0]->cat_id]) }}">{{ $coin['info'][0]->coinCategory }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('type.view', ['id' => $coin['info'][0]->type_id]) }}">{{ $coin['info'][0]->coinType }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('coins.view', ['id' => $coin['info'][0]->coin_id]) }}">{{ $coin['info'][0]->coinName }}</a>
        </li>

    </ol>
    <h1 class="mt-2">{{ $coin['info'][0]->label }}</h1>
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-borderless table-responsive">
                <tr>
                    <th scope="col">Variety</th>
                    <td>
                        <a href="{{ route('coins.varietyType', ['variety' => $coin['info'][0]->variety,
                                                                     'id' => $coin['info'][0]->coin_id
                                                                   ]) }}">{{ $coin['info'][0]->variety }}</a>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Designations</th><td>{{ $coin['info'][0]->designation }}</td>
                </tr>
                <tr>
                    <th scope="col">Grouping</th><td>{{ $coin['info'][0]->grouping }}</td>
                </tr>
                <tr>
                    <th scope="col">Source</th><td>{{ $coin['info'][0]->type }}</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('coins.add', ['id' => $coin['info'][0]->id]) }}" class="dropdown-item">One</a>
                                <a class="dropdown-item" href="#">Many</a>
                            </div>
                        </div>
                    </td><td>
                        <a href="{{ route('coins.year', ['coinYear' => $coin['info'][0]->coinYear]) }}" class="btn btn-primary">{{ $coin['info'][0]->coinYear }}</a> | <a href="{{ route('coins.add', ['id' => $coin['info'][0]->id]) }}" class="btn btn-primary">Add</a></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-borderless table-responsive">
                <tr>
                    <th scope="col">Sub Type</th><td>{{ $coin['info'][0]->sub_type }}</td>
                </tr>
                <tr>
                    <th scope="col">Investment</th><td>{{ $coin['info'][0]->coinMetal }}</td>
                </tr>
                <tr>
                    <th scope="col">Face Value </th><td>${{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Investment</th><td>${{ $coin['placeHolderNumber'] }}00.23</td>
                </tr>
                <tr>
                    <td>Face Value </td><td></td>
                </tr>
            </table>
        </div>
    </div>


    <hr />

    <div class="row">
        <div class="col-sm-4">
            <table class="table table-borderless table-responsive">
                <tr>
                    <th scope="col">Ungraded</th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Graded</th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Certified</th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Highest</th><td>MS-67</td>
                </tr>
                <tr>
                    <td><a href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}" class="btn btn-primary">Grade Report</a></td><td></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-4">
            <table class="table table-borderless table-responsive">
                <tr>
                    <th scope="col">Varieties</th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Errors</th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Face Value </th><td>{{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Investment</th><td>${{ $coin['placeHolderNumber'] }}</td>
                </tr>
                <tr>
                    <td>Face Value </td><td></td>
                </tr>
            </table>
        </div>
        @if(in_array($coin['info'][0]->coinType, config('coins.colorTypes')))
            <div class="col-sm-4">
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th scope="col">Red</th><td>{{ $coin['placeHolderNumber'] }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Red/Brown</th><td>{{ $coin['placeHolderNumber'] }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Brown </th><td>{{ $coin['placeHolderNumber'] }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Investment</th><td>${{ $coin['placeHolderNumber'] }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('coins.view', ['id' => $coin['info'][0]->id]) }}" class="btn btn-primary">Color Report</a></td><td></td>
                    </tr>
                </table>
            </div>
        @endif

    </div>

    <!-- DataTables Example -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Collected {{ count($coin['collected']) }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Purchase</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Purchase</th>
                        <th>Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($coin['collected'] as $collect)
                        <tr>
                            <td><a href="{{ route('coins.variety', ['id' => $collect['id']]) }}">{{ $collect['nickName'] }}</a></td>
                            <td><a href="{{ route('coins.variety', ['id' => $collect['id']]) }}">{{ $collect['coinGrade'] }}</a></td>
                            <td><a href="{{ route('coins.variety', ['id' => $collect['id']]) }}">{{ $collect['purchasePrice'] }}</a></td>
                            <td><a href="{{ route('coins.variety', ['id' => $collect['id']]) }}">{{ $collect['enterDate'] }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

