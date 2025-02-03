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

        $users_aw1 =Roles::Leftjoin("users","roles.id","=","users.role_id")
        ->where('users.role_id','=',$userRole)
        ->select('users.*','roles.*');



        // If role is 'admin', grant access to all routes
       if ($users_aw1->value('role_title') == ('super_admin')){
        return $next($request);
       }
           // return response('super admin') ;

        //}
//return $next($request);




        // If role is 'viewer', check for route restrictions
        if ($users_aw1->value('role_title') != 'super_admin') {
            // Example: Restrict access to some routes
           //if (in_array($request->route()->getName(), ['restricted_routes_viewer/*'])) {
            return redirect()->back()->with('messege','donot have permission for this page');

                //return response('viewer');

            //}
        }
           return $next($request);





          }
        }



