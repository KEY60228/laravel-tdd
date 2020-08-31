<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function reserve(User $user, Lesson $lesson): bool
    {
      try {
        $user->canReserve($lesson);
      } catch(Exception $e) {
        return false;
      }
      return true;
    }
}
