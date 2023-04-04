<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Classe User
 *
 * @package App\Models
 * @property int $id Identifiant de l'utilisateur
 * @property string $name Nom de l'utilisateur
 * @property string $email Adresse e-mail de l'utilisateur
 * @property string $password Mot de passe de l'utilisateur (haché)
 * @property \Illuminate\Support\Carbon|null $email_verified_at Date de vérification de l'adresse e-mail
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de l'utilisateur
 * @property \Illuminate\Support\Carbon|null $updated_at Date de mise à jour de l'utilisateur
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     /**
     * Les attributs qui doivent être cachés pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les types de données des attributs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
