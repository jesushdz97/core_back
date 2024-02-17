<?php

namespace Cms\User;

use App\Models\User;
use Cms\Base\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
