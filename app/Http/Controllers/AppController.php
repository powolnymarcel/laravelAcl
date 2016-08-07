<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
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
        foreach ($request['email'] as $email) {
            $user = User::where('email', $email)->first();
            $user->roles()->detach();
            if ($request['role_user']) {
                $user->roles()->attach(Role::where('name', 'Utilisateur')->first());
            }
            if ($request['role_author']) {
                $user->roles()->attach(Role::where('name', 'Auteur')->first());
            }
            if ($request['role_admin']) {
                $user->roles()->attach(Role::where('name', 'Admin')->first());
            }
        }

        return redirect()->back();
    }
}