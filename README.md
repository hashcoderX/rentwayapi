# rentwayapi

Laravel 10 headless REST API for Rentway. All endpoints are versioned under /api/v1, return JSON only, and use Laravel Sanctum for token-based auth. Swagger/OpenAPI documentation is generated and served for easy exploration.

## API overview

- Base URL: /api/v1
- Auth: Bearer token via Sanctum (login/register to receive token)
- Response envelope:

	{
		"success": true,
		"message": "...",
		"data": { }
	}

### Key domains

- Auth: POST /auth/login, POST /auth/register
- Vehicles: GET/POST/PUT/DELETE /vehicles, GET /vehicle/{id}
- Bookings: full CRUD with overlap checks and invoice generation on completion
- Advertisers/Companies, Customers, Ads, Services, Blacklist, Notifications
- Payments, Expenses, Invoices, Reports

Role-based access and rate limiting are applied to sensitive write operations.

## Swagger/OpenAPI docs

- UI: /api/documentation (via L5 Swagger)
- Artifacts: storage/api-docs/api-docs.json and storage/api-docs/api-docs.yaml

Global security (bearerAuth) is configured so you can authorize once and try endpoints.

## Project structure highlights

- Routes: routes/api.php (v1 endpoints), routes/web.php (convenience redirects)
- Controllers: app/Http/Controllers/Api/V1/*
- Requests: app/Http/Requests/Api/V1/* (validation)
- Resources: app/Http/Resources/V1/* (serialization)
- Middleware: ForceJsonResponse, UserRoleMiddleware
- OpenAPI: app/Swagger/OpenApi.php, annotations in controllers

## Local setup (summary)

1) Copy .env and configure DB; 2) composer install; 3) php artisan key:generate; 4) php artisan migrate --seed (seeds admin/manager/user); 5) php artisan l5-swagger:generate.

Owner: Sudharma HewaVitharana
