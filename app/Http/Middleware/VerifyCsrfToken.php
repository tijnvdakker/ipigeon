<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/employees/employee_active',
        '/timesheet/hour_status',
        '/orders/edit_order_product_status',
        '/orders/complete_order/{id}',
        '/orders/retrieve_orders',
        '/timesheet/month_select',
        '/timesheet/change_employee_hour_edit_right',
        '/timesheet/change_employee_month_edit_rights'
    ];
}
