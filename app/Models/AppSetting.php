<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_link',
        'image',
        'favicon',
        'copyright',
        'email1',
        'email2',
        'phone1',
        'phone2',
        'fax',
        'whatsapp',
        'address'
    ];

}
