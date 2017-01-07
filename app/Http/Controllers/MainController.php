<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producer;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Ship;

use Cart;
use View;

class MainController extends Controller
{
    /**
     * 
     *
     * @return Response
     */
    public function redirectToMain(Request $request)
    {
        $contracts = Contract::all();

        if ($request->session()->get('user_id') != null) {
            return View::make('pages.index')->with('request', $request)->with('contracts', $contracts);
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
        
    }

    /**
     * 
     *
     * @return Response
     */
    public function redirectToShips()
    {
        if ($request->session()->get('user_id') != null) {
            return View::get('ships');
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
    }

    /**
     * 
     *
     * @return Response
     */
    public function redirectToMinerals(Request $request)
    {
        if ($request->session()->get('user_id') != null) {
            return View::make('pages.rachat')->with('request', $request);
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
    }

    public function backEndAccess(Request $request)
    {
        $producers = Producer::all();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {
                    $contracts = Contract::all();

                    return View::make('backend.index')->with('request', $request)->with('contracts', $contracts);
                }

                else {
                    return View::make('pages.error')->with('request', $request);
                }
            }
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
    }

    /**
     * 
     *
     * @return Response
     */
    public function redirectToPrices(Request $request)
    {
        $producers = Producer::All();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {
                    $ships = Ship::all();

                    return View::make('pages.prices')->with('request', $request)->with('ships', $ships);
                }

                else {
                    return View::make('pages.error')->with('request', $request);
                }
            }
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
        
    }

}






