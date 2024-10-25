<?php

namespace App\Models;
use App\Models\User;


use App\Http\Controllers\UserInfoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class UserInfo extends Model
{
    use HasFactory;

    // Nome da tabela, caso não siga a convenção
    protected $primaryKey = "Users_id";

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'Users_id',   // Chave estrangeira
        'profileImg',
        'status',
        'genero',
        'dataNasc',
    ];

    // Relação com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'Users_id', 'id'); // Correção da chave estrangeira
    }
    
}
