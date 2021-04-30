<?php

namespace App\Http\Controllers;

use Facades\App\Repositories\CategoryRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryController extends Controller
{

    private Client $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('API_URL')]);
    }

    /**
     * Create Category home page data
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(int $id)
    {
        try{

            $response = $this->client->request('POST', 'category/view', ['form_params' => [
                'id' => $id,
            ]]);
dd(json_decode($response->getBody(), true));
            $category = CategoryRepository::getById($id);
            $types = CategoryRepository::getTypeAllCache($id);

            return view('back.categories.index', [
                'types' => $types,
                'category' => $category
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Category could not be requested');
        }

    }
}
