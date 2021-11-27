<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::latest()->paginate(10);

        return view('reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reservation::create(array_merge($request->only('title', 'description', 'body'),[
            'user_id' => auth()->id()
        ]));

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation created successfully.'));
    }

   
    public function show(Post $post)
    {
        return view('reservation.show', [
            'reservation' => $post
        ]);
    }

   
    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', [
            'reservation' => $reservation
        ]);
    }

  
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->only('title', 'description', 'body'));

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation updated successfully.'));
    }

    
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation deleted successfully.'));
    }
}