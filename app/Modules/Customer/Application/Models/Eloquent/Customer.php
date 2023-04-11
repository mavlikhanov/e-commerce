<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Models\Eloquent;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticate
{
    use HasApiTokens;
    use HasFactory;
    use HasApiTokens;

    protected $fillable = CustomerInterface::FIELDS;

    protected static function newFactory()
    {
        return new CustomerFactory;
    }
}
