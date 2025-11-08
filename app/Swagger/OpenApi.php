<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="Rentway API",
 *   description="Mobile-friendly REST API v1. Secured endpoints require a Bearer token obtained via /api/v1/auth/login. API Owner: Sudharma HewaVitharana."
 * )
 * @OA\Server(url="/api", description="API base path")
 * @OA\SecurityScheme(securityScheme="bearerAuth", type="http", scheme="bearer", bearerFormat="JWT")
 * @OA\SecurityRequirement(name="bearerAuth")
 * @OA\Components(
 *   @OA\Response(
 *     response="Unauthorized",
 *     description="Unauthorized",
 *     @OA\JsonContent(type="object",
 *       @OA\Property(property="success", type="boolean", example=false),
 *       @OA\Property(property="message", type="string", example="Unauthorized")
 *     )
 *   ),
 *   @OA\Response(
 *     response="Forbidden",
 *     description="Forbidden",
 *     @OA\JsonContent(type="object",
 *       @OA\Property(property="success", type="boolean", example=false),
 *       @OA\Property(property="message", type="string", example="Forbidden")
 *     )
 *   ),
 *   @OA\Response(
 *     response="ValidationError",
 *     description="Validation failed",
 *     @OA\JsonContent(type="object",
 *       @OA\Property(property="success", type="boolean", example=false),
 *       @OA\Property(property="message", type="string", example="Validation failed"),
 *       @OA\Property(property="errors", type="object")
 *     )
 *   )
 * )
 */
class OpenApi {}

/**
 * Reusable Schemas
 */

/**
 * @OA\Schema(
 *   schema="ApiEnvelopeSuccess",
 *   type="object",
 *   @OA\Property(property="success", type="boolean", example=true),
 *   @OA\Property(property="message", type="string", example="Operation successful"),
 *   @OA\Property(property="data", type="object")
 * )
 */

/** Placeholder to keep file-level schemas below intact */

/**
 * @OA\Schema(
 *   schema="ApiEnvelopeError",
 *   type="object",
 *   @OA\Property(property="success", type="boolean", example=false),
 *   @OA\Property(property="message", type="string", example="Validation failed"),
 *   @OA\Property(property="errors", type="object")
 * )
 */

/**
 * @OA\Schema(
 *   schema="PaginationMeta",
 *   type="object",
 *   @OA\Property(property="current_page", type="integer", example=1),
 *   @OA\Property(property="last_page", type="integer", example=5),
 *   @OA\Property(property="per_page", type="integer", example=15),
 *   @OA\Property(property="total", type="integer", example=62)
 * )
 */

/**
 * @OA\Schema(
 *   schema="Vehicle",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=10),
 *   @OA\Property(property="vehicle_no", type="string", example="ABC-1234"),
 *   @OA\Property(property="brand", type="string", example="Toyota"),
 *   @OA\Property(property="model", type="string", example="Corolla"),
 *   @OA\Property(property="year", type="integer", example=2023)
 * )
 */

/**
 * @OA\Schema(
 *   schema="Booking",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=55),
 *   @OA\Property(property="vehicle_no", type="string", example="ABC-1234"),
 *   @OA\Property(property="customer_id", type="integer", example=7),
 *   @OA\Property(property="book_start_date", type="string", format="date", example="2025-11-01"),
 *   @OA\Property(property="return_date", type="string", format="date", example="2025-11-05"),
 *   @OA\Property(property="status", type="string", example="pending")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Customer",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=7),
 *   @OA\Property(property="full_name", type="string", example="John Doe"),
 *   @OA\Property(property="nic", type="string", example="123456789V"),
 *   @OA\Property(property="telephone_no", type="string", example="0771234567")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Company",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=3),
 *   @OA\Property(property="name", type="string", example="Rentway Ltd"),
 *   @OA\Property(property="email", type="string", example="info@rentway.test"),
 *   @OA\Property(property="city", type="string", example="Colombo")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Ad",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=12),
 *   @OA\Property(property="title", type="string", example="Weekend Discount"),
 *   @OA\Property(property="status", type="string", example="active"),
 *   @OA\Property(property="company_id", type="integer", example=3)
 * )
 */

/**
 * @OA\Schema(
 *   schema="Notification",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=22),
 *   @OA\Property(property="type", type="string", example="booking"),
 *   @OA\Property(property="read_state", type="string", example="unread"),
 *   @OA\Property(property="notifiaction_date", type="string", format="date-time", example="2025-11-07T10:15:00Z")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Payment",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=80),
 *   @OA\Property(property="amount", type="number", format="float", example=1500.00),
 *   @OA\Property(property="payment_type", type="string", example="invoice"),
 *   @OA\Property(property="date_time", type="string", format="date-time", example="2025-11-07T09:30:00Z")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Expense",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=44),
 *   @OA\Property(property="expenses_type", type="string", example="maintenance"),
 *   @OA\Property(property="amount", type="number", format="float", example=250.00),
 *   @OA\Property(property="date_time", type="string", format="date-time", example="2025-11-06T14:00:00Z")
 * )
 */

/**
 * @OA\Schema(
 *   schema="Invoice",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=101),
 *   @OA\Property(property="customer_id", type="integer", example=7),
 *   @OA\Property(property="vehicle_no", type="string", example="ABC-1234"),
 *   @OA\Property(property="invoice_date", type="string", format="date", example="2025-11-07"),
 *   @OA\Property(property="invoice_status", type="string", example="open"),
 *   @OA\Property(property="net_total", type="number", format="float", example=1800.00)
 * )
 */

/**
 * @OA\Schema(
 *   schema="BlacklistItem",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=5),
 *   @OA\Property(property="nic", type="string", example="987654321V"),
 *   @OA\Property(property="reason", type="string", example="Fraudulent activity")
 * )
 */

/**
 * @OA\Schema(
 *   schema="PaginatedVehicles",
 *   allOf={
 *      @OA\Schema(ref="#/components/schemas/ApiEnvelopeSuccess"),
 *      @OA\Schema(
 *        @OA\Property(property="data", type="object",
 *          @OA\Property(property="items", type="array", @OA\Items(ref="#/components/schemas/Vehicle")),
 *          @OA\Property(property="pagination", ref="#/components/schemas/PaginationMeta")
 *        )
 *      )
 *   }
 * )
 */

