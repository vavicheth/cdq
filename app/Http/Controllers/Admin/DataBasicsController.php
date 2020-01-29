<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class DataBasicsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('data_basic_access')) {
            return abort(401);
        }
        return view('admin.data_basics.index');
    }
}
