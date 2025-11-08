<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Rentway API (v1)

This repository has been extended with a mobile-friendly, token-based REST API under the `routes/api.php` file. All endpoints are versioned (`/api/v1/...`) and return a standardized JSON envelope:

```json
{
	"success": true,
	"message": "Vehicle list",
	"data": { }
}
```

### Implemented Endpoints

Public:
- `POST /api/v1/auth/login` – issue Sanctum token
- `POST /api/v1/auth/register` – create user + token
- `GET  /api/v1/vehicles` – list vehicles
- `GET  /api/v1/vehicle/{id}` – vehicle details
- `GET  /api/v1/services?category=ambulance|breakdown|schooltransport|stafftransport` – list filtered service ads

Protected (Bearer / Sanctum):
- `POST /api/v1/vehicles` (create)
- `PUT /api/v1/vehicles/{id}` (update)
- `DELETE /api/v1/vehicles/{id}` (delete)
- `GET /api/v1/bookings` / `POST /api/v1/bookings` / `GET|PUT|DELETE /api/v1/bookings/{id}`
- `GET|POST|PUT|DELETE /api/v1/advertisers` (Company model)
- `GET /api/v1/blacklist` / `POST /api/v1/blacklist`
- `POST /api/v1/services/request` (placeholder service request action)

### Authentication
Uses Laravel Sanctum. After login/register, store the returned `token` and send it as:

```
Authorization: Bearer <token>
```

### Resources & Validation
Form Request classes live in `app/Http/Requests/Api/V1/*`. Eloquent API Resources (e.g. `VehicleResource`) under `app/Http/Resources/V1` shape responses and embed related data (company + latest image).

### OpenAPI Stub
See `docs/openapi.yaml` for a starter specification you can enhance (add schemas, error payloads, examples).

### Testing
Initial feature tests in `tests/Feature` (e.g. `ApiVehicleTest.php`, `ApiAuthTest.php`). Extend with authenticated scenarios as needed.

### Error Format
All errors conform to the same envelope with `success:false` and a descriptive `message`.

### Next Steps
1. Expand Booking logic (pricing, overlap checks) inside API layer.
2. Add relationships for customers & images collections.
3. Introduce pagination metadata consistently (already stubbed).
4. Flesh out service request workflow (persist requests).
5. Add comprehensive Feature tests for protected CRUD flows.

---
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
