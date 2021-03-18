<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private static $this;

    /**
     * @var mixed|string
     */
    private $image;

    public static function orderBy(string $string, string $string1)
    {

    }
    protected $table='categories';
     protected $fillable=["name","email","phone"."image"];
}
