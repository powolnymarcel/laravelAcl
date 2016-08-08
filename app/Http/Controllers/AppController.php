<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
Use Closure;
use Illuminate\Http\Request;
class AppController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }

    public function getAuthorPage()
    {
        return view('author');
    }
    public function getAdminPage()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }
    public function getGenerateArticle()
    {
        return response('Article generated!', 200);
    }

    public function postAdminAssignRoles(Request $request)
    {
        if(isset($request['role_user']) ) {
            foreach ($request['role_user'] as $id => $on) {
                $user = User::where('id', $id)->first();
               $user->roles()->sync($user->id,false);
            }
    }
            if (isset($request['role_author'])) {
                foreach ($request['role_author'] as $id => $on) {
                    $user = User::where('id', $id)->first();
                    $user->roles()->sync($user->id,false);
                }
            }
            if (isset($request['role_admin'])) {
                foreach ($request['role_admin'] as $id => $on) {
                    $user = User::where('id', $id)->first();
                    $user->roles()->sync($user->id,falsezzz);
                }
        }
                    dd();
        //dd(Role::with('users')->where('name', 'Admin')->get());
        //dd($request['role_user']);
            if ($request['role_user'] ) {
                foreach ($request['role_user'] as $email => $on) {
                    $user = User::where('id', $email)->first();
                    $user->roles()->sync();
                }
            }
            if ($request['role_author']) {
                foreach ($request['role_author'] as $email => $on) {
                    $user = User::where('id', $email)->first();
                    $user->roles()->sync();

                }
            }
            if ($request['role_admin']) {
                foreach ($request['role_admin'] as $email => $on) {
                    $user = User::where('id', $email)->first();
                    $user->roles()->sync();

                }
            }


        return redirect()->back();

      //  $user = User::where('email', $request['email'])->first();
      //  $user->roles()->detach();
      //  if ($request['role_user']) {
      //      $user->roles()->attach(Role::where('name', 'User')->first());
      //  }
      //  if ($request['role_author']) {
      //      $user->roles()->attach(Role::where('name', 'Author')->first());
      //  }
      //  if ($request['role_admin']) {
      //      $user->roles()->attach(Role::where('name', 'Admin')->first());
      //  }
      //  return redirect()->back();


    }
}