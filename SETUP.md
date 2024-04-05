1. clone to server

2. run 'cp env.example .env'

3. run 'nano .env'
    add url, db settings etc

4. run 'php artisan migrate --seed'

5. run 'composer install'

6. run 'npm run build'
    if npm not available, upload prebuilt assets to public\build\*.*