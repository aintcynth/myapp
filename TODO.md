# Deployment Cleanup TODO

- [x] Inspect project structure relevant to Railway/Supabase deployment.
- [x] Update `config/database.php` default DB connection to `pgsql` for Supabase.
- [x] Update `Procfile` to run Laravel production release steps (migrate/config/routes/view cache/optimize) for Railway.
- [x] Ensure `.gitignore` covers unwanted local junk (including duplicate `.DS_Store`).
- [ ] Review and fix any remaining deployment blockers (e.g., missing templates/routes, runtime storage setup, CI checks).
- [ ] Prepare GitHub deployment documentation (env vars + Railway release instructions).

