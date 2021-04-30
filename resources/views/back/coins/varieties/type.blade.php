@extends('layouts.main')

@push('nav')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pages:</h6>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]['id']]) }}">Errors</a>
            @if(in_array($coin['info'][0]['coinType'], config('coins.colorTypes')))
                <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]['id']]) }}">Color</a>
            @endif


            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]['id']]) }}">Varieties</a>
            <a class="dropdown-item" href="{{ route('coins.view', ['id' => $coin['info'][0]['id']]) }}">Grade</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
    </li>
@endpush


@section('content')
    <main>
        <h1 class="mt-2">{{ $variety }}</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('category.view', ['id' => $coin['info'][0]['cat_id']]) }}">{{ $coin['info'][0]['coinCategory'] }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('type.view', ['id' => $coin['info'][0]['type_id']]) }}">{{ $coin['info'][0]['coinType'] }}</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('coins.view', ['id' => $coin['info'][0]['id']]) }}">{{ $coin['info'][0]['coinName'] }}</a>
            </li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Collected</th>
                        <td>11</td>
                        <td>Otto</td>
                        <td>@mdo</td>
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
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                All {{$variety}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>Variety</th>
                            <th>Type</th>
                            <th>Label</th>
                            <th>Designation</th>
                            <th>Group</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Variety</th>
                            <th>Type</th>
                            <th>Label</th>
                            <th>Designation</th>
                            <th>Group</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($varietyList as $variety)
                            <tr>
                                <td>
                                    <a href="{{ route('coins.variety_by_id', ['id' => $variety['id']]) }}">{{ $variety['sub_type'] }}</a>
                                </td>
                                <td><a href="{{ route('coins.varietyType', [
                                                                        'variety' => $variety['variety'],
                                                                        'id' => $variety['coin_id']
                                                                        ]) }}">{{ $variety['variety'] }}</a></td>
                                <td>
                                    <a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['label'] }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['designation'] }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['grouping'] }}</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>



    <home-component></home-component>
@endsection
@push('scripts')
    <script>
        console.log('ready');
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
