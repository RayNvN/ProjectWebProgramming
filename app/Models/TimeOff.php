<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeOff extends Model
{
    use HasFactory;

    protected $table = 'timeoffs';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'employee_id',
        'leave_type',
        'leave_form',
        'leave_to',
        'days',
        'status',
    ];

    // Relasi ke tabel Employees
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
  // Accessor untuk mengkapitalisasi status
  public function getStatusAttribute($value)
  {
      return ucfirst($value);
  }

  // Mutator untuk memastikan status selalu disimpan dalam lowercase
  public function setStatusAttribute($value)
  {
      $this->attributes['status'] = strtolower($value);
  }
}
