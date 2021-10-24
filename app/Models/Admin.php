<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'contact_address', 'user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function delete()
    {
        // delete related user
        $this->user()->delete();

        return parent::delete();
    }
}
