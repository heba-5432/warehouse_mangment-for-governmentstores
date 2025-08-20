<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user=Auth::user();
        if(!$user)
        {

                // If not authenticated, deny access with a 403 Forbidden response
                return Response('Access Denied', 403);
            }





                $userRole =explode(',', auth()->user()->role_id);//get the user role _id value

                $Id1= Roles::where('role_title','=','super_admin')->value('id');//superaadmin
    $Id2= Roles::where('role_title','=','admin')->value('id'); //admin



$pr=[$Id1, $Id2];

$common = array_intersect($pr, $userRole);


                // If role is 'admin', grant access to all routes
               if (!empty($common )){
                return $next($request);
               }
                   // return response('super admin') ;

                //}
        //return $next($request);




                // If role is 'viewer', check for route restrictions

                return redirect('/store_items/store_singel_user_loans')->with('messege','donot have permission for this page');


    }
}
