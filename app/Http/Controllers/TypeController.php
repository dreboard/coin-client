<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class TypeController extends Controller
{

    private $typeRepository;
    private $client;

    /**
     * Create a new controller instance.
     *
     * @param TypeRepository $typeRepository
     */
    public function __construct(TypeRepository $typeRepository)
    {
        $this->middleware('auth');
        $this->typeRepository = $typeRepository;
        $this->client = new Client(['base_uri' => env('API_URL')]);
    }


    /**
     * Create Type home page data
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(int $id)
    {
        try{

            $response = $this->client->request('POST', 'type/view', ['form_params' => [
                'id' => $id,
            ]]);
            $data = json_decode($response->getBody(), true);

            return view('back.types.index', [
                'typeInfo' => $data['typeInfo'],
                'typeCoins' => $data['typeCoins'],
                'typeLink' =>  $data['typeLink'],
                'typeCount' =>  $data['typeCount'],
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Type could not be found');
        }

    }
}
