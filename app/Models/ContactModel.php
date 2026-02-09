<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_contact';
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'country', 'phone', 'subject', 'message', 'status', 'added_at', 'update_at'];
}
