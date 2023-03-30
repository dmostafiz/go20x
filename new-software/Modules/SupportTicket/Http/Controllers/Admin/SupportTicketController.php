<?php

namespace Modules\SupportTicket\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Auth;

class SupportTicketController extends Controller
{
 
    public function tickets()
    {
        $pageTitle = 'Support Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::orderBy('id','desc')->with('user')->paginate(getPaginate());
        return view('supportticket::admin.support.tickets', compact('items', 'pageTitle','emptyMessage'));
    } 

}
