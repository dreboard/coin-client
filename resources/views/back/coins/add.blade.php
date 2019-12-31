@extends("layouts.main")
@push("styles")
    <style>
        #newCoinForm {
            padding: 20px;
        }
        .side-varieties {
            height: 300px;
            overflow: scroll;;
        }
    </style>

@endpush
@push("nav")
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pages:</h6>
            <a class="dropdown-item" href="{{ route("coins.view", ["id" => $coin[0]->id]) }}">Errors</a>
            <a class="dropdown-item" href="{{ route("coins.view", ["id" => $coin[0]->id]) }}">Color</a>
            <a class="dropdown-item" href="{{ route("coins.view", ["id" => $coin[0]->id]) }}">Varieties</a>
            <a class="dropdown-item" href="{{ route("coins.view", ["id" => $coin[0]->id]) }}">Grade</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
    </li>
@endpush

@section("content")
    <!-- Page Content -->
    <h5>Add {{ $coin[0]->coinName }} {{ $coin[0]->coinType }} </h5>
        <div>
            <select id="addSwitch" class="form-control">
                <option value="None" selected="selected">Switch</option>
                @foreach ($coins as $type)
                    <option value="{{ route("coins.add", ["id" => $type->coin_id]) }}">{{ $type->coinName }}</option>
                @endforeach
            </select>
        </div>
    <form id="newCoinForm">
        @csrf
        <div class="row">
            <div class="col-8">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="coinNickname">Nickname</label>
                    <div class="col-sm-10">
                        <input name="coinNickname" type="text" class="form-control"
                               id="coinNickname" placeholder="Name for coin">
                    </div>
                </div>

                @if (count($subTypes) !== 1)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="majVariety">Major Variety</label>
                    <div class="col-sm-10">
                        <select name="majVariety" class="form-control" id="majVariety">
                            <option value="None" selected="selected">No Variety</option>
                            @foreach ($subTypes as $sub)
                                <option value="{{ $sub->sub_type }}" @if ($sub->sub_type === "None")selected @endif>{{ $sub->sub_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                    <input type="hidden" name="majVariety" value="None">
                @endif
                @if ($coin[0]->byMint === '1')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="strikeType">Strike Type</label>
                        <div class="col-sm-10">
                            <select name="strikeType" class="form-control" id="strikeType">
                                <option value="Regular Strike" selected="selected">Regular Strike</option>
                                <option value="Uncirculated Strike">Uncirculated Strike (Mint Set)</option>
                                <option value="Special Strike">Special Strike (Mint Set)</option>
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="strikeType" value="None">
                @endif




                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="coinGrade">Grading</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <select name="coinGrade" class="form-control" id="coinGrade">
                                            <option value="No Grade" selected="selected">No Grade</option>
                                            @switch($coin[0]->strike)
                                                @case("Business")
                                                @case("Uncirculated")
                                                <option value="B0">(B-0) Basal 0</option>
                                                <option value="P1">(PO-1) Poor</option>
                                                <option value="FR2">(FR-2) Fair</option>
                                                <option value="AG3">(AG-3) About Good</option>
                                                <option value="G4">(G-4) Good</option>
                                                <option value="G6">(G-6) Good</option>
                                                <option value="VG8">(VG-8) Very Good</option>
                                                <option value="VG10">(VG-10) Very Good</option>
                                                <option value="F12">(F-12) Fine</option>
                                                <option value="F15">(F-15) Fine</option>
                                                <option value="VF20">(VF-20) Very Fine</option>
                                                <option value="VF25">(VF-25) Very Fine</option>
                                                <option value="VF30">(VF-30) Very Fine</option>
                                                <option value="VF35">(VF-35) Very Fine</option>
                                                <option value="EF40">(EF-40) Extremely Fine</option>
                                                <option value="EF45">(EF-45) Extremely Fine</option>
                                                <option value="AU50">(AU-50) About Uncirculated</option>
                                                <option value="AU55">(AU-55) About Uncirculated</option>
                                                <option value="AU58">(AU-58) Very Choice About Uncirculated</option>

                                                <option value="MS60">(MS-60) Mint State Basal</option>
                                                <option value="MS61">(MS-61) Mint State Acceptable</option>
                                                <option value="MS62">(MS-62) Mint State Acceptable</option>
                                                <option value="MS63">(MS-63) Mint State Acceptable</option>
                                                <option value="MS64">(MS-64) Mint State Acceptable</option>
                                                <option value="MS65">(MS-65) Mint State Choice</option>
                                                <option value="MS66">(MS-66) Mint State Choice</option>
                                                <option value="MS67">(MS-67) Mint State Choice</option>
                                                <option value="MS68">(MS-68) Mint State Premium</option>
                                                <option value="MS69">(MS-69) Mint State All-But-Perfect</option>
                                                <option value="MS70">(MS-70) Mint State Perfect</option>
                                                @break
                                                @case("Special Mint")
                                                @case("Satin Finish")
                                                @case("Enhanced Uncirculated")
                                                <option value="B0">(B-0) Basal 0</option>
                                                <option value="P1">(PO-1) Poor</option>
                                                <option value="FR2">(FR-2) Fair</option>
                                                <option value="AG3">(AG-3) About Good</option>
                                                <option value="G4">(G-4) Good</option>
                                                <option value="G6">(G-6) Good</option>
                                                <option value="VG8">(VG-8) Very Good</option>
                                                <option value="VG10">(VG-10) Very Good</option>
                                                <option value="F12">(F-12) Fine</option>
                                                <option value="F15">(F-15) Fine</option>
                                                <option value="VF20">(VF-20) Very Fine</option>
                                                <option value="VF25">(VF-25) Very Fine</option>
                                                <option value="VF30">(VF-30) Very Fine</option>
                                                <option value="VF35">(VF-35) Very Fine</option>
                                                <option value="EF40">(EF-40) Extremely Fine</option>
                                                <option value="EF45">(EF-45) Extremely Fine</option>
                                                <option value="AU50">(AU-50) About Uncirculated</option>
                                                <option value="AU55">(AU-55) About Uncirculated</option>
                                                <option value="AU58">(AU-58) Very Choice About Uncirculated</option>

                                                <option value="SP60">(SP-60) Mint State Basal</option>
                                                <option value="SP61">(SP-61) Mint State Acceptable</option>
                                                <option value="SP62">(SP-62) Mint State Acceptable</option>
                                                <option value="SP63">(SP-63) Mint State Acceptable</option>
                                                <option value="SP64">(SP-64) Mint State Acceptable</option>
                                                <option value="SP65">(SP-65) Mint State Choice</option>
                                                <option value="SP66">(SP-66) Mint State Choice</option>
                                                <option value="SP67">(SP-67) Mint State Choice</option>
                                                <option value="SP68">(SP-68) Mint State Premium</option>
                                                <option value="SP69">(SP-69) Mint State All-But-Perfect</option>
                                                <option value="SP70">(SP-70) Mint State Perfect</option>

                                                @break
                                                @case("Proof")
                                                @case("Reverse Proof")
                                                @case('Matte Proof')
                                                <option value="PR35">(PR-35) Impaired Proof.</option>
                                                <option value="PR40">(PR-40) Impaired Proof.</option>
                                                <option value="PR45">(PR-45) Impaired Proof.</option>
                                                <option value="PR50">(PR-50) Impaired Proof.</option>

                                                <option value="PR55">(PR-55) Impaired Proof.</option>
                                                <option value="PR58">(PR-58) Impaired Proof.</option>
                                                <option value="PR60">(PR-60) Brilliant Proof.</option>
                                                <option value="PR61">(PR-61) Brilliant Proof.</option>
                                                <option value="PR62">(PR-62) Brilliant Proof.</option>
                                                <option value="PR63">(PR-63) Brilliant Proof.</option>
                                                <option value="PR64">(PR-64) Brilliant Proof.</option>
                                                <option value="PR65">(PR-65) Gem Proof.</option>
                                                <option value="PR66">(PR-66) Choice Gem Proof.</option>
                                                <option value="PR67">(PR-67) Extraordinary Proof.</option>
                                                <option value="PR68">(PR-68) Extraordinary Proof.</option>
                                                <option value="PR69">(PR-69) Extraordinary Proof.</option>
                                                <option value="PR70">(PR-70) Perfect Proof.</option>
                                                @break

                                                @default
                                                ...
                                            @endswitch
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <select name="proService" class="form-control" id="proService">
                                                    <option value="None" selected="selected">No 3rd Party Grading</option>
                                                    <option id="pcgs" value="PCGS">PCGS (Professional Coin Grading Service)</option>
                                                    <option value="ICG">ICG (Independent Coin Grading Company)</option>
                                                    <option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
                                                    <option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
                                                    <option value="SEGS">SEGS (Sovereign Entities Grading Service Inc)</option>
                                                    <option value="PCI">PCI</option>
                                                    <option value="ICCS">ICCS (International Coin Certification Service )</option>
                                                    <option value="HALLMARK">HALLMARK</option>
                                                    <option value="NTC">NTC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(true)
                                <div class="col-6 pro-additional">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <select name="proNoGrade" class="form-control" id="proNoGrade">
                                                <option value="No Grade" selected="selected">Branch Mint</option>
                                                <option value="Branch Mint">Branch Mint (BM) Struck well like a Proof</option>
                                                <option value="Branch Mint Cameo">Branch Mint Cameo (BMCA)</option>
                                                <option value="Sample">Sample</option>
                                                <option value="Authentic">Authentic</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-6 pro-additional">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <select name="proNoGrade" class="form-control" id="proNoGrade">
                                            <option value="No Grade" selected="selected">No Grades</option>
                                            <option value="Specimen">Specimen (SP) Struck well like a Proof</option>
                                            <option value="Genuine">Genuine</option>
                                            <option value="Sample">Sample</option>
                                            <option value="Authentic">Authentic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 pro-additional">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <select name="proFirst" class="form-control" id="proFirst">
                                                    <option value="None" selected="selected">No Label</option>
                                                    <option value="FIRST DAY OF ISSUE">FIRST DAY OF ISSUE</option>
                                                    <option value="FIRST DAY CEREMONY">FIRST DAY CEREMONY</option>
                                                    <option value="FIRST YEAR OF ISSUE">FIRST YEAR OF ISSUE</option>
                                                    <option value="FIRST STRIKES">FIRST STRIKES</option>
                                                    <option value="NUMBERED FIRST STRUCK EDITION">NUMBERED FIRST STRUCK EDITION</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @if(in_array($coin[0]->coinCategory, config("coins.colorCategories")))
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="color">Color</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color">
                                <option value="None" selected="selected">None</option>
                                <option value="BN">Brown (BN)</option>
                                <option value="RB">Red Brown (RB)</option>
                                <option value="RB">Red (RD))</option>
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="color" value="None">
                @endif

                @if (in_array($coin[0]->coinType, config("coins.fullTypes")))
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="fullAtt">Full</label>
                        <div class="col-sm-10">
                            <select name="fullAtt" class="form-control" id="fullAtt">
                                <option value="None" selected="selected">None</option>
                                @if (in_array($coin[0]->coinType, ["Winged Liberty Dime"]))
                                    <option value="Full Bands">Full Bands (FB)</option>
                                @endif
                                @if ($coin[0]->coinType === "Roosevelt Dime")
                                    <option value="Full Torch">Full Torch (FB)</option>
                                @endif
                                @if ($coin[0]->coinType === "Jefferson Nickel")
                                    <option value="Full Steps">Full Steps (FS)</option>
                                    <option value="Five Full Steps">Five Full Steps (5FS)</option>
                                    <option value="Six Full Steps">Six Full Steps (6FS)</option>
                                @endif
                                @if ($coin[0]->coinType === "Standing Liberty")
                                    <option value="Full Head">Full Head (FH)</option>
                                @endif
                                @if ($coin[0]->coinType === "Franklin Half Dollar")
                                    <option value="Full Bell Lines">Full Bell Lines (FBL)</option>
                                @endif
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="fullAtt" value="None">
                @endif
                @if ($coin[0]->strike === "Business" && $coin[0]->coinType !== "Morgan Dollar")

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="appearance">Apperance</label>
                        <div class="col-sm-10">
                            <select name="appearance" class="form-control" id="appearance">
                                <option value="None" selected="selected">None</option>
                                @if (in_array($coin[0]->coinCategory, config("coins.colorCategories")))

                                    @switch($coin[0]->strike)
                                        @case("Business")
                                        @case("Uncirculated")
                                        @case("Special Mint")
                                        @case("Satin Finish")
                                        @case("Enhanced Uncirculated")
                                        <option value="DPL">Deep Prooflike</option>
                                        <option value="Prooflike">Prooflike</option>
                                        @break
                                        @case("Proof")
                                        @case("Reverse Proof")
                                        <option value="BRILLIANT">Brilliant</option>

                                        @if($coin[0]->coinYear >= 1909 && $coin[0]->coinYear <= 1916)
                                            <option value="MATTE">Matte</option>
                                        @endif

                                        <option value="SATIN">Satin</option>

                                    @endswitch
                                    <option class="anacs" value="Prooflike">Ultra Deep Mirror Prooflike</option>
                                    <option value="Prooflike">Deep Mirror Prooflike</option>
                                    <option value="Prooflike">Deep Prooflike</option>
                                    <option value="Prooflike">Prooflike</option>
                                @else

                                    <option value="ULTRA CAMEO">Ultra Cameo</option>

                                    @if($coin[0]->coinYear >= 1950 && $coin[0]->coinYear <= 1970)

                                    @endif
                                    <option value="Prooflike">Prooflike (PL)</option>
                                    <option value="Deep Prooflike">Deep Prooflike (DPL)</option>
                                    <option value="UPL">Ultra Prooflike (UPL)</option>
                                    <option value="CAMEO">Cameo</option>
                                    <option value="ULTRA CAMEO">Deep Cameo</option>
                                    Branch Mint Proof BM
                                    Branch Mint Cameo BMCA
                                    First Strike FS
                                    Specimens SP
                                @endif
                            </select>
                        </div>
                    </div>

                @elseif ($coin[0]->coinType === "Morgan Dollar" && $coin[0]->strike === "Business")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="appearance">Proof Like</label>
                        <div class="col-sm-10">
                            <select name="appearance" class="form-control" id="appearance">
                                <option value="None" selected="selected">None</option>
                                <option value="Semi-Prooflike">Semi-Prooflike (SPL)</option>
                                <option value="Prooflike">Prooflike (PL)</option>
                                <option value="Deep Mirror Proof Like">Deep Mirror Proof Like (DMPL)</option>
                                <option value="Ultra Prooflike">Ultra Prooflike (UPL)</option>
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="appearance" value="None">
                @endif
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">Additional</label>
                    <div class="col-sm-10">
                        <select name="fullAtt" class="form-control" id="fullAtt">
                            <option value="None" selected="selected">None</option>
                            <option value="FIRST DAY OF ISSUE">FIRST DAY OF ISSUE</option>
                            <option value="FIRST DAY CEREMONY">FIRST DAY CEREMONY</option>
                            <option value="FIRST YEAR OF ISSUE">FIRST YEAR OF ISSUE</option>
                            <option value="FIRST STRIKES">FIRST STRIKES</option>
                            <option value="NUMBERED FIRST STRUCK EDITION">NUMBERED FIRST STRUCK EDITION</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">XXXXXX</label>
                    <div class="col-sm-10">
                        <select name="fullAtt" class="form-control" id="fullAtt">
                            <option value="None" selected="selected">None</option>
                            <option value="RB">Recolor</option>
                            <option value="RD">Reolor</option>
                            <option value="SP">Specimenroof</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">XXXXXX</label>
                    <div class="col-sm-10">
                        <select name="fullAtt" class="form-control" id="fullAtt">
                            <option value="None" selected="selected">None</option>
                            <option value="RB">Recolor</option>
                            <option value="RD">Reolor</option>
                            <option value="SP">Specimenroof</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">Purchase</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="purchasePrice" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input name="purchasePrice" type="text" class="form-control" id="purchasePrice" placeholder="Purchase Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">From</label>
                                    <div class="col-sm-10">
                                        <select name="fullAtt" class="form-control" id="fullAtt">
                                            <option value="None" selected="selected">None</option>
                                            <option value="U.S Mint">U.S Mint</option>
                                            <option value="Coin Shop">Coin Shop</option>
                                            <option value="eBay">eBay</option>
                                            <option value="Coin Show">Coin Show</option>
                                            <option value="Website">Website</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="merchantName" class="col-sm-2 col-form-label">Merchant</label>
                                    <div class="col-sm-10">
                                        <input name="merchantName" type="text" class="form-control" id="merchantName" placeholder="ebay seller or store">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">Damage</label>
                    <div class="col-sm-10">

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input name="cleaned" class="form-check-input" type="checkbox" value="" id="cleaned">
                                    <label class="form-check-label" for="cleaned">
                                        Cleaned
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="holed" class="form-check-input" type="checkbox" value="" id="holed">
                                    <label class="form-check-label" for="holed">
                                        Holed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="altered" class="form-check-input" type="checkbox" value="" id="altered">
                                    <label class="form-check-label" for="altered">
                                        Altered
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input name="bent" class="form-check-input" type="checkbox" value="" id="bent">
                                    <label class="form-check-label" for="bent">
                                        Bent
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="scratched" class="form-check-input" type="checkbox" value="" id="scratched">
                                    <label class="form-check-label" for="scratched">
                                        Scratched
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="pvc" class="form-check-input" type="checkbox" value="" id="pvc">
                                    <label class="form-check-label" for="pvc">
                                        PVC Damage
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input name="corrosion" class="form-check-input" type="checkbox" value="" id="corrosion">
                                    <label class="form-check-label" for="corrosion">
                                        Corrosion
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="plugged" class="form-check-input" type="checkbox" value="" id="plugged">
                                    <label class="form-check-label" for="plugged">
                                        Plugged
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="polished" class="form-check-input" type="checkbox" value="" id="polished">
                                    <label class="form-check-label" for="polished">
                                        Polished
                                    </label>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="color">Errors</label>
                    <div class="col-sm-10">


                    </div>
                </div>


                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button id="newCoinFormBtn" type="submit" class="btn btn-primary">Submit</button>

            </div>{{-- end form--}}
            <div class="col-4">
                <h5>* Varieties</h5>

                <div class="side-varieties">

                    @foreach ($distinctVarieties as $variety)
                        <ul class="form-check">
                            <li>{{$variety->variety}}</li>
                        </ul>


                    @endforeach
                    @foreach ($varieties as $variety)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $variety->id }}" id="variety{{ $variety->id }}">
                            <label class="form-check-label" for="variety{{ $variety->id }}">
                                @if (in_array($coin[0]->coinType, config("coins.seatedTypes")))
                                    {{ $variety->sub_type }} {{ $variety->designation }}
                                @elseif(in_array($coin[0]->coinType, config("coins.snowTypes")))
                                    {{ $variety->sub_type }} {{ $variety->variety }} {{ $variety->label }}
                                @elseif(in_array($coin[0]->coinType, config("coins.vamTypes")))
                                    {{ $variety->sub_type }} {{ $variety->variety }} {{ $variety->label }}
                                @else
                                    {{ $variety->sub_type }} {{ $variety->variety }} {{ $variety->label }}
                                @endif

                            </label>
                        </div>
                    @endforeach
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Variety</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
        </div>
    </form>





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
                <a href="{{ route("coins.year", ["coinYear" => $coin[0]->coinYear]) }}"
                   class="btn btn-primary">{{ $coin[0]->coinYear }}</a> | <a
                    href="{{ route("coins.add", ["id" => $coin[0]->id]) }}" class="btn btn-primary">Add</a>
            </td>
        </tr>
        </tbody>
    </table>


    <table width="100%" border="0">
        <tr>
            <td class="darker">Type</td>
            <td colspan="2"><a href="Small_Cent.php">Small Cent </a><a
                    href="viewCoinType.php?coinType=Lincoln_Memorial"><strong>(138 Collected)</strong></a></td>
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
            <td><a title="View Number Of Certified Coins"
                   href="viewCertTypeReport.php?coinType=Lincoln_Memorial"><strong>91</strong></a></td>
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

    @includeIf("back.types.info.{$typeLink}", ["subTypes" => $subTypes, "varietyList" => $varietyList])
    <hr>

@endsection
@push("scripts")
    <script>
        $(document).ready(function () {
            $("#addSwitch").change(function() {
                window.location = $(":selected",this).attr("value")
            });
        });
    </script>
@endpush

