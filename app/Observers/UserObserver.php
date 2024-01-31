<?php

namespace App\Observers;

use App\Models\ActivityUser;
use App\Models\User;

class UserObserver
{
  /**
   * Handle the User "created" event.
   *
   * @param  \App\Models\User  $user
   * @return void
   */
  public function created(User $user)
  {
    ActivityUser::create([
      'description' => "Success Created User " . $user->name
    ]);
  }

  /**
   * Handle the User "updated" event.
   *
   * @param  \App\Models\User  $user
   * @return void
   */
  public function updated(User $user)
  {
  }

  public function deleted(User $user)
  {
    ActivityUser::create([
      'description' => "User " . $user->name . " Deleted"
    ]);
  }

  public function restored(User $user)
  {
    ActivityUser::create([
      'description' => "User " . $user->name . " Restored"
    ]);
  }

  public function forceDeleted(User $user)
  {
    ActivityUser::create([
      'description' => "User " . $user->name . " ForceDeleted"
    ]);
  }
}
