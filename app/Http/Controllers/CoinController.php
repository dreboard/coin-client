<?php

namespace App\Http\Controllers;

use Facades\App\Repositories\CoinVarietyRepository;
use Facades\App\Repositories\CoinRepository;
use Facades\App\Repositories\CoinYearRepository;
use App\Repositories\CollectedRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class CoinController
 * @package App\Http\Controllers
 */
class CoinController extends Controller
{
    private Client $client;

    /**
     * CoinController constructor.
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('API_URL')]);
    }


    public function coinID(int $id)
    {
        try {
            $response = $this->client->request('POST', 'coins/view', ['form_params' => [
                'id' => $id,
            ]]);
            $coin = json_decode($response->getBody(), true);
            return view('back.coins.index', [
                'coin' => $coin['coin']
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'The requested coin was not found');
        }

    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function coinsByYear(Request $request)
    {
        try{
            if ($request->has(['century', 'theYear'])) {
                $coinYear = $request->input('century').$request->input('theYear');
            } else {
                $coinYear = $request->input('coinYear');
            }

            $coins = CoinYearRepository::getCoinsByYear($coinYear);
            return view('back.coins.by_year', [
                'coins' => $coins
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Year could not be loaded');
        }

    }

    public function add($id)
    {
        try{
            $coin = CoinRepository::coinsGetByID($id);
            $coins = CoinRepository::getCoins($id);
            $varieties = CoinRepository::getCoinVarieties($id);
            $subTypes = CoinRepository::getSubTypes($id);

            $typeLink = str_replace(' ', '_', $coin[0]->coinType);
            $varietyList = CoinRepository::listCoinVarieties($id);
            $distinctVarieties = CoinVarietyRepository::getVarietyList($id);
dd($distinctVarieties);
            return view('back.coins.add', [
                'coin' => $coin,
                'coins' => $coins,
                'varieties' => $varieties,
                'typeLink' =>  $typeLink,
                'subTypes' =>  $subTypes,
                'varietyList' =>  $varietyList,
                'distinctVarieties' =>  $distinctVarieties,
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Coin could not be added');
        }
    }


    public function gradesByID(int $id)
    {
        try {
            $response = $this->client->request('POST', 'coins/view', ['form_params' => [
                'id' => $id,
            ]]);
            $coin = json_decode($response->getBody(), true);
            return view('back.reports.grade', [
                'coin' => $coin['coin']
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'The requested coin was not found');
        }

    }

}
