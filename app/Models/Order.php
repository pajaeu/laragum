<?php

namespace App\Models;

use App\Events\OrderCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_email',
        'customer_country',
        'key'
    ];

    protected $dispatchesEvents = [
        'created' => OrderCreated::class
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
