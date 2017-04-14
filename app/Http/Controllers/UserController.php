<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function getUsers() {
		if(request('perPage') && is_numeric(request('perPage'))) {
			$perPage = request('perPage');
		} else if(request('perPage') && request('perPage') == 'all') {
			$perPage = User::count();
		} else {
			$perPage = 10;
		}

		$users = User::orderBy('name')->paginate($perPage);

		if (request()->ajax()) {
			return view('users.partials.user', compact('users'))->render();
		}

		return view('users.list', compact('users'));
	}
}