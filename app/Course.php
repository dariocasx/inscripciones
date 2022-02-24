<?php

namespace App;

use App\Scopes\CourseScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'courses';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'profesor_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CourseScope);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }



    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function getPrice()
    {
        return $this->price ? '$'.number_format($this->price, 2) : 'FREE';
    }

    public function scopeSearchResults($query)
    {
        $query->when(request('teacher'), function($query) {
                $query->whereHas('teachers', function($query) {
                    $query->whereId(request('teacher'));
                });
            });
    }
}
