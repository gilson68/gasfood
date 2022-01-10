<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function search($filter = NULL)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    /**
     * Get Details
     */
    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * Get Profile
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profilesAvailable($filter = NULL)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.plan_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.profile_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('plan.name', 'LIKE', '%{$filter}%');
            }
        })
        ->paginate();
        return $profiles;
    }
}

