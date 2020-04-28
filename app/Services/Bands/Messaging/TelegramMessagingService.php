<?php

namespace App\Bands\Messaging;

use Telegram\Bot\Api;
use App\Services\Bands\Contracts\MessagingInterface;

class TelegramMessagingService implements MessagingInterface
{
    /**
     * @var Api
     */
    /**
     * @var Api
     */
    protected $telegram, $groupId;

    /**
     * TelegramMessagingService constructor.
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function __call($name, $arguments)
    {
        $arguments[0]['parse_mode'] = 'HTML';

        return $this->telegram->{$name}($arguments[0]);
    }

    /**
     * @param $groupName
     * @param $identifierMsg
     * @return bool
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function validGroup($groupName, $identifierMsg)
    {
        foreach($this->sliceUpdates($this->telegram->getUpdates()) as $item) {
            if ($this->groupMatch($item, $groupName) && $this->identifierMessageMatch($item, $identifierMsg)) {
                $this->groupId = $item->getChat()['id'];
                return true;
            }
        }

        return false;
    }

    /**
     * @return Api
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param array $props
     * @return \Telegram\Bot\Objects\Message
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function send(array $props)
    {
        $props['chat_id'] = $props['group_id'];

        unset($props['group_id']);

        $props['type'] = ucfirst($props['type']);

        $this->telegram->{"send{$props['type']}"}(array_merge());
    }

    /**
     * @param $item
     * @param $groupName
     * @return bool
     */
    protected function groupMatch($item, $groupName)
    {
        return $item->getChat()->getTitle() == $groupName;
    }

    /**
     * @param $item
     * @param $identifierMsg
     * @return bool
     */
    protected function identifierMessageMatch($item, $identifierMsg)
    {
        return isset($item->getMessage()['text']) && $item->getMessage()['text'] == $identifierMsg;
    }

    /**
     * @param $updates
     * @return array
     */
    protected function sliceUpdates($updates) {
        $data = array_slice($updates, -200);

        krsort($data);

        return $data;
    }
}
