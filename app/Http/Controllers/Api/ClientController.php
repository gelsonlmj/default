<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller\Api;
use Illuminate\Http\Request;
use App\Services\ClientService;

class ClientController extends Controller
{

    /**
     * @var ClientService
     */
    public $clientService;

    public function __construct()
    {
        $this->clientService = new ClientService();
    }

    public function create(Request $request)
    {
        try {
            return $this->responseDataSuccess(
                $this->clientService->create($request->all())
            );
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function list()
    {
        try {
            return $this->responseDataSuccess(
                $this->clientService->getLatest()
            );
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function searchByFilters(Request $request)
    {
        try {
            return $this->responseDataSuccess(
                $this->clientService->searchByFilters($request->all())
            );
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->responseSuccess(
                $this->clientService->delete($id)
            );
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

}
