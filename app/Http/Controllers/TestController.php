<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
   public function index()
   {

        $user = Auth::guard('admin')->user();
        return $user;
   }

   public function store(Request $request)
   {
       //
   }

   public function show($id)
   {
       //
   }

   public function update(Request $request, $id)
   {
       //
   }

   public function destroy($id)
   {
       //
   }
}
