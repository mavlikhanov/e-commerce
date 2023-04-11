<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Models\Eloquent;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = CategoryInterface::FIELDS;

    protected static function newFactory()
    {
        return new CategoryFactory();
    }
}
