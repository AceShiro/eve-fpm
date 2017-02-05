<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Producer;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $ships = Ship::all();

        return view('ships.index') ->with('ships', $ships) ->with('request', $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\View\View
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $ship = Ship::findOrFail($id);
        $producers = Producer::All();

        foreach($producers as $key => $value) {
            if ($value->character_id == $request->session()->get('user_id')) {
                return view('ships.edit')->with('ship', $ship)->with('request', $request);
            }

            return view('pages.error')->with('request', $request);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        // validate
        $this->validate($request, [
            'price'      => 'required|numeric',
            'available'     => 'required',
        ]);

        // store
        Ship::find($id)->update([
            'price' => $request->input('price'),
            'available' => $request->input('available')
        ]);

        // redirect
        $request->session()->flash('message', 'Item updated successfully!');
        return redirect('prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        //
    }

}
