<?php

namespace App\Http\Controllers;

use App\Ruangan;
use App\seat;
use Illuminate\Http\Request;

class RuanganController extends Controller
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
        Ruangan::create([
            'ruangan_capacity' => 40,
            'Film_id' => 0
        ]);
        foreach(range('A','E') as $alphabet){
            for($i= 1; $i < 9; $i++){
                $ruangan_id = Ruangan::all()->last()->ruangan_id;
                    seat::create([
                        'seat_avaibility' => 'Y', 
                        'seat_number'=> 1,
                        'seat_rows'=> $alphabet,
                        'seat_columns' => $i,
                        'ruangan_id' => $ruangan_id
                    ]);
            } 
        }
        
        return redirect('/room')->with('status','Room has been create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        return $ruangan;//view('film.booking',compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($ruangan)
    {
        $ruangan = Ruangan::where('ruangan_id', $ruangan)->get(); 
        return view('film.EditRoom', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        Ruangan::where('ruangan_id',$request->room_id)->update(['ruangan_capacity'=> $request->RoomSize]);
        return redirect('/room')->with('status','Room has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($ruangan)
    {   
        Ruangan::destroy($ruangan);
        seat::where('ruangan_id',$ruangan)->delete();
        return redirect('/room')->with('status','Room has been deleted');
    }
}
