<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Patient;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function createWithRole(array $userData, string $role, array $roleData = [])
    {
        return DB::transaction(function () use ($userData, $role, $roleData) {

            $userData['role'] = $role;
            $user = $this->create($userData);

            match ($role) {
                'doctor'   => Doctor::create(array_merge($roleData, ['user_id' => $user->id])),
                'employee' => Employee::create(array_merge($roleData, ['user_id' => $user->id])),
                'patient'  => Patient::create(array_merge($roleData, ['user_id' => $user->id])),
                default    => null,
            };

            return $user;
        });
    }
}
