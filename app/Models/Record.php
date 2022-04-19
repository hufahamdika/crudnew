<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    // protected $table = 'Record';
    protected $fillable = [
        'temperature',
        'condition'
    ];
}
