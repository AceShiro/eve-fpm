<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Session;
use View;

class CartController extends Controller
{

    /**
     * 
     *
     * @return Response
     */
    public function addToContractDatabase(Request $request)
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

            $contract->status = 'Sent';

            $contract->save();

        }

        $request->session()->flash('message', 'Successfully handled your command! A EvE-Mail will be send to you when we will start the production.');
        return View::make('pages.purchase')->with('request', $request);
        
    }

    public function testCart(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation

        $this->validate($request, [
            'name' => 'required',
        ]);

        // store
        $contract = new Contract;
        $contract->name       = $request->session()->get('name');
        $contract->avatar      = $request->session()->get('avatar');

        /* JS -> PHP puis Foreach pour recuperer tous les items
        $contract->items = Input::get('nerd_level');
        
        */

        $contract->save();

        // redirect
        Session::flash('message', 'Successfully handled your command! A EvE-Mail will be send to you when we will start the production.');
        return Redirect::to('ships');
    }
}