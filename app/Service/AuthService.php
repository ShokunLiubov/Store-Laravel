<?php

namespace App\Service;

use App\Dto\Auth\RegisterDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    public function create(RegisterDto $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'role_id' => $dto->roleId
        ]);
    }
}
