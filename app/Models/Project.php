<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'preview',
        'collaborators',
        'description',
        'technologies',
        'type_id',
    ];

    protected $appends = [
        'full_preview_img'
    ];

    /*
        Custom attributes
    */

    public function getFullPreviewImgAttribute()
    {
        if($this->preview){
            return asset('storage/'. $this->preview);
        }
        return null;
    }

    /*
        Relationships
    */
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {

        return $this->belongsToMany( Technology::class);

    }
}
