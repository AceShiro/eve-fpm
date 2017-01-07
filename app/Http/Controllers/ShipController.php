<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Producer;
use View;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ships = Ship::all();

        if ($request->session()->get('user_id') != null) {
            return View::make('ships.index') ->with('ships', $ships) ->with('request', $request);
        }
        else {
            return View::make('tests.index')->with('request', $request);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $ship = Ship::findOrFail($id);
        $producers = Producer::All();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {

                    return view('ships.edit')->with('ship', $ship)->with('request', $request);
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $this->validate($request, [
            'price'      => 'required|numeric',
            'available'     => 'required',
        ]);

        // store
        $ship = Ship::find($id);
        $ship->price       = $request->input('price');
        $ship->available       = $request->input('available');
        $ship->save();

        // redirect
        $request->session()->flash('message', 'Item updated successfully!');
        return redirect('prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
