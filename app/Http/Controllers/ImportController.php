<?php

namespace App\Http\Controllers;

use App\Imports\IssurerImport;
use App\Imports\ProjectImport;
use App\Imports\TypeImport;
use App\Imports\WorkImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
   public function index()
   {
      return View('import.index');
   }
   public function type()
   {
      return View('import.type');
   }

   public function importType(Request $request)
   {
      Excel::import(new TypeImport, $request->file('file')->store('temp'));

      return redirect()->back();
   }

   public function issurer()
   {
      return View('import.issurer');
   }

   public function importIssurer(Request $request)
   {
      Excel::import(new IssurerImport, $request->file('file')->store('temp'));

      return redirect()->back();
   }

   public function work()
   {
      return View('import.work');
   }

   public function importWork(Request $request)
   {
      Excel::import(new WorkImport, $request->file('file')->store('temp'));

      return redirect()->back();
   }

   public function project()
   {
      return View('import.project');
   }

   public function importProject(Request $request)
   {
      Excel::import(new ProjectImport, $request->file('file')->store('temp'));

      return redirect()->back();
   }
}
