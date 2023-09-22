<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Iban extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'iban_no',
        'user_id'
    ];

     /**
     * Get the user that add the iban.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
