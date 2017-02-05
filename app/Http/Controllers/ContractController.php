<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producer;
use App\Models\Contract;
use App\Models\Session;

use View;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ALREADY HANDLE BY THE SIMPLECART JS PLUGIN
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=1; $i < $request->input('itemCount') + 1; $i++) {
            $item = 'item_name_'.$i;
            $quantity =  'item_quantity_'.$i;
            $price = 'item_price_'.$i;

            Contract::create([
                'user_id' => session()->get('user_id'),
                'character_name' => session()->get('name'),
                'avatar' => session()->get('avatar'),
                'item' => $request->input($item),
                'quantity' => $request->input($quantity),
                'price' => $request->input($price) * $request->input($quantity),
                'status' => 'Waiting'
            ]);
        }

        $request->session()->flash('message', 'Successfully handled your command! A EvE-Mail will be send to you when we will start the production.');
        return view('pages.purchase')->with('request', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $producers = Producer::All();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {

                    return view('contracts.edit')->with('contract', $contract)->with('request', $request);
                }

                return view('pages.error')->with('request', $request);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $this->validate($request, [
            'status'      => 'required',
        ]);

        // store
        Contract::find($id)->update([
            'status' => $request->input('status')
        ]);

        // redirect
        $request->session()->flash('message', 'Producer successfully added!');
        return redirect('backend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // delete
        Contract::destroy($id);

        // redirect
        $request->session()->flash('message', 'Producer successfully removed!');
        return redirect('backend');
    }
}
