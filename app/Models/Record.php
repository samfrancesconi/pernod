<?php

namespace App\Models;

use Dmgroup\PrSfmc\HasSfmcTransmissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory, HasSfmcTransmissions;

    protected $guarded = [];

}
