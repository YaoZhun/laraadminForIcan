<?php
namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\User;


class UesrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $testDB = DB::table('users')->select('name')->get();
        $test1 = 'test1';
        $test2 = 'test2';
        return view('la.uesrdata.uesr',[
            'test1'=>$test1,
            'test2'=>$test2,
            'testDB'=>$testDB,
        ]);
    }
    public function PUT(){ 
        return view('la.uesrdata.uesr');
    }
}