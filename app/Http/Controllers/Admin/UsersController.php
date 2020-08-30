<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        
        return view('admin.users.create');
    }

    public function store(Request $data)
    {

    
            $user = User::create([
                                    'name'          => $data['name'],
                                    'role'          => 1,
                                    'email'         => $data['email'],
                                    'phone'         => $data['phone'],
                                    'job_id'        => $data['job_id'],
                                    'address'       => $data['address'],
                                    'password'      => Hash::make($data['password']),
                                    
                                ]);

    
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
       
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function destroy($user_id)
    {
        
        $user_res=User::where('id',$user_id)->delete();

       
        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
