<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producer;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $producers = Producer::all();

        if ($request->session()->get('user_id') != null) {
            foreach($producers as $key => $value) {
                if ($value->character_id == $request->session()->get('user_id')) {

                    return view('producers.create')->with('request', $request)
                        ->with('producers', $producers);
                }

                return view('pages.error')->with('request', $request);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'character_name'       => 'required|unique:producers',
            'character_id'      => 'required|numeric|unique:producers',
        ]);

        // store
        Producer::create([
            'character_id' => $request->input('character_id'),
            'character_name' => $request->input('character_name')
        ]);

        // redirect
        $request->session()->flash('message', 'Producer successfully added!');
        return redirect('producers/create');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        Producer::destroy($id);

        // redirect
        $request->session()->flash('message', 'Producer successfully removed!');
        return redirect('producers/create');
    }
}
