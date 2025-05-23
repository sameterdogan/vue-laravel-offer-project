<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;


class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;
    protected static function boot()
    {
        parent::boot();
        static::created(function ($offer) {
            $offer->slug = $offer->generateSlug($offer->offer_project_name);
            $offer->save();
        });
    }
    private function generateSlug($projectName)
    {
        if (static::whereSlug($slug = Str::slug($projectName))->exists()) {
            $max = static::whereProjectName($projectName)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
