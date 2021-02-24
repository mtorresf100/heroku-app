<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Mail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mails';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'to',
        'cc',
        'subject',
        'attachment',
        'body',
        'status',
        'response',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getAttachmentAttribute($value)
    {
        if (Storage::disk('public')->exists($value)) {
            return Storage::disk('public')->url($value);
        }
        return 'javascript:;';
    }
}
