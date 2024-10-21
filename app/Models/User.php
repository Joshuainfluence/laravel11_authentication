<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes; //added soft deletes

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    // Relationships- example: one to one with profile
    // public function profile(){
    //     return $this->hasOne(Profile::class); //assuming a profile model exists
    // }

    // relationships- example: one to many with posts
    // public function posts(){
    //     return $this->hasMany(Post::class); //Assuming a post model exists
    // }

    // relationships- example: many to many with roles
    // public function roles(){
    //     return $this->belongsToMany(Role::class); //assuming the role model exists
    // }

    // accessor: capitalize the user's name when retrieved
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    // mutator: automatically hash the password when setting it
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    // Query scope: Get verified users
    public function scopeVerified($query){
        return $query->whereNotNull('email_verified_at');
    }

}

