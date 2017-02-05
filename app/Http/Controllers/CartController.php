<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function addToContractDatabase(Request $request)
    {
        for($i=1; $i < $request->input('itemCount') + 1; $i++) {
            $item = 'item_name_'.$i;
            $quantity =  'item_quantity_'.$i;
            $price = 'item_price_'.$i;

            Contract::create([
                'user_id' => auth()->user()->id,
                'character_name' => auth()->user()->name,
                'avatar' => auth()->user()->avatar,
                'item' => $request->input('item'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('price') * $request->input('quantity'),
                'status' => 'Sent'
            ]);
        }

        $request->session()->flash('message', 'Successfully handled your command! A EvE-Mail will be send to you when we will start the production.');
        return view('pages.purchase')->with('request', $request);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
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
        return redirect('ships');
    }
}
