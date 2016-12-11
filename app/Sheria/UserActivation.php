<?php

namespace App\Sheria;

use App\Models\User;
use App\Notifications\userAccountActivation;
use App\Sheria\UserActivationLibrary;

class UserActivation
{
    protected $userActivationLibrary;
    protected $resendAfter = 24;

    public function __construct()
    {
        $this->userActivationLibrary = new UserActivationLibrary;
    }

    public function activateUser($token)
    {
        $activation = $this->userActivationLibrary->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->userActivationLibrary->deleteActivation($token);

        return $user;
    }


}
