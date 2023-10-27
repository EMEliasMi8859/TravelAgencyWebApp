<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VisaRegistration;

class StatisticsVisa extends Model
{
    protected $table = 'Visa_Registrations';

    // Define the columns that can be mass assigned
    protected $fillable = ['id','CustomerID', 'Name' , 'Amount', 'VisaPrice', 'TiketPrice', 'OtherExpenses'];
}
