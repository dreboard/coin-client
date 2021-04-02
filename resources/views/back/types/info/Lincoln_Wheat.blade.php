<style>



</style>




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
                    <th>Position</th>
                    <th>Designation</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Variety</th>
                    <th>Position</th>
                    <th>Designation</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($varieties as $variety)
                    <tr>
                        <td><a href="{{ route('coins.variety', ['id' => $variety->id]) }}">{{ $variety->sub_type }}</a></td>
                        <td><a href="{{ route('coins.variety', ['id' => $variety->id]) }}">{{ $variety->variety }}</a></td>
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
</div>
