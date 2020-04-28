<?php

namespace App\Services\Bands;

use App\Services\Bands\Contracts\MessagingInterface;
use App\Repositiroes\Contracts\BandRepositoryInterface;

class BandMessagingUpdateService
{
    /**
     * @var MessagingInterface
     */
    protected $messaging, $bands;

    /**
     * BandMessagingUpdateService constructor.
     * @param MessagingInterface $messaging
     */
    public function __construct(MessagingInterface $messaging, BandRepositoryInterface $bands)
    {
        $this->messaging = $messaging;
        $this->bands = $bands;
    }

    /**
     * @param $link
     * @param $band
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($link, $band)
    {
        if(! $link) {
            $this->unlink($band);

            return response([
                'message' => __('bands.messaging.telegram.unset_successfully'),
            ], 200);
        }

        return $this->link($band);
    }

    /**
     * @param $band
     * @return mixed
     */
    public function getIdentifierMsg($band)
    {
        return $band->id;
    }

    /**
     * @param $band
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function link($band)
    {
        if($this->messaging->validGroup($band->name, $band->id)) {

            $this->updateGroupId($band, $groupId = $this->messaging->getGroupId());

            $this->sendSuccessMessageViaMessagingService($band, $groupId);

            return response([
                'message' => __('bands.messaging.telegram.installed', ['group' => $band->name]),
            ], 200);
        }

        return response([
            'message' => __('bands.messaging.telegram.installation_failed'),
        ], 406);
    }

    /**
     * @param $band
     */
    protected function unlink($band)
    {
        $this->updateGroupId($band, null);
    }

    /**
     * @param $band
     * @param $value
     */
    protected function updateGroupId($band, $value)
    {
        $this->bands->update($band, ['messaging_group_id' => $value]);
    }

    /**
     * @param $band
     * @param $groupId
     */
    protected function sendSuccessMessageViaMessagingService($band, $groupId)
    {
        sendExternalMessage('message', $groupId, [
            'text' => __('bands.messaging.telegram.installed', ['group' => $band->name])
        ]);
    }
}
