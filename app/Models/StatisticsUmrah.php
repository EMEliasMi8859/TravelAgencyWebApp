<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UmrahRegistration;

class StatisticsUmrah extends Model
{
    protected $table = 'Umrah_Registrations';

    // Define the columns that can be mass assigned
    protected $fillable = ['id','CustomerID', 'Name' , 'Amount', 'VisaPrice', 'TiketPrice', 'OtherExpenses'];

}
