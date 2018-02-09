<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Reservation;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rute = Rute::orderBy('id', 'DESC')->get();
        return view('rute.index', compact('rute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'depart_at' => 'required|max:255',
            'rute_from' => 'required',
            'rute_to' => 'required',
            'price' => 'required',
            'transportation_id' => 'required',

        ]);

        $storage = new Rute();
        $storage->depart_at = $request->depart_at;
        $storage->rute_from = $request->rute_from;
        $storage->rute_to = $request->rute_to;
        $storage->price = $request->price;
        $storage->transportation_id = $request->transportation_id;
        $storage->save();

        return redirect('route')->with('message', 'Data berhasil di tambahan');

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
    public function edit($id)
    {
        //
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
        $this->validate($request, [

            'depart_at' => 'required',
            'rute_from' => 'required',
            'rute_to' => 'required',
            'price' => 'required',
            'transportation_id' => 'nullable',

        ]);

        $storage = Rute::find($id);
        $storage->depart_at = $request->depart_at;
        $storage->rute_from = $request->rute_from;
        $storage->rute_to = $request->rute_to;
        $storage->price = $request->price;
        $storage->transportation_id = $request->transportation_id;
        $storage->save();

        return redirect('route')->with('message', 'Data berhasil di tambahan');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('route')->with('hapuspilihnotif', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Rute::whereIn("id",$checked)->delete();
          return redirect('route')->with('messagehapus', 'Data berhasil di hapus!');        
        }
    }

    public function destroymanual($id)
    {
        $delete = Rute::find($id);
        $delete->delete();

        return redirect('route')->with('hapus', 'Data berhasil di hapus');

    }
}
