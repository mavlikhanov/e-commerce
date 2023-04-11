<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Models\Eloquent;

use App\Models\Contracts\StockItemContract;
use App\Models\Stocks\StockItem;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ProductInterface::FIELDS;

    protected static function newFactory()
    {
        return new ProductFactory();
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function stockItem(): HasOne
    {
        return $this->hasOne(StockItem::class, StockItemContract::PRODUCT_ID, ProductInterface::ID);
    }
}
