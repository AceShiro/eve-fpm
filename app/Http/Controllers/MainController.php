<?php

namespace App\Http\Controllers;

use App\Models\Producer;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Ship;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function redirectToMain(Request $request)
    {
        $contracts = Contract::all();

        if ($request->session()->get('user_id') != null) {
            return view('pages.index')->with('request', $request)
                ->with('contracts', $contracts);
        }

        return redirect('/');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function redirectToShips()
    {
        if (request()->session()->get('user_id') != null) {
            return view('ships');
        }

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function redirectToMinerals(Request $request)
    {
        if ($request->session()->get('user_id') != null) {
            return view('pages.rachat')->with('request', $request);
        }

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function backEndAccess(Request $request)
    {
        $producers = Producer::all();

        if (auth()->user()->id != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == auth()->user()->id) {
                    $contracts = Contract::all();

                    return view('backend.index')->with('request', $request)
                        ->with('contracts', $contracts);
                }

                return view('pages.error')->with('request', $request);
            }
        }

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function redirectToPrices(Request $request)
    {
        $producers = Producer::All();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {
                    $ships = Ship::all();

                    return view('pages.prices')->with('request', $request)
                        ->with('ships', $ships);
                }

                return view('pages.error')->with('request', $request);
            }
        }

        return redirect('/');
    }

}
