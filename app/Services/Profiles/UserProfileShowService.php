<?php

namespace App\Services\Profiles;

use App\Repositiroes\Contracts\UserRepositoryInterface;

class UserProfileShowService
{
    protected $view = 'profiles.show_owner', $viewType = 'owner';

    /**
     * UserProfileShowService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->users = $userRepository;
    }

    public function getUser($username = null)
    {
        if(auth()->user()->username == $username || !$username) {
            $user = auth()->user();
            $this->viewType = 'owner';
        } else {
            $user = $this->users->findByUsername($username);
            $this->view = 'show_visitor';
            $this->viewType = 'visitor';
        }

        if(! $user) abort(404);

        return $this->formattedUser($user);
    }

    public function getView()
    {
        return $this->view;
    }

    protected function formattedUser($user)
    {
        $user->image = $user->formattedImage(480);
        $user->load('profile');

        if($this->viewType == 'owner') {
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
}
