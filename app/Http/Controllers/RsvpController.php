<?php

namespace App\Http\Controllers;
use App\Rsvp;
use App\Mail\Invite;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guests = Rsvp::all();
        return view('rsvp/index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('rsvp/create');
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|max:255',
        ]);
        $event = Rsvp::create($validatedData);
   
        return redirect('/guests')->with('success', 'Guest is successfully saved');
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

    public function sendinvite() {
        $guests = Rsvp::all();
        return view('rsvp/sendinvite', compact('guests'));
       
    }

    public function sendinginvite() {

        
        //\Mail::to('absolom@99c.co.za')->send(new Invite);
        
        $guests = Rsvp::all();
        //dd($guests);

        foreach ($guests as $key => $value) {
            //echo  $value["email"] . ", " . $value["price"] . "<br>";
            \Mail::to($value["email"])->send(new Invite);
        }
      
       
        if (\Mail::failures()) {
           //return response()->Fail('Sorry! Please try again latter');
           return redirect('/guests')->with('Failure', 'Sorry! Please try again later!');
         }else{
            return redirect('/guests')->with('success', 'Invites have been sent successfully!');
         }

      
        
    }
}
