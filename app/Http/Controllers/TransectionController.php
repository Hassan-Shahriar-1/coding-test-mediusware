<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositeRequest;
use App\Http\Requests\WithdrawRequest;
use Illuminate\Http\Request;
use App\Models\Transections;
use App\Services\TransectionService;
use Exception;
use Illuminate\Support\Facades\DB;

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
            return $this->transection::allTransectionsData('all', auth()->id());
        } catch (Exception $e) {
            abort(500, 'Something went wrong. Please try again later');
        }
    }

    /**
     * get User Deposite List
     */
    public function depositeList()
    {
        $depositeList = $this->transection::allTransectionsData('deposite', auth()->id());

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

    /**
     * get withdraw list of users
     */
    public function withdrawList()
    {
        $withdrawList = $this->transection::allTransectionsData('withdraw', auth()->id());
        return view('pages.withdraw-list', compact('withdrawList'));
    }

    /**
     * withdraw balance
     * @param WithdrawRequest $request
     */
    public function withDrawBalance(WithdrawRequest $request)
    {
        $withdarawData = $request->validated();
        DB::beginTransaction();
        try {
            $withdrawMessage = TransectionService::withdrawAccountBalance($withdarawData);
            DB::commit();
            return back()->with('message', $withdrawMessage);
        } catch (Exception $e) {

            DB::rollBack();

            abort(500, 'someting went wrong');
        }
    }
}
