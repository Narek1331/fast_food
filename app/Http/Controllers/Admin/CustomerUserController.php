<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class CustomerUserController extends Controller
{
    /**
     * CustomerUserController constructor.
     *
     * @param UserService $user_serv The user service instance
     */
    public function __construct(UserService $user_serv)
    {
        $this->user_serv = $user_serv;
    }

    /**
     * Display a listing of all customer users.
     *
     * @return \Illuminate\View\View The view for listing all customer users
     */
    public function index()
    {
        $users = $this->user_serv->paginateAllCustomers();

        return view('admin.user.customer.index', compact('users'));
    }
}
