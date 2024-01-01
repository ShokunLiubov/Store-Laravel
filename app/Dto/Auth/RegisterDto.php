<?php

namespace App\Dto\Auth;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public int $roleId;
}
