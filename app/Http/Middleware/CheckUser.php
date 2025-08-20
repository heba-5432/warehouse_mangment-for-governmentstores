<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
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

         $userRole =explode(',', auth()->user()->role_id);//get the user role _id value

    $role_title=Roles::where('role_title','=','super_admin')->value('id');



        // If role is 'admin', grant access to all routes



        // If role is 'admin', grant access to all routes

if (in_array($role_title,  $userRole)) {

        return $next($request);
       }
           // return response('super admin') ;

        //}
//return $next($request);




        // If role is 'viewer', check for route restrictions
       if (!in_array($role_title,  $userRole)) {
            // Example: Restrict access to some routes
           //if (in_array($request->route()->getName(), ['restricted_routes_viewer/*'])) {
            return redirect()->back()->with('messege','donot have permission for this page');

                //return response('viewer');

            //}
        }
           return $next($request);





          }
        }



