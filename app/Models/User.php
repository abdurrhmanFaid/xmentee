<?php

namespace App\Models;

use App\Traits\Subscribed;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail, HasLocalePreference
{
    use Notifiable, HasRoleAndPermission, Subscribed;

    /**
     * @var array
     */
    protected $appends = ['formattedImage', 'formattedUsername'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'band_id', 'batch_id', 'email_verified_at',
        'created_at', 'updated_at', 'image_path','default_locale', 'email', 'messaging_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function preferredLocale()
    {
        return $this->locale();
    }

    /**
     * @return string
     */
    public function getFormattedUsernameAttribute()
    {
        return "@{$this->username}";
    }
    /**
     * @return mixed|string
     */
    public function getFormattedImageAttribute()
    {
        return $this->formattedImage();
    }

    /**
     * @param int $size
     * @return mixed|string
     */
    public function formattedImage($size = 48)
    {
        if($this->image_path) {
            return $this->image_path . "-/scale_crop/1024x1024/center/-/quality/best/-/progressive/yes/-/resize/{$size}/";
        };

        $postfix = $this->gender ? "-{$this->gender}" : '';
        return theme('images', "person{$postfix}-{$size}.png");
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function locale()
    {
        return $this->default_locale ?: config('app.locale');
    }
    /**
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function title($locale = 'ar')
    {
        return __($this->isStudent() ? 'default.student' : 'default.instructor' , [], $locale);
    }

    public function bandLessonsCount()
    {
        return $this->band->lessons()->count();
    }

    public function batchLessonsCount()
    {
        return $this->batch->lessons()->count();
    }
    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return mixed
     */
    public function bandMessagingGroupId()
    {
        return $this->bandMessaging()['groupId'];
    }

    /**
     * @return mixed
     */
    public function bandNotificationsLocale()
    {
        return $this->bandMessaging()['locale'];
    }

    /**
     * @return mixed
     */
    public function bandMessaging()
    {
        return $this->band->messaging();
    }

    /**
     * @return mixed
     */
    public function messagingId()
    {
        return $this->messaging_id;
    }

    /**
     * @param $count
     */
    public function pointsUp($count)
    {
        $this->increment('points', $count);
    }

    /**
     * @param $count
     */
    public function pointsDown($count)
    {
        $this->decrement('points', $count);
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return in_array($this->email, config('site.admins_emails'));
    }

    /**
     * @param $task
     * @return mixed
     */
    public function hasSolved($task)
    {
        return \DB::table('taskables')->where('task_id', $task->id)->whereIn('taskable_id', array_merge([$this->id], $this->groups->pluck('id')->toArray()))->first();
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function friendsInAllEnrolledGroups()
    {
        $members = [];

        foreach($this->groups as $group) {
            foreach ($group->members as $member) {
                if(!in_array($member->id, array_column($members, 'id')) && !$this->id == $member->id) {
                    array_push($members, $member);
                }
            }
        }
        return collect($members);
    }
    /**
     * @return bool
     */
    public function isInstructor()
    {
        return $this->ownsAnyBand();
    }

    /**
     * @return mixed
     */
    public function batchStudents()
    {
        return $this->batch->students;
    }

    /**
     * @return mixed
     */
    public function bandStudents()
    {
        return $this->band->students();
    }

    /**
     * @return bool
     */
    public function isStudent()
    {
        return !$this->ownsAnyBand();
    }

    /**
     * @return bool
     */
    public function ownsAnyBand()
    {
        return ! $this->batch_id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tasks()
    {
        return $this->morphToMany(Task::class, 'taskable')->withPivot(['solution']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_member', 'member_id', 'group_id');
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_student', 'student_id', 'payment_id')
            ->withPivot('paid_at', 'value', 'created_at');
    }
}
