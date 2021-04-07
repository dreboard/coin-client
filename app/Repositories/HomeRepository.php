<?php


namespace App\Repositories;

use App\Models\Index;

class HomeRepository
{
    /**
     * @var Index
     */
    private Index $coinModel;

    public function __construct()
    {
        $this->indexModel = new Index;
    }
    /**
     * @return array
     */
    public function getHomePage()
    {
        return $this->indexModel->getCategoriesList();
    }
}
