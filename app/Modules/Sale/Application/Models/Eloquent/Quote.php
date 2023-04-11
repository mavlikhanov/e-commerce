<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Models\Eloquent;

use App\Modules\Sale\Domain\Api\QuoteInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = QuoteInterface::FIELDS;
}
