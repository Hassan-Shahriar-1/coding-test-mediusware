<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositeRequest;
use Illuminate\Http\Request;
use App\Models\Transections;
use App\Services\TransectionService;
use Exception;

class TransectionController extends Controller
{
    private $transection;

    public function __construct(private Transections $transections)
    {
        $this->transection = $transections;
    }

    /**
     * getting all transection list
     * @return object
     */
    public function getAllTransectionList(): object
    {
        try {
            return $this->transection::getTransectionListWithPagination('all', auth()->id());
        } catch (Exception $e) {
            abort(500, 'Something went wrong. Please try again later');
        }
    }

    /**
     * get User Deposite List
     */
    public function depositeList()
    {
        $depositeList = $this->transection::getTransectionListWithPagination('deposite', auth()->id());
        return view('pages.deposite-list', compact('depositeList'));
    }

    /**
     * store deposite data
     * @param DepositeRequest $request
     */
    public function storeDeposite(DepositeRequest $request)
    {
        $requestData = $request->validated();
        $deposite = TransectionService::storeDeposite($requestData);
        return redirect()->route('deposite.list');
    }
}
