@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <div class="float-left">
        <ol class="breadcrumb year-breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('coins.year', ['coinYear' => $coins['prevYear']]) }}">{{ $coins['prevYear'] }}</a>
            </li>
            <li class="breadcrumb-item active">{{ $coins['currentYear'] }}</li>
            <li class="breadcrumb-item">
                <a href="{{ route('coins.year', ['coinYear' => $coins['nextYear']]) }}">{{ $coins['nextYear'] }}</a>
            </li>
        </ol>
    </div>
    <div class="float-right">
        <form action="{{ route('coins.year') }}" method="get" class="form-inline">
            <table width="100%" border="0">
                <tr class="setThreeRow">
                    <td> <select name="century" class="form-control">
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select></td>
                    <td><select name="theYear" class="form-control">
                            <option value="00">00</option>
                            <?php
                            for ($num = 1; $num <= 99; $num++) {
                                if($num<10)
                                    $day = "0$num"; // add the zero
                                else
                                    $day = "$num"; // don't add the zero
                                echo "<option value=".$day.">".$day."</option>";
                            }
                            ?>
                        </select></td>
                    <td><button name="getYear" type="submit" class="btn btn-primary">Go</button></td>
                </tr>
            </table>
        </form>
    </div>

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
                <a href="{{ route('coins.year', ['coinYear' => $coins['currentYear']]) }}" class="btn btn-primary">Add</a>
            </td>
        </tr>
        </tbody>
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
                        <th>Coin</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Denomination</th>
                        <th>Collected</th>
                        <th>Investment</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Coin</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Denomination</th>
                        <th>Collected</th>
                        <th>Investment</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($coins['list'] as $coin)
                        <tr>
                            <td><a href="{{ route('coins.view', ['id' => $coin->id]) }}">{{ $coin->coinName }}</a></td>
                            <td><a href="{{ route('types', ['id' => $coin->type_id]) }}">{{ $coin->coinType }}</a></td>
                            <td><a href="{{ route('categories', ['id' => $coin->cat_id]) }}">{{ $coin->coinCategory }}</a></td>
                            <td><a href="{{ route('categories', ['id' => $coin->cat_id]) }}">{{ $coin->denomination }}</a></td>
                            <td>53</td>
                            <td>$114,500</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

@endsection
@push('scripts')
    <script>
        console.log('ready');
        $(document).ready(function() {
            $('#dataTable').DataTable( {
                "order": [[ 3, "asc" ]]
            } );
        });
    </script>
@endpush

