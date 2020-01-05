<?php

namespace App\Http\Controllers;

use App\Repositories\CoinVarietyRepository;
use App\Repositories\CollectedRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
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
        CollectedRepository $collectedRepository)
    {
        $this->coinVarietyRepository = $coinVarietyRepository;
        $this->collectedRepository = $collectedRepository;
    }


    public function index(int $id)
    {
        try{
            $coin = $this->coinVarietyRepository->coinVarietyGetByID($id);
            $typeLink = str_replace(' ', '_', $coin[0]->coinType);
            $collected = $this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            Debugbar::info($coin);
            return view('back.coins.varieties.index', [
                'coin' => $coin,
                'typeLink' =>  $typeLink,
                'collected' => $collected
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            Debugbar::addThrowable($e);
            return redirect('home')->with('status', 'Your request is not valid');
        }



    }
}
