<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketHistory;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Enums\TicketStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tickets = Ticket::where('user_id', auth()->id())->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create([
            'title' => $request->title,
            'department_id' => $request->department,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        if($ticket){
            $ticket_history = TicketHistory::create([
                'ticket_id' => $ticket->id,
                'user_id' => auth()->id(),
                'status' => TicketStatus::NEW->value,
            ]);
        }

        if($request->file('attachment')){
            $filecontent = file_get_contents($request->file('attachment'));
            $filename = Str::random(25);
            $fileextension = $request->file('attachment')->extension();
            $path = "attachments/$filename.$fileextension";
            Storage::disk('public')->put($path, $filecontent);
            $ticket->update(['attachments' => $path]);
        }

        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket) //route model binding
    {
        return view('tickets.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
