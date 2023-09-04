<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= "customer";
    protected $primaryKey= "customer_id";
    public function getCityAttribute($value){
      return ucwords($value);
    }
    public function setStateAttribute($value){
        $this->attributes['state'] = ucwords($value);
    }
}
