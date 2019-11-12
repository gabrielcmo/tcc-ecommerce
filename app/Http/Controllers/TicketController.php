<?php

namespace Doomus\Http\Controllers;

use DateTime;
use Doomus\Mail\SupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Doomus\Ticket;
use Doomus\Http\Controllers\UserController as User;
use Doomus\TicketType;

;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = User::getTickets();
        return view('user.tickets')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create-ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->message = $request->ticket_message;
        $ticket->subject = $request->ticket_subject;
        $ticket->ticket_type_id = $request->ticket_type;
        $ticket->status = 0;
        $ticket->creation_date = new DateTime();
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return back();
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
        $ticket = Ticket::find($id);
        $ticket_type = TicketType::find($ticket->ticket_type_id);
        return view('admin.ticketMsg')->with('ticket', $ticket)->with('ticket_type', $ticket_type);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
