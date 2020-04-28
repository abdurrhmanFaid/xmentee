<?php

namespace App\Services\Profiles;

use App\Jobs\SendMessagingLinkedNotification;
use App\Repositiroes\Contracts\UserRepositoryInterface;

class UserProfileUpdateService
{
    /**
     * UserProfileShowService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->users = $userRepository;
    }

    /**
     * @param $request
     * @param null $user
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function handle($request, $user = null)
    {
        $user = $user ?: auth()->user();

//        dd($request);
        $request['password'] = $request['password'] ? bcrypt($request['password']) : $user->password;
        $request['image_path'] = $request['image_path'] ?: $user->image_path;

        if($request['messaging_id'] && $request['messaging_id'] != $user->messagingId()) {
            // link the new messaging id if it is valid
            try {
                sendExternalMessage('message', $request['messaging_id'], [
                    'text' => __('js.user.messaging_linked'),
                ]);
                $this->users->update($user, ['messaging_id' => $request['messaging_id']]);
            } catch (\Exception $ex) {
                return response(__('default.invalid_messaging_id'), 422);
            }
        }

        $this->users->update($user, $request);

        return json_encode([
            'name' => $user->name,
            'points' => $user->points,
            'username' => $user->username,
            'formattedUsername' => $user->formattedUsername,
            'image' => $user->formattedImage(480),
            'email' => $user->email,
            'gender' => $user->gender,
            'phone_number' => $user->profile->phoneNumber(),
            'custom_payment_value' => $user->profile->customPaymentValue(),
            'messaging_id' => $user->messagingId(),
            'default_locale' => $user->locale()
        ]);
    }
}
