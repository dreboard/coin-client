<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
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
                @foreach ($coin['varietyList'] as $variety)
                    <tr>
                        <td><a href="{{ route('coins.variety_by_id', ['id' => $variety['id']]) }}">{{ $variety['sub_type'] }}</a></td>
                        <td><a href="{{ route('coins.varietyType', [
                                                                        'variety' => $variety['variety'],
                                                                        'id' => $variety['coin_id']
                                                                        ]) }}">{{ $variety['variety'] }}</a></td>
                        <td><a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['label'] }}</a></td>
                        <td><a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['designation'] }}</a></td>
                        <td><a href="{{ route('coins.variety', ['id' => $variety['id']]) }}">{{ $variety['grouping'] }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
