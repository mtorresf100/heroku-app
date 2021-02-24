<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'excel';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'airbill_number',
        'invoice_number',
        'invoice_age',
        'airbill_type',
        'airbill_original_amount_usd',
        'rebilling_account',
        'cash_date',
        'ship_date',
        'comments',
        'woff_location',
        'legal_entity_code',
        'email_pup_pod_agent',
        'email_manager_collector',
        'pending_category',
        'agent',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = ['cash_date', 'ship_date'];

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $categories
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereCategory($query, $categories)
    {
        return $query->whereIn('pending_category', $categories);
    }

    /**
     * Generate Pup and Pod names
     *
     * @return string
     */
    public function getNameAttribute()
    {
        $text = explode('@', $this->email_pup_pod_agent);
        $text = isset($text[0]) ? str_replace('.', ' ', $text[0]) : '';
        return strtoupper($text);
    }
}
