<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $primaryKey = 'offer_id';

    protected $fillable = [
        'offer_code',
        'offer_link',
        'company_id',
        'category_id',
        'description',
        'image_link',
        'quantity',
        'expiration_date',
        'slug',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
