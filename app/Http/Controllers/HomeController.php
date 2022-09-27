<?php

namespace App\Http\Controllers;

use App\Models\IssurerModel;
use App\Models\ProjectModel;
use App\Models\TypeModel;
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
      $project = ProjectModel::orderby('ordinal')->get();
      $type = TypeModel::orderby('ordinal')->get();
      $issurer = IssurerModel::orderby('ordinal')->get();
      $work = WorkModel::orderby('ordinal')->get();

      return View('home.index',compact('project','type','issurer','work'));
   }
}
