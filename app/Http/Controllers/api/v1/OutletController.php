<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Api\ApiCrudHandler;
use App\Requests\OutletRequest;
use App\Models\Outlet;
use Illuminate\Http\Response;
use Validator;

class OutletController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }

    public function index(Request $request)
    {
        try {
            $modelData = $this->apiCrudHandler->index($request, Outlet::class);
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @param OutletRequest $request
     * @return Array
     */
    public function store(OutletRequest $request)
    {
        try {
            $modelData = $this->apiCrudHandler->store($request, Outlet::class);
            return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @param $id
     * @param OutletRequest $request
     * @param Outlet $outlet
     * @return Array
     */
    public function update($id, OutletRequest $request, Outlet $outlet)
    {
        //If ID then update, else create
        try {
            $request->request->add(['id' => $id]);
            $modelData = $this->apiCrudHandler->update($request, Outlet::class);
            return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id, Outlet $outlet)
    {
        try {
            $delete = $this->apiCrudHandler->delete($id, Outlet::class);
            return $this->sendResponse($delete);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
