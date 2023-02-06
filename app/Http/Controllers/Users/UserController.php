<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\Users\UserRepositoryInterface;


class UserController extends Controller
{

    protected $User;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->User = $User;
    }

    public function index()
    {
        return $this->User->GetUsers();
    }

    public function store(Request $request)
    {
        return $this->User->StoreUsers($request);
    }

    public function show($id)
    {
        return $this->User->ShowUsers($id);
    }

    public function update(Request $request)
    {
        return $this->User->UpdateUsers($request);
    }


    public function destroy(Request $request)
    {
        return $this->User->DeleteUsers($request);
    }

}
