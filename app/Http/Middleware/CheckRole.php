<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use App\Models\UserInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::user()->_id;
        $customers = Customer::Where(['employee_code' => $user_id]);
        if (Auth::user()->info->role == UserInfo::ROLE['admin']) {
            return $next($request);
        } else if (empty($customers) > 0) {
            return $next($request);
        }
    }
}
