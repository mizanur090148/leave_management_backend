<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\ApiCrudHandler as ApiCrudHandler;
use App\Models\Sell;
use App\Models\Settings\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Requests\SellRequest;

class SellController extends BaseController
{
    /**
     * @var ApiCrudHandler
     */
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }

    public function index(Request $request)
    {
        try {
        	$subCategories = SubCategory::with('category')->get();
        	return $this->sendResponse($subCategories);
        } catch (Exception $e) {
        	return $this->sendError($e->getMessage());
        }
    }

    public function store(SellRequest $request)
    {
        try {
            $modelData = $this->apiCrudHandler->store($request, Sell::class);
            $modelData = $modelData->load('subCategory');
            return $this->sendResponse($modelData);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
