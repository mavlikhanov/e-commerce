<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Models\Eloquent;

use App\Modules\Sale\Domain\Api\OrderInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = OrderInterface::FIELDS;
}
