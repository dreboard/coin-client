@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <h1>Home Page</h1>
    <hr>

    <div class="table-responsive">
        <table class="table">
            <tr class="setFourRow">
                <td width="25%"><strong>Century/Year</strong></td>
                <td width="25%"><strong>By Metal/Strike</strong></td>
                <td width="25%"><strong>By Design</strong></td>
                <td width="25%"><strong>Key/Semi Key</strong></td>
            </tr>
            <tr class="setFourRow">
                <td class="setFourRow" valign="middle">
                    <form action="{{ route('coins.year') }}" method="get" class="compactForm">
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
                    </form></td>
                <td><a href="Silver_Dollar.php" class="btn btn-default btn-lg btn-block">Silver</a></td>
                <td><a href="reportDesign.php?design=Liberty_Cap" class="btn btn-default btn-lg btn-block">Liberty Cap</a></td>
                <td><a href="viewKeyReport.php" class="btn btn-default btn-lg btn-block">All</a></td>
            </tr>
            <tr class="setFourRow" valign="middle">
                <td><a href="reportEighteenth.php" class="btn btn-default btn-lg btn-block">18th Century</a></td>
                <td><a href="reportGold.php" class="btn btn-default btn-lg btn-block">Gold</a></td>
                <td><a href="reportDesign.php?design=Draped_Bust" class="btn btn-default btn-lg btn-block">Draped Bust</a></td>
                <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <option selected="selected" value="report.php">By Category</option>
                        <option value="viewKeyCategory.php?coinCategory=Half_Cent">Half Cents</option>
                        <option value="viewKeyCategory.php?coinCategory=Large_Cent">Large Cent</option>
                        <option value="viewKeyCategory.php?coinCategory=Small_Cent">Small Cents</option>
                        <option value="viewKeyCategory.php?coinCategory=Two_Cent">Two Cent</option>
                        <option value="viewKeyCategory.php?coinCategory=Three_Cent">Three Cent</option>
                        <option value="viewKeyCategory.php?coinCategory=Half_Dime">Half Dime</option>
                        <option value="viewKeyCategory.php?coinCategory=Nickel">Nickel</option>
                        <option value="viewKeyCategory.php?coinCategory=Dime">Dime</option>
                        <option value="viewKeyCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
                        <option value="viewKeyCategory.php?coinCategory=Quarter">Quarter</option>
                        <option value="viewKeyCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
                        <option value="viewKeyCategory.php?coinCategory=Dollar">Dollar</option>
                    </select></td>
            </tr>
            <tr class="setFourRow">
                <td valign="middle"><a href="reportNineteenth.php" class="btn btn-default btn-lg btn-block">19th Century</a></td>
                <td valign="middle"><a href="Platinum_American_Eagle.php" class="btn btn-default btn-lg btn-block">Platinum</a></td>
                <td><a href="reportDesign.php?design=Seated_Liberty" class="btn btn-default btn-lg btn-block">Seated Liberty</a></td>
                <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <option selected="selected" value="report.php">By Type</option>
                        <optgroup label="Half Cents">
                            <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
                            <option value="viewKeyType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
                            <option value="viewKeyType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
                            <option value="viewKeyType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
                        </optgroup>
                        <optgroup label="Large Cents">
                            <option value="viewKeyType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
                            <option value="viewKeyType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
                            <option value="viewKeyType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
                            <option value="viewKeyType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
                            <option value="viewKeyType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
                            <option value="viewKeyType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
                        </optgroup>
                        <optgroup label="Cents">
                            <option value="viewKeyType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
                            <option value="viewKeyType.php?coinType=Indian_Head">Indian Head Cent</option>
                            <option value="viewKeyType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
                            <option value="viewKeyType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
                            <option value="viewKeyType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
                            <option value="viewKeyType.php?coinType=Union_Shield">Union Shield</option>
                        </optgroup>
                        <optgroup label="Two Cents">
                            <option value="viewKeyType.php?coinType=Two_Cent">Two Cent Piece</option>
                        </optgroup>
                        <optgroup label="Three Cents">
                            <option value="viewKeyType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
                            <option value="viewKeyType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
                        </optgroup>
                        <optgroup label="Half Dimes">
                            <option value="viewKeyType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
                            <option value="viewKeyType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
                            <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
                            <option value="viewKeyType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
                        </optgroup>

                        <optgroup label="Nickels">
                            <option value="viewKeyType.php?coinType=Shield_Nickel">Sheild</option>
                            <option value="viewKeyType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
                            <option value="viewKeyType.php?coinType=Indian_Head_Nickel">Indian Head</option>
                            <option value="viewKeyType.php?coinType=Jefferson_Nickel">Jefferson</option>
                            <option value="viewKeyType.php?coinType=Westward_Journey">Westward Journey</option>
                            <option value="viewKeyType.php?coinType=Return_to_Monticello">Return to Monticello</option>
                        </optgroup>
                        <optgroup label="Dimes">
                            <option value="viewKeyType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
                            <option value="viewKeyType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
                            <option value="viewKeyType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
                            <option value="viewKeyType.php?coinType=Barber_Dime">Barber Dime</option>
                            <option value="viewKeyType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
                            <option value="viewKeyType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
                        </optgroup>
                        <optgroup label="Twenty Cents">
                            <option value="viewKeyType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
                        </optgroup>
                        <optgroup label="Quarters">
                            <option value="viewKeyType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
                            <option value="viewKeyType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
                            <option value="viewKeyType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
                            <option value="viewKeyType.php?coinType=Barber_Quarter">Barber Quarter</option>
                            <option value="viewKeyType.php?coinType=Standing_Liberty">Standing Liberty</option>
                            <option value="viewKeyType.php?coinType=Washington_Quarter">Washington Quarter</option>
                            <option value="viewKeyType.php?coinType=State Quarter">State Quarter</option>
                            <option value="viewKeyType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
                            <option value="viewKeyType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
                        </optgroup>
                        <optgroup label="Half Dollars">
                            <option value="viewKeyType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
                            <option value="viewKeyType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
                            <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
                            <option value="viewKeyType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
                            <option value="viewKeyType.php?coinType=Barber_Half_Dollar">Barber Half</option>
                            <option value="viewKeyType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
                            <option value="viewKeyType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
                            <option value="viewKeyType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
                        </optgroup>
                        <optgroup label="Dollars">
                            <option value="viewKeyType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
                            <option value="viewKeyType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
                            <option value="viewKeyType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
                            <option value="viewKeyType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
                            <option value="viewKeyType.php?coinType=Trade_Dollar">Trade Dollar</option>
                            <option value="viewKeyType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
                            <option value="viewKeyType.php?coinType=Peace_Dollar">Peace Dollar</option>
                            <option value="viewKeyType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
                            <option value="viewKeyType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
                            <option value="viewKeyType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
                            <option value="viewKeyType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
                        </optgroup>
                    </select></td>
            </tr>
            <tr class="setFourRow">
                <td><a href="reportTwentieth.php" class="btn btn-default btn-lg btn-block">20th Century</a></td>
                <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <option selected="selected" value="report.php">Metal Type Sets</option>
                        <option value="viewBullionSets.php">All Bullion Sets</option>
                        <option value="viewSetMetal.php?coinMetal=Copper">Copper</option>
                        <option value="viewSetMetal.php?coinMetal=Clad">Clad</option>
                        <option value="viewSetMetal.php?coinMetal=Silver">Silver</option>
                        <option value="viewSetMetal.php?coinMetal=Gold">Gold</option>
                        <option value="viewSetMetal.php?coinMetal=Platinum">Platinum</option>
                    </select></td>
                <td><a href="reportDesign.php?design=Barber" class="btn btn-default btn-lg btn-block">Barber</a></td>
                <td>&nbsp;</td>
            </tr>
            <tr class="setFourRow">
                <td><a href="reportTwentyfirst.php" class="btn btn-default btn-lg btn-block">21st Century</a></td>
                <td><a href="proof.php" class="btn btn-default btn-lg btn-block"> Proofs</a></td>
                <td><a href="reportDesign.php?design=Flowing_Hair" class="btn btn-default btn-lg btn-block">Flowing Hair</a></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>




    <!-- DataTables Example -->
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
            @foreach ($cats as $cat)
                <tr>
                    <td><a href="{{ route('categories', ['id' => $cat->id]) }}"><img src="http://cdn.dev-php.site/public/img/coins/{!! str_replace(' ', '_', $cat->coinCategory) !!}.jpg" style="width: 40px; height: auto;" class="logo"></a></td>
                    <td><a href="{{ route('categories', ['id' => $cat->id]) }}">{{ $cat->coinCategory }}</a></td>
                    <td>{{ $cat->id }}</td>
                    <td>53</td>
                    <td>2009/10/22</td>
                    <td>$114,500</td>
                </tr>
            @endforeach

            </tbody>
        </table>
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

