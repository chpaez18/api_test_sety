<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;

use App\Http\Controllers\ApiController;
use App\Services\ImportService;

class ExcelController extends ApiController
{
    public $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    /**
     * Import excel data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        try {
            //Call import service
            //-------------------------------------------------------
                $this->importService->importExcel($request);
            //-------------------------------------------------------
            return $this->successResponse('the excel file information was successfully imported/updated.', 200);

        } catch (Exception $exception) {

            throw $exception;

        }
    }

}