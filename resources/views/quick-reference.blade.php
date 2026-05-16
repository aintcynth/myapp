<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATT 2026 - Quick Reference</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="max-w-6xl mx-auto p-6">
        <header class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-500">ATT 2026</p>
                    <h1 class="text-4xl font-bold tracking-tight">Quick Reference Card</h1>
                    <p class="mt-2 text-slate-600">A concise project reference for setup, roles, routes, and security.</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border rounded-lg bg-white text-slate-800 shadow-sm hover:bg-slate-100">
                    Back to Home
                </a>
            </div>
        </header>

        <main class="space-y-8">
            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">3-Step Quick Start</h2>
                <div class="grid gap-4">
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Step 1: Import Database</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">Open phpMyAdmin
Create database: att_db
Go to SQL tab
Paste: db/rbac_schema.sql
Execute</pre>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Step 2: Access Application</h3>
                        <p class="mt-2 text-slate-700">Navigate to: <span class="font-mono">http://localhost/att_2026/login.php</span></p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Step 3: Login</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">Username: admin
Password: admin123
Click "Sign In"</pre>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Default Credentials</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">Role:     Admin
Username: admin
Password: admin123</pre>
                <p class="mt-4 text-sm text-amber-700 font-semibold">⚠️ Change password immediately after first login!</p>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Important URLs</h2>
                <div class="grid gap-3 text-sm text-slate-700">
                    <p><span class="font-semibold">Login:</span> http://localhost/att_2026/login.php</p>
                    <p><span class="font-semibold">Dashboard:</span> http://localhost/att_2026/</p>
                    <p><span class="font-semibold">Profile:</span> http://localhost/att_2026/?page=profile</p>
                    <p><span class="font-semibold">Change Password:</span> http://localhost/att_2026/?page=change_password</p>
                    <p><span class="font-semibold">User Management:</span> http://localhost/att_2026/?page=user_management</p>
                    <p><span class="font-semibold">Attendance:</span> http://localhost/att_2026/?page=attendance</p>
                    <p><span class="font-semibold">Classes:</span> http://localhost/att_2026/?page=class_list</p>
                    <p><span class="font-semibold">Students:</span> http://localhost/att_2026/?page=student_list</p>
                    <p><span class="font-semibold">Reports:</span> http://localhost/att_2026/?page=attendance_report</p>
                </div>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Default Roles</h2>
                <div class="overflow-x-auto rounded-2xl border border-slate-200">
                    <table class="min-w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="px-4 py-3">Role</th>
                                <th class="px-4 py-3">Permissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-slate-200">
                                <td class="px-4 py-3 font-semibold">Admin</td>
                                <td class="px-4 py-3">All (30+) - Full system access</td>
                            </tr>
                            <tr class="border-t border-slate-200 bg-slate-50">
                                <td class="px-4 py-3 font-semibold">Teacher</td>
                                <td class="px-4 py-3">Attendance, Classes, Students, Reports</td>
                            </tr>
                            <tr class="border-t border-slate-200">
                                <td class="px-4 py-3 font-semibold">Student</td>
                                <td class="px-4 py-3">View Attendance, Dashboard</td>
                            </tr>
                            <tr class="border-t border-slate-200 bg-slate-50">
                                <td class="px-4 py-3 font-semibold">Parent</td>
                                <td class="px-4 py-3">View Attendance, Reports, Dashboard</td>
                            </tr>
                            <tr class="border-t border-slate-200">
                                <td class="px-4 py-3 font-semibold">Staff</td>
                                <td class="px-4 py-3">View Attendance, Classes, Students</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="grid gap-4 lg:grid-cols-2">
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-4">Security Features</h2>
                    <ul class="grid gap-2 text-sm text-slate-700">
                        <li>✅ Bcrypt password hashing</li>
                        <li>✅ Secure session tokens</li>
                        <li>✅ SQL injection prevention</li>
                        <li>✅ Input validation</li>
                        <li>✅ Output escaping</li>
                        <li>✅ CSRF protection ready</li>
                        <li>✅ IP address tracking</li>
                        <li>✅ Audit logging</li>
                        <li>✅ Session expiration</li>
                        <li>✅ Remember me security</li>
                    </ul>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-4">Helper Functions</h2>
                    <pre class="whitespace-pre-wrap text-sm text-slate-700">hasPermission('view_attendance')
hasAnyPermission(['edit', 'delete'])
hasAllPermissions(['view', 'export'])
requirePermission('create_attendance')

getCurrentUser()
getUserFullName()
isAdmin()
isTeacher()
isStudent()
isParent()
isStaff()</pre>
                </div>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Common Tasks</h2>
                <div class="grid gap-4">
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Change Admin Password</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">1. Login as admin
2. Click profile dropdown
3. Select "Change Password"
4. Enter new password
5. Click "Update Password"</pre>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Create New User</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">1. Click "Users" in navigation
2. Click "Add New User"
3. Fill in details
4. Select role
5. Click "Add User"</pre>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">Test Different Role</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">1. Create user with role
2. Logout
3. Login as new user
4. Verify appropriate access
5. Check audit logs</pre>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h3 class="font-semibold">View Audit Logs</h3>
                        <pre class="whitespace-pre-wrap text-sm text-slate-700 mt-2">1. Login as admin
