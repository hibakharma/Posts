<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /*
     *  $table->string('title');
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('email');
            $table->string('website');

     */
    use HasFactory;
    protected $fillable= [
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',

    ];
}
