<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public static function createRand($rand = 100000){
    	$number = new Number();
    	$number->number = rand(0,100000);
    	$number->save();
    	return $number;
    }
}
