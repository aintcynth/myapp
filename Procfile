web: php artisan serve --host=0.0.0.0 --port=$PORT --no-interaction

release: php artisan migrate --force --no-interaction
release: php artisan storage:link || true
release: php artisan view:clear --no-interaction || true
release: npm install
release: npm run build
release: php artisan config:cache --no-interaction
release: php artisan route:cache --no-interaction
release: php artisan view:cache --no-interaction
release: php artisan optimize --no-interaction
