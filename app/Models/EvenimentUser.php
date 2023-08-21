<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenimentUser extends Model
{
    use HasFactory;

    protected $table ="utilizatori_evenimente";

    protected $fillable = ['eveniment_id', 'user_id', 'confirmare_disponibilitate'];


    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
