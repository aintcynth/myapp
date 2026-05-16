<?php

use Illuminate\Support\Arr;

if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
        return auth()->user();
    }
}

if (!function_exists('getUserFullName')) {
    function getUserFullName(): ?string
    {
        $user = getCurrentUser();
        return $user ? $user->name : null;
    }
}

if (!function_exists('currentUserRole')) {
    function currentUserRole(): ?string
    {
        $user = getCurrentUser();
        return $user ? $user->role : null;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin(): bool
    {
        return currentUserRole() === 'admin';
    }
}

if (!function_exists('isStaff')) {
    function isStaff(): bool
    {
        return currentUserRole() === 'staff';
    }
}

if (!function_exists('isTeacher')) {
    function isTeacher(): bool
    {
        return currentUserRole() === 'teacher';
    }
}

if (!function_exists('isStudent')) {
    function isStudent(): bool
    {
        return currentUserRole() === 'student';
    }
}

if (!function_exists('isParent')) {
    function isParent(): bool
    {
        return currentUserRole() === 'parent';
    }
}

if (!function_exists('getRolePermissions')) {
    function getRolePermissions(string $role): array
    {
        $permissions = [
            'admin' => [
                'view_dashboard',
                'view_attendance',
                'create_attendance',
                'edit_attendance',
                'delete_attendance',
                'export_attendance',
                'view_classes',
                'create_class',
                'edit_class',
                'delete_class',
                'view_students',
                'create_student',
                'edit_student',
                'delete_student',
                'view_reports',
                'generate_reports',
                'view_settings',
                'edit_settings',
                'view_users',
                'create_user',
                'edit_user',
                'delete_user',
                'manage_roles',
            ],
            'teacher' => [
                'view_dashboard',
                'view_attendance',
                'create_attendance',
                'edit_attendance',
                'delete_attendance',
                'export_attendance',
                'view_classes',
                'view_students',
                'view_reports',
            ],
            'staff' => [
                'view_dashboard',
                'view_attendance',
                'create_attendance',
                'edit_attendance',
                'delete_attendance',
                'export_attendance',
                'view_classes',
                'view_students',
            ],
            'student' => [
                'view_dashboard',
                'view_attendance',
            ],
            'parent' => [
                'view_dashboard',
                'view_attendance',
                'view_reports',
            ],
        ];

        return $permissions[$role] ?? [];
    }
}

if (!function_exists('hasPermission')) {
    function hasPermission(string $permission): bool
    {
        $role = currentUserRole();
        if (!$role) {
            return false;
        }

        if ($role === 'admin') {
            return true;
        }

        return in_array($permission, getRolePermissions($role), true);
    }
}

if (!function_exists('hasAnyPermission')) {
    function hasAnyPermission(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('hasAllPermissions')) {
    function hasAllPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (!hasPermission($permission)) {
                return false;
            }
        }

        return true;
    }
}

if (!function_exists('requirePermission')) {
    function requirePermission(string $permission)
    {
        if (!hasPermission($permission)) {
            abort(403, 'Unauthorized action.');
        }

        return true;
    }
}
