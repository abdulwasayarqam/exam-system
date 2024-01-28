<?php

namespace App\Providers;
use App\Models\Question;
use App\Policies\DepartmentPolicy; // Import DepartmentPolicy
use App\Policies\SubjectPolicy;    // Import SubjectPolicy
use App\Policies\PaperPolicy;      // Import PaperPolicy
use App\Policies\QuestionPolicy;
use App\Models\Department;         // Import Department model
use App\Models\Subject;            // Import Subject model
use App\Models\Paper;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
        Subject::class => SubjectPolicy::class,
        Paper::class => PaperPolicy::class,
        Question::class=>QuestionPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-departments', function ($user) {
            return $user->can('view', Department::class);
        });

        Gate::define('access-subjects', function ($user) {
            return $user->can('view', Subject::class);
        });

        Gate::define('access-papers', function ($user) {
            return $user->can('view', Paper::class);
        });
        Gate::define('access-questions', function ($user) {
            return $user->can('view', Paper::class);
        });
    }
}
