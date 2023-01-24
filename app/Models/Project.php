<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Technology;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'slug', 'image', 'linkTo', 'type_id'];

    public static function generateSlug($title)
    {
        $project_slug = Str::slug($title);
        return $project_slug;
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * The technologies that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
