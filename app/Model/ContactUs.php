<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $fillable = ['whatsapp', 'twitter', 'instagram', 'linkedin', 'github', 'email', 'contact_number',  'facebook'];
}
