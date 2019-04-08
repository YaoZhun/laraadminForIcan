<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

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

use App\Models\Game_permission;

class Game_permissionsController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'name', 'LoginTime'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Game_permissions', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Game_permissions', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Game_permissions.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Game_permissions');
		
		if(Module::hasAccess($module->id)) {
			return View('la.game_permissions.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new game_permission.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created game_permission in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Game_permissions", "create")) {
		
			$rules = Module::validateRules("Game_permissions", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Game_permissions", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.game_permissions.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified game_permission.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Game_permissions", "view")) {
			
			$game_permission = Game_permission::find($id);
			if(isset($game_permission->id)) {
				$module = Module::get('Game_permissions');
				$module->row = $game_permission;
				
				return view('la.game_permissions.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('game_permission', $game_permission);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("game_permission"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified game_permission.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Game_permissions", "edit")) {			
			$game_permission = Game_permission::find($id);
			if(isset($game_permission->id)) {	
				$module = Module::get('Game_permissions');
				
				$module->row = $game_permission;
				
				return view('la.game_permissions.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('game_permission', $game_permission);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("game_permission"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified game_permission in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Game_permissions", "edit")) {
			
			$rules = Module::validateRules("Game_permissions", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Game_permissions", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.game_permissions.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified game_permission from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Game_permissions", "delete")) {
			Game_permission::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.game_permissions.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('game_permissions')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Game_permissions');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/game_permissions/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Game_permissions", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/game_permissions/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Game_permissions", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.game_permissions.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
