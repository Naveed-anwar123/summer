<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Bpost;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $events = [
      'created' => Events\NewUserEvent::class
    ];
    protected $fillable = [
        'name', 'email', 'password','file' , 'referral_id','affiliate_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function post()
    {
        return $this->hasMany('App\Post','user_id','id');
    }
    public function bpost()
    {
        return $this->hasMany('App\Bpost');

    }
// Topic waly table main user if id foreign key gai hai
    public function topic()
    {
        return $this->hasMany('App\Validate');
    }

    // belogsTo matlat dosry table ki primary is main foreign aai hai
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function isSubscriber()
    {
        if(trim($this->role->rolename) == 'subscriber')
        {
            return true;
        }
        return false;
    }

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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';

    }

    public function mytopics()
    {
        return $this->hasMany('App\Topic','user_id','id');
    }
    public function myreplies()
    {
        return $this->hasMany('App\Reply','user_id','id');
    }
}
