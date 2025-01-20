<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'company_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'cvr',
        'b2b',
        'b2c',
        'type_id',
        'is_company',
        'branch_code',
        'slug',
    ];

    /**
     * Relationships
     */

    // Relationship with Type (if you have a types table)
    public function type()
    {
        return $this->belongsTo(CompanyType::class, 'type_id');
    }
    
    // Relationship with Users (many-to-many through user_company table)
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_company')
                    ->withPivot('role_in_company')
                    ->withTimestamps();
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'company_offer')->withTimestamps();
    }

}

protected static function boot()
{
    parent::boot();

    static::creating(function ($company) {
        if (empty($company->slug)) {
            $company->slug = Str::slug($company->name);
        }
    });
}
