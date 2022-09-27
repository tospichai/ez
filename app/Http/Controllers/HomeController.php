<?php

namespace App\Http\Controllers;

use App\Models\IssurerModel;
use App\Models\ProjectModel;
use App\Models\TypeModel;
use App\Models\User;
use App\Models\WorkModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      if (!Auth::check()) {
         return redirect()->route('login');
      }
      // ->whereIn('id', [1, 2, 3])
      $user = User::find(Auth()->id());
      $project = ProjectModel::orderby('ordinal')->get();

      $type = TypeModel::orderby('ordinal');
      if(is_array(json_decode($user->type))){
         $type->whereIn('id', json_decode($user->type));
      }
      $type = $type->get();

      $issurer = IssurerModel::orderby('ordinal');
      if(is_array(json_decode($user->issurer))){
         $issurer->whereIn('id', json_decode($user->issurer));
      }
      $issurer = $issurer->get();

      $work = WorkModel::orderby('ordinal');
      if(is_array(json_decode($user->work))){
         $work->whereIn('id', json_decode($user->work));
      }
      $work = $work->get();

      return View('home.index',compact('project','type','issurer','work'));
   }

   public function data(Request $request)
   {
      if (!Auth::check()) {
         return redirect()->route('login');
      }

      $search = $request->get('search');

      if($search){
         if($search == 'project'){
            $data = ProjectModel::orderby('ordinal')->get();
            $name = 'Project';
         }
         if($search == 'type'){
            $data = TypeModel::orderby('ordinal')->get();
            $name = 'Document Type';
         }
         if($search == 'issurer'){
            $data = IssurerModel::orderby('ordinal')->get();
            $name = 'Issurer';
         }
         if($search == 'work'){
            $data = WorkModel::orderby('ordinal')->get();
            $name = 'Work Type/Structure';
         }
      }

      return response()->json(['data' => $data, 'name' => $name]); ;
   }

   public function setting(Request $request)
   {
      if (!Auth::check()) {
         return redirect()->route('login');
      }

      $table = $request->table;
      $check = $request->issurercheck;

      if($table){
         $user = User::find(Auth::id());
         $user[$table] = json_encode(array_map('floatval', $check));
         $user->save();
      }

      return redirect()->back();
   }
}
