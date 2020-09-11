# api.passport.local

Backend implementation of authentication by Laravel Passport in [Vue Nuxt.JS application](https://github.com/N1ebieski/passport.local). 

## Important things

.ENV config (my config in .env.example):

1. PASSPORT_CLIENT_ID and PASSPORT_CLIENT_SECRET must contains id and secret from Laravel Password Grant Client
2. CORS_ALLOWED_ORIGINS must contains allowed domains (local and production) with (if any) ports AND protocols of frontend app

CORS config file (my config in config/cors.php)

1. 'supports_credentials' leave to false
2. 'path' must contains allowed urls paths