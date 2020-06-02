<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\film;
use App\Ruangan;
use App\booking;
use App\seat;
use Auth;
use Carbon\Carbon;
use App\Charts\UserChart;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $week1ago = Carbon::now()->subDays(Carbon::now()->dayOfWeek);
        $week2ago = Carbon::now()->subDays(Carbon::now()->dayOfWeek)->subWeek();
        $dataWeek1Ago = booking::whereBetween('created_at', [$week1ago->startOfWeek()->format('Y-m-d'), $week1ago->endOfWeek()->format('Y-m-d')])->count();
        $dataWeek2Ago = booking::whereBetween('created_at', [$week2ago->startOfWeek()->format('Y-m-d'), $week2ago->endOfWeek()->format('Y-m-d')])->count();
        $dataWeekNow = booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();


        $usersChart = new UserChart;
        $usersChart->labels(['Last 2 Week', 'Last 1 Week', 'This Week']);
        $usersChart->dataset('Booking ', 'line', [$dataWeek2Ago, $dataWeek1Ago , $dataWeekNow]);
        $movie = film::all();
        return view('film.main',compact('movie','usersChart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(film $film)
    {
        return view('film.detail',compact('film'));
    }
    
    public function all()
    {   
        $film = film::all();
        return view('film.showAllFilm',compact('film'));
    }

    public function Book($id)
    {   

        $umur = Carbon::parse(Auth::user()->birth_date)->age;
        $ruangan = Ruangan::where('ruangan_id', $id)->get(); 
        $film = film::where('film_id', $id)->get();
        $seat = DB::table('seats')->where('ruangan_id', $id)->get();
        return view('film.booking',compact('film','ruangan', 'seat', 'umur'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function StoreBooking(Request $request)
    {   
        $user_id = Auth::user()->id;
        $ruangan_id = $request->room;
        $film_id = Ruangan::where('ruangan_id', $ruangan_id)->get()->first()->Film_id; 
        $seat = str_split($request->seat);
        // $temp[] = str_split($seat);
        $seat_id = DB::table('seats')
                            ->where('seat_rows', $seat[0])
                            ->where('seat_columns', $seat[1])
                            ->where('ruangan_id', $ruangan_id)
                            ->get()->first()->seat_id;
        booking::create([
            'user_id' => $user_id,
            'film_id' => $film_id,
            'seat_id' => $seat_id,
            'seat'  => $request->seat
        ]);
        DB::table('seats')->where('seat_id',$seat_id)->update(['seat_avaibility'=>'N']);    
        return redirect('/')->with('status','Movie has been book succesfully');
    }

    public function search(Request $request){
        $keyword = $request->cari;

        $film = film::where('film_title','like',"%".$keyword."%")->paginate();
        return view('film.showSearch',compact('film'));
    }

    public function history(){
        $ticket = booking::where('user_id' ,Auth::user()->id)->get();

        return view('film.history',compact('ticket'));
    }

    public function room(){
        $room = Ruangan::all();
        return view('film.showRoom',compact('room'));
    }

    public function ticket(){
        $booking = booking::all();
        return view('film.ticketShowA',compact('booking'));
    }

    public function DeleteTicket($ticket){
        $seat_id = booking::where('booking_id', $ticket)->get()->first()->seat_id;
        seat::where('seat_id',$seat_id)->update(['seat_avaibility'=>'Y']);
        booking::destroy($ticket);
        
        
        return redirect('/ticket')->with('status','Booking has been deleted succesfully');
    }

    public function movie(){
        $film = film::all();
        return view('film.AdminFilm',compact('film'));
        // return view('film.showSearch',compact('film'));
    }

    public function DeleteFilm($id){

        $file = film::where('film_id',$id)->get()->first()->id_image;//'DORAEMON.jpg';
        File::delete('img/'. $file);
        film::destroy($id);

        return redirect('/movie')->with('status','Movie has been delete succesfully');
    }

    public function FormFilmUpdate($request){
        $film = film::where('film_id', $request)->get();
        return view('film.FormFilmUpdate', compact('film'));
    }

    public function FormFilmAdd(){
        // $film = film::where('film_id', $request)->get();
        $ruangan = Ruangan::where('film_id', 0)->get();
        return view('film.FormFilmAdd',compact('ruangan'));
    }

    public function AddFilm(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'duration' => 'required',
            'TrailLink' => 'required',
            'Description' => 'required',
		]);
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();

		$tujuan_upload = 'img';
        $file->move($tujuan_upload,$nama_file);
        

        film::create([
            'film_title' => $request->title, 
            'film_description' => $request->Description, 
            'film_age' => $request->age ,
            'film_duration_minute'=> $request->duration ,
            'ruangan_id'=> $request->room ,
            'id_image' => $nama_file ,
            'trailer_link' =>$request->TrailLink 
        ]);

        return redirect('/movie')->with('status','Movie has been added succesfully');
    }

    public function UpdateFilm(Request $request){
        if($request->file('file')){
            $this->validate($request, [
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'title' => 'required',
                'duration' => 'required',
                'TrailLink' => 'required',
                'Description' => 'required',
            ]);
            $file = $request->file('file');
     
            $nama_file = time()."_".$file->getClientOriginalName();
    
            $tujuan_upload = 'img';
            $file->move($tujuan_upload,$nama_file);
            
    
            film::where('film_id', $request->id)->update([
                'film_title' => $request->title, 
                'film_description' => $request->Description, 
                'film_age' => $request->age ,
                'film_duration_minute'=> $request->duration ,
                'id_image' => $nama_file ,
                'trailer_link' =>$request->TrailLink 
            ]);
        }else{
            $this->validate($request, [
                'title' => 'required',
                'duration' => 'required',
                'TrailLink' => 'required',
                'Description' => 'required',
            ]);
            
    
            film::where('film_id', $request->id)->update([
                'film_title' => $request->title, 
                'film_description' => $request->Description, 
                'film_age' => $request->age ,
                'film_duration_minute'=> $request->duration ,
                'trailer_link' =>$request->TrailLink 
            ]);
        }
        

        return redirect('/movie')->with('status','Movie has been update succesfully');
    }

    public function filter(Request $request){

        $film = film::where('film_age',$request->filter)->paginate();
        return view('film.showSearch',compact('film'));
    }

}
