<?php
declare(strict_types=1);

namespace App\Models\Stocks;

use App\Models\Contracts\StockItemContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $fillable = StockItemContract::FIELDS;
}
