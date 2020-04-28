<?php

namespace App\Services\RequestedBands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Bands\RequestedBandApproved;
use App\Repositiroes\Contracts\BandRepositoryInterface;
use App\Repositiroes\Contracts\TicketRepositoryInterface;

class RequestedBandApproveService
{
    /**
     * @var BandRepositoryInterface
     */
    protected $approvedBands, $tickets;

    /**
     * RequestedBandApproveService constructor.
     * @param BandRepositoryInterface $bands
     * @param TicketRepositoryInterface $tickets
     */
    public function __construct(BandRepositoryInterface $bands, TicketRepositoryInterface $tickets)
    {
        $this->approvedBands = $bands;
        $this->tickets = $tickets;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function approve($requestedBand)
    {
        if($requestedBand->approved) return back();

        // Mark requested band as approved
        $requestedBand->update(['approved' => true]);

        // Add the requested band in the approved bands table
        $band = $this->pushBand($requestedBand); /// var is the approved band from bands table

        // Generate instructor ticket for the requested band
        $instructorTicket = $this->generateInstructorTicket($band);

        // Generate student ticket for the band that can be distributed by the band
        $this->generateStudentTicket($band);

        // notify requester  with the ticket
        $this->notifyBandRequester($requestedBand, $instructorTicket);

        session()->flash('success', 'Band Approved Successfully and The Ticket Sent the Owner');
    }

    /**
     * @param $band
     */
    protected function pushBand($band)
    {
        return $this->approvedBands->store([
            'name' => ucfirst($band->band_name),
            'slug' => Str::slug($band->band_name),
            'description' => Str::limit($band->band_description, 120),
            'members_count' => $band->members_count,
            'applying_deadline' => now(),
        ]);
    }

    /**
     * @param $band
     * @return mixed
     */
    protected function generateInstructorTicket($band)
    {
        return $this->tickets->store([
                'code' => $band->slug .'-'. time(),
                'password' => uniqid(),
                'band_id' => $band->id,
                'type' => 'instructor',
                'owner_name' => "{$band->name} Instructor",
                'status' => 'approved',
                'unlimited_usage' => true,
                'distributed_by_band' => false,
        ]);
    }

    /**
     * @param $band
     * @return mixed
     */
    protected function generateStudentTicket($band)
    {
        return $this->tickets->store([
            'code' => "{$band->slug}-ticket-" . time(),
            'password' => uniqid(),
            'band_id' => $band->id,
            'type' => 'student',
            'owner_name' => "{$band->name} Student",
            'status' => 'approved',
            'unlimited_usage' => false,
            'usage_limit' => 0,
            'distributed_by_band' => true,
        ]);
    }

    /**
     * @param $requestedBand
     * @param $ticket
     */
    public function notifyBandRequester($requestedBand, $ticket)
    {
        Mail::to($requestedBand->owner_email)->send(new RequestedBandApproved($requestedBand, $ticket));
    }
}
