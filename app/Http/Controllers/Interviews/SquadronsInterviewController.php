<?php

namespace App\Http\Controllers\Interviews;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class SquadronsInterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('bands.squadrons.interview');
    }

    public function ticket(Request $request)
    {
        $request->validate([
            'ticket' => 'required|string|exists:tickets,code|unique:squadrons_interviews,ticket',
            'password' => 'required|string',
        ], [
            'exists' => 'مفيش تذكرة موجودة بالكود ده. راجع التفاصيل مرة تانية',
            'unique' => 'لقد قمت بالإجابة مسبقا',
        ]);

        $ticket = Ticket::whereCode($request->ticket)->where('distributed_by_band', false)->where('password', $request->password)->first();

        if($ticket) {
            return $ticket->owner_name;
        }

        return response(['errors' => ['ticket' => ['تأكد من كلمة المرور مرة تانية']]], 422);
    }

    public function approved()
    {
        $approved = Ticket::where('band_id', 1)->where('status', 'approved')->where('distributed_by_band', false)->where('type', 'student')->get();

        return view('bands.squadrons.approved', ['approved' => $approved]);
    }
}
