<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
    Route::get('/tickets', 'Admin\SupportTicketController@tickets');
});




  // Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
  //       Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
  //       Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
  //       Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
  //       Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
  //       Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
  //       Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
  //       Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');
