<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CoinHelper;
use App\Repositories\CoinVarietyRepository;
use App\Repositories\CollectedRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
use App\Repositories\CoinRepository;
use GuzzleHttp\Client;
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
        $this->client = new Client(['base_uri' => env('API_URL')]);
    }


    public function index(int $id)
    {
        try{
            $response = $this->client->request('POST', 'coins/varietyId', ['form_params' => [
                'variety_id' => $id,
            ]]);
            $coin = json_decode($response->getBody(), true);
            dd($coin);
            return view('back.coins.varieties.id', [
                'coin' => $coin,
                //'typeLink' =>  $typeLink,
                //'collected' => $collected
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage().''.$e->getFile().''.$e->getLine());
            return redirect('home')->with('status', 'Coin could not be found');
        }
        try{
            $coin['info'] = $this->coinVarietyRepository->coinVarietyGetByID($id);
            $coin['placeHolderNumber'] = 1;
            $coin['collected'] = CoinHelper::collected();  //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            $coin['typeLink'] = str_replace(' ', '_', $coin['info'][0]->coinType);
            //dd($coin);
            return view('back.coins.varieties.index', [
                'coin' => $coin,
                //'typeLink' =>  $typeLink,
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            Debugbar::addThrowable($e);
            return redirect('home')->with('status', 'Your request is not valid');
        }
    }

    public function viewByID(int $id)
    {

        $response = $this->client->request('POST', 'coins/variety_by_id', ['form_params' => [
            'id' => $id,
        ]]);
        $coin = json_decode($response->getBody(), true);
        dd($coin);
        return view('back.coins.varieties.id', [
            'coin' => $coin,
            //'typeLink' =>  $typeLink,
            //'collected' => $collected
        ]);


        try{
            $coin['info'] = $this->coinVarietyRepository->coinVarietyGetByID($id);
            $coin['collected'] = CoinHelper::collected(); //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            $coin['placeHolderNumber'] = 1;
            $coin['typeLink'] = str_replace(' ', '_', $coin['info'][0]->coinType);
            //
            Debugbar::info($coin);
            return view('back.coins.varieties.id', [
                'coin' => $coin,
                //'typeLink' =>  $typeLink,
                //'collected' => $collected
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
            $response = $this->client->request('POST', 'coins/varietyType',
                ['form_params' =>
                    [
                        'variety' => $variety,
                        'coin_id' => $id
                    ]
                ]);
            //dd($response->getBody()->getContents());
            //dd(json_decode($response->getBody(), true));

            $array = json_decode($response->getBody(), true);
            Debugbar::info($array);
            return view('back.coins.varieties.type', [
                'coin' => $array['coin'],
                'variety' => $array['variety'],
                'varietyList' =>  $array['varietyList'],
                'collected' => $array['collected']
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            Debugbar::addThrowable($e);
            return redirect('home')->with('status', 'Your request is not valid');
        }
    }
}
