<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Authenticatable;


class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
    public function hasUserApplied(Authenticatable| User|int $user): bool
    {
        return $this->where('id',$this->id)
            ->whereHas(
                'jobApplications', function($query) use ($user) {
                    $query->where('user_id','=', $user->id ?? $user);
                }
            )->exists();
    }
    public function scopeFilter(Builder $query, array $filter): Builder
    {
        $search = $filter['search'] ?? null;
        $min_salary = $filter['min_salary'] ?? null;
        $max_salary = $filter['max_salary'] ?? null;
        $experience = $filter['experience'] ?? null;
        $category = $filter['category'] ?? null;

        if (!empty($search)) {
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('employer', function($query) use ($search) {
                      $query->where('company_name', 'like', '%' . $search . '%');
                  });
            });
        }

        if (!empty($min_salary) && !empty($max_salary)) {
            $query->whereBetween('salary', [$min_salary, $max_salary]);
        } elseif (!empty($min_salary)) {
            $query->where('salary', '>=', $min_salary);
        } elseif (!empty($max_salary)) {
            $query->where('salary', '<=', $max_salary);
        }

        if (!empty($experience)) {
            $query->where('experience', $experience);
        }

        if (!empty($category)) {
            $query->where('category', $category);
        }

        return $query;
    }
}