2. Check database: audit_log_tbl
3. View user actions
4. Check IP addresses
5. Review timestamps</pre>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Database Tables</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">users_tbl              - User accounts
roles_tbl              - User roles
permissions_tbl        - Available permissions
role_permissions_tbl   - Role-permission mapping
user_sessions_tbl      - Active sessions
audit_log_tbl          - Audit trail</pre>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Permissions</h2>
                <div class="grid gap-4 text-sm text-slate-700">
                    <div>
                        <p class="font-semibold">Users (5):</p>
                        <p class="whitespace-pre-wrap">view_users
create_user
edit_user
delete_user
manage_roles</p>
                    </div>
                    <div>
                        <p class="font-semibold">Attendance (5):</p>
                        <p class="whitespace-pre-wrap">view_attendance
create_attendance
edit_attendance
delete_attendance
export_attendance</p>
                    </div>
                    <div>
                        <p class="font-semibold">Classes (4):</p>
                        <p class="whitespace-pre-wrap">view_classes
create_class
edit_class
delete_class</p>
                    </div>
                    <div>
                        <p class="font-semibold">Students (4):</p>
                        <p class="whitespace-pre-wrap">view_students
create_student
edit_student
delete_student</p>
                    </div>
                    <div>
                        <p class="font-semibold">Reports (2):</p>
                        <p class="whitespace-pre-wrap">view_reports
generate_reports</p>
                    </div>
                    <div>
                        <p class="font-semibold">Settings (2):</p>
                        <p class="whitespace-pre-wrap">view_settings
edit_settings</p>
                    </div>
                    <div>
                        <p class="font-semibold">Dashboard (1):</p>
                        <p class="whitespace-pre-wrap">view_dashboard</p>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 lg:grid-cols-2">
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-4">Troubleshooting</h2>
                    <pre class="whitespace-pre-wrap text-sm text-slate-700">Login Not Working?
├─ Check database is imported
├─ Verify admin user exists
└─ Check password is correct

Permission Denied?
├─ Check user role
├─ Verify permissions assigned
└─ Check permission exists

Session Issues?
├─ Check database connection
├─ Verify session table exists
└─ Check server time

Pages Not Loading?
├─ Check file paths
├─ Verify files exist
└─ Check PHP error logs</pre>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-4">Pre-Deployment Checklist</h2>
                    <pre class="whitespace-pre-wrap text-sm text-slate-700">Database:
├─ [ ] MySQL running
├─ [ ] Database created
├─ [ ] Schema imported
└─ [ ] Connection verified

Application:
├─ [ ] All files present
├─ [ ] Configuration correct
├─ [ ] Permissions set
└─ [ ] Security enabled

Testing:
├─ [ ] Login works
├─ [ ] All pages accessible
├─ [ ] Permissions working
└─ [ ] Audit logging active

Security:
├─ [ ] Admin password changed
├─ [ ] HTTPS enabled
├─ [ ] Backups configured
└─ [ ] Error logging enabled</pre>
                </div>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Performance Tips</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">Database:
├─ Add indexes
├─ Archive old logs
└─ Optimize queries

Caching:
├─ Cache permissions
├─ Cache user data
└─ Browser caching

Sessions:
├─ Clean expired sessions
├─ Adjust timeout
└─ Monitor table size</pre>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Maintenance Schedule</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">Daily:
├─ Monitor error logs
├─ Check system status
└─ Verify backups

Weekly:
├─ Review audit logs
├─ Check user access
└─ Verify performance

Monthly:
├─ Review permissions
├─ Update documentation
└─ Performance review

Quarterly:
├─ Security audit
├─ Database optimization
└─ Access review</pre>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Support Resources</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">Quick Help:
├─ START_HERE.md
├─ QUICK_START.md
└─ README.md

Detailed Help:
├─ SETUP_AND_DEPLOYMENT.md
├─ RBAC_DOCUMENTATION.md
└─ RBAC_INTEGRATION.md

Deployment Help:
├─ DEPLOYMENT_CHECKLIST.md
├─ RBAC_ARCHITECTURE.md
└─ DELIVERY_SUMMARY.md</pre>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Next Steps</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">1. Read START_HERE.md
2. Read QUICK_START.md
3. Import database
4. Test login
5. Change admin password
6. Create users
7. Test roles
8. Deploy to production</pre>
            </section>

            <section class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Key Information</h2>
                <pre class="whitespace-pre-wrap text-sm text-slate-700">Version:        1.0
Status:         Production Ready
Release Date:   2024
Support:        Full Documentation
License:        Internal Use</pre>
            </section>

            <footer class="text-center text-sm text-slate-500 py-6">Quick Reference Card - ATT 2026 • Created: 2024 • Status: Production Ready</footer>
        </main>
    </div>
</body>
</html>