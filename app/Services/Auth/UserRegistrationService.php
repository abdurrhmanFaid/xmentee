<?php

namespace App\Services\Auth;

class UserRegistrationService
{
    /**
     * @param $request
     * @return array
     */
    public function validateTicket($request)
    {
        // Check if the ticket is exists
        if(! $ticket = $this->validTicket($request['ticket_code'], $request['ticket_secret'])) {
            return ['invalidTicket' => __('tickets.invalid')];
        }

        // Check if the ticket is approved
        if(! $ticket->isApproved()) {
            return ['invalidTicket' => __("tickets.{$ticket->status}", ['band' => $ticket->band->name])];
        }

        $receivingBatchId = $ticket->band->receiving_batch_id;

        // Check if the ticket band has assigned the receiving batch
        if($ticket->type == 'student' && ! $receivingBatchId) {
            return ['invalidTicket' => __('tickets.missing_band_details')];
        }

        // Check if the ticket is distributed by band and in reached the max usage
        if ($ticket->distributed_by_band && ! $ticket->unlimited_usage && $ticket->usage_limit == 0) {
            return ['invalidTicket' => __('tickets.max_usage_reached')];
        }

        // everything is good
        return  [
            'ticket' => $ticket,
            'receivingBatchId' => $ticket->type == 'student' ? $receivingBatchId : null,
        ];
    }

    /**
     * @param $ticket
     */
    public function handleAfterRegistration($ticket)
    {
        // Remove the ticket if the user is student and he is the ticket requester
        if(! $ticket->distributed_by_band && $ticket->type !== 'instructor') {
            $ticket->delete();
        }

        // Decrease the usage limit for ticket if the ticket is published by the band
        if ($ticket->distributed_by_band && ! $ticket->unlimited_usage && $ticket->usage_limit >= 1) {
            $ticket->decrement('usage_limit');
        }

        $ticket->band->increment('members_count');
    }

    /**
     * @param $code
     * @param $secret
     * @return mixed
     */
    public function validTicket($code, $secret)
    {
        return \App\Models\Ticket::where(['code' => $code, 'password' => $secret])->first();
    }
}
