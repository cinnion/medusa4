<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'rank',
        'first_name',
        'middle_name',
        'last_name',
        'email_address',
        'password',

        'previous_login',
        'last_login',
        'forum_last_login',
        'osa',
        'tos',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getGreeting()
    {
        return 'Hello';
    }

    public function getGreetingArray()
    {
        return [
            'greeting' => $this->getGreeting(),
            'rank' => $this->rank,
            'name' => $this->name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
        ];
    }

    public function getPreviousLogin(): string
    {
        if (empty($this->previous_login) === true) {
            return date('Y-m-d', strtotime('-2 weeks'));
        }

        return date('Y-m-d', strtotime($this->previous_login));
    }

    public function updateLastLogin(): void
    {
        $this->previous_login = $this->last_login;
        $this->last_login = date('Y-m-d H:i:s');
        $this->save();
    }
}
