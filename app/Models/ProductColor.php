<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductColor extends Model
{
    protected $fillable = ['product_id', 'color'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function colorImages(): HasMany
    {
        return $this->hasMany(ColorImage::class);
    }
}
