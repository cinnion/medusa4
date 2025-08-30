<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * MEDUSA User model.
 *
 * @property array assignment
 * @property array awards
 * @property array history
 * @property array peerages
 * @property array permissions
 * @property array points
 * @property array previous
 * @property array rank
 * @property array|string rating
 * @property object updated_at
 * @property string active
 * @property string address1
 * @property string address2
 * @property string application_date
 * @property string branch
 * @property string city
 * @property string country
 * @property string dob
 * @property string duty_roster
 * @property string email_address
 * @property string extraPadding
 * @property string first_name
 * @property string forum_last_login
 * @property string hasEvents
 * @property string id
 * @property string idcard_printed
 * @property string last_forum_login
 * @property string last_login
 * @property string last_name
 * @property string lastUpdate
 * @property string member_id
 * @property string middle_name
 * @property string note
 * @property string osa
 * @property string password
 * @property string path
 * @property string phone_number
 * @property string postal_code
 * @property string previous_login
 * @property string promotionStatus
 * @property string rank_title
 * @property string registration_date
 * @property string registration_status
 * @property string state_province
 * @property string suffix
 * @property string unitPatchPath
 * @property string usePeerageLands
 */
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
        'email_address',
        'password',

        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'address1',
        'address2',
        'city',
        'state_province',
        'postal_code',
        'country',

        'dob',
        'application_date',
        'registration_date',
        'registration_status',
        'member_id',
        'idcard_printed',
        'promotionStatus',

        'branch',
        'rank',
        'rating',
        'path',

        'awards',
        'history',
        'assignment',
        'duty_roster',
        'permissions',
        'lastUpdate',

        'previous_login',
        'last_login',
        'forum_last_login',
        'osa',
        'tos',
        'active',

        'extra_padding',
        'has_events',
        'note',
        'previous',
        'unitPatchPath',
        'usePeerageLands',
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

    /**
     * Stub getGreeting method.
     *
     * @return string
     */
    public function getGreeting(): string
    {
        return $this->rank['grade'];
    }

    public function getGreetingArray()
    {
        return [
            'rank' => $this->getGreeting(),
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

    public function hasNewExams(): bool
    {
        if ($this->last_name == 'Needham' || $this->last_name == 'Jones') {
            return true;
        }
        return false;
    }
}
