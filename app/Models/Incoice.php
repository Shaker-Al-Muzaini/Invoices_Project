<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Incoice extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
