<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semister extends Model
{
    use HasFactory;

    protected $table = 'semister_tabel';
    protected $primaryKey = 'sem_id';
}
