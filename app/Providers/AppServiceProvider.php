<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Xem danh sách users
        Gate::define('view-users', fn(User $u) => in_array($u->role, ['admin', 'super admin']));

        // Tạo user
        Gate::define('create-user', fn(User $u) => in_array($u->role, ['admin', 'super admin']));

        // Sửa user
        Gate::define('edit-user', function (User $u, User $target) {
            return $u->role === 'super admin'
                || ($u->role === 'admin' && $target->role === 'user')
                || $u->id === $target->id;
        });

        // Xóa user
        Gate::define('delete-user', fn(User $u) => $u->role === 'super admin');
    }
}
