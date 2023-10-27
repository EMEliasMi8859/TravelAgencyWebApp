<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntryIncome extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'applicant_name',
        'amount',
        'date',
        'status'
   
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
