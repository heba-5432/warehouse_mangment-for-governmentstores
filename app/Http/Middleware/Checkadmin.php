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




                $userRole = auth()->user()->role_id;//get the user role _id value

                $Id1= Roles::where('role_title','=','super_admin')->value('id');//superaadmin
    $Id2= Roles::where('role_title','=','admin')->value('id'); //admin


                // If role is 'admin', grant access to all routes
               if ($userRole ==   $Id1){
                return $next($request);
               }
                   // return response('super admin') ;

                //}
        //return $next($request);




                // If role is 'viewer', check for route restrictions
                if (($userRole ==  $Id1)or($userRole ==  $Id2)){
                    return $next($request);
                    // Example: Restrict access to some routes
                   //if (in_array($request->route()->getName(), ['restricted_routes_viewer/*'])) {


                        //return response('viewer');

                    //}
                }
                return redirect('/personal')->with('messege','donot have permission for this page');


    }
}
