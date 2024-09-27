<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated;
use App\Mail\NotifyCustomer;
use App\Models\Admin;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->simplePaginate(10);
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.ticket.index', compact('tickets'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function create()
    {
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.ticket.create');
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function store(Request $request)
    {

        $admin_id = Session()->get('admin_id');
        $admin_email = Admin::where('admin_type', 'admin')->pluck('admin_email')->first();

        $ticket = new Ticket;
        $ticket->id = $request->ticket;
        $ticket->title = $request->title;
        $ticket->desc = $request->desc;
        $ticket->user_id = $admin_id;
        $ticket->save();


        // After saving, sending an email
        $admin = Admin::where('admin_id', $ticket->user_id)->first();
        $admin_name = $admin->admin_name;
        $customMessage = 'A new ticket has been created successfully.';
        Mail::to($admin_email)
            ->send(new TicketCreated($ticket, $customMessage, $admin_name));
        return redirect()->back()->with('message', 'A new Ticket has been raised successfully with an email sent.');
    }



    // public function edit_ticket(Ticket $ticket)
    // {
    //     $admin_id = Session()->get('admin_id');
    //     if ($admin_id) {
    //         return view('admin.ticket.index', compact('ticket'));
    //     } else {
    //         return Redirect::to('/admins')->send();
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Ticket  $ticket)
    // {
    //     $update = $team->update([
    //         'name' => $request->name,
    //         'designation' => $request->designation,
    //         'facebook' => $request->facebook,
    //         'linkedin' => $request->linkedin,
    //         'twitter' => $request->twitter,
    //         'type' => $request->type
    //     ]);
    //     if ($request->hasFile('image')) {
    //         $update = $team->update([
    //             'image' => $request->file('image')->store('team')
    //         ]);
    //     }

    //     if ($update) {
    //         return redirect('/teams')->with('message', 'The Team info has been updated successfully');
    //     }
    // }



    public function delete(Ticket $ticket)
    {

        $delete = $ticket->delete();
        if ($delete) {
            return redirect()->back()->with('message', ' This Ticket info has been deleted successfully');
        }
    }




    public function change_status(Ticket $ticket)
    {
        if ($ticket->status == 1) {
            $ticket->update(['status' => 0]);
        } else {
            $ticket->update(['status' => 1]);
        }

        // Send notification email
        $customerEmail = Admin::where('admin_type', 'customer')->pluck('admin_email')->first();
        $customMessage = 'Ticket has been closed.';
        Mail::to($customerEmail)
            ->send(new NotifyCustomer($ticket, $customMessage));
        return redirect()->back()->with('message', 'Status changed successfully and Notification sent.');
    }
}
