<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
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
        $content = $_POST;

        $contract = new Contract;

        for($i=1; $i < $content['itemCount'] + 1; $i++) {
            $item = 'item_name_'.$i;
            $quantity =  'item_quantity_'.$i;
            $price = 'item_price_'.$i;

            $contract->user_id = $request->session()->get('user_id');
            $contract->character_name = $request->session()->get('name');
            $contract->avatar = $request->session()->get('avatar');

            $contract->item = $content[$item];
            $contract->quantity = $content[$quantity];
            $contract->price = $content[$price] * $content[$quantity];

            $contract->status = 'Waiting';

            $contract->save();

        }

        $request->session()->flash('message', 'Successfully handled your command! A EvE-Mail will be send to you when we will start the production.');
        return View::make('pages.purchase')->with('request', $request);
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
        $contract = Contract::find($id);
        $contract->status       = $request->input('status');
        $contract->save();

        // redirect
        $request->session()->flash('message', 'Producer successfully added!');
        return redirect('backend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // delete
        $contract = Contract::find($id);
        $contract->delete();

        // redirect
        $request->session()->flash('message', 'Producer successfully removed!');
        return redirect('backend');
    }
}
