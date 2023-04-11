<?php
declare(strict_types=1);

namespace App\Models\Stocks;

use App\Models\Contracts\InventorySourceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySource extends Model
{
    use HasFactory;

    protected $fillable = InventorySourceContract::FIELDS;
}
