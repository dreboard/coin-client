<?php

namespace App\Http\Controllers;

use App\Repositories\CoinVarietyRepository;
use App\Repositories\CollectedRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
use App\Repositories\CoinRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CoinVarietyController extends Controller
{

    /**
     * @var CoinVarietyRepository
     */
    private CoinVarietyRepository $coinVarietyRepository;
    /**
     * @var CollectedRepository
     */
    private CollectedRepository $collectedRepository;

    public function __construct(
        CoinVarietyRepository $coinVarietyRepository,
        CoinRepository $coinRepository,
        CollectedRepository $collectedRepository)
    {
        $this->coinVarietyRepository = $coinVarietyRepository;
        $this->coinRepository = $coinRepository;
        $this->collectedRepository = $collectedRepository;
    }


    public function index(int $id)
    {
        try{
            $coin = $this->coinVarietyRepository->coinVarietyGetByID($id);
            $collected = []; //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            Debugbar::info($coin);
            return view('back.coins.varieties.index', [
                'coin' => $coin,
                //'typeLink' =>  $typeLink,
                'collected' => $collected
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            Debugbar::addThrowable($e);
            return redirect('home')->with('status', 'Your request is not valid');
        }
    }

    public function byType(string $variety, int $id)
    {
        try{
            $varietyList = $this->coinVarietyRepository->getVarietyByType( $id, $variety);
            //dd($varietyList);
            $coin = $this->coinRepository->getIndexPageArray($id);
            $collected = []; //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            Debugbar::info($coin);
            return view('back.coins.varieties.type', [
                'coin' => $coin,
                'variety' => $variety,
                'varietyList' =>  $varietyList,
                'collected' => $collected
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            Debugbar::addThrowable($e);
            return redirect('home')->with('status', 'Your request is not valid');
        }
    }
}
