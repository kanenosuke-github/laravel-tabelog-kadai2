<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if($request->filled('search')) {
           $search = $request->input('search');
           $query->where('name', 'like', "%$search%")
           ->orWhere('email','like',"%$search%");
        }

        $members = $query->paginate(10);
        return view('admin.members.index',compact('members'));
    }

    public function show(User $member)
    {
        return view('admin.members.show',compact('member'));
    }
}
