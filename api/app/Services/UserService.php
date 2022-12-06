<?php

namespace App\Services;


use App\Exceptions\UserHasBeenTakenException;
use App\User;

class UserService
{
  public function update(User $user, array $input)
  {
    $checkEmailuser = User::where('email', $input['email'])->where('email', '!=', $user->email)->exists();

    if(!empty($input['email']) && $checkEmailuser){
      throw new UserHasBeenTakenException();
    }
    if(!empty($input['password'])) {
      $input['password'] = bcrypt($input['password']);
    }

    $user->fill($input);
    $user->save();

    return $user->fresh();
    dd('x');
  }
}