<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Registro;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param User $model
     * @return View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    /**
     * Display a listing of the users
     *
     */
    public function massive()
    {
        return view('users.massive');
    }

    public function import(Request $request)
    {
        $this->Validate($request, [
            'usuarios' => 'required|mimes:xlsx',
        ]);

        $import = new UsersImport();
        $import->import($request->usuarios);
//        foreach ($import->failures() as $failure) {
//            $row = $failure->row();
//            $failure->attribute(); // either heading key (if using heading row concern) or column index
//            dd( array_push($failure->errors(),$failure->row())); // Actual error messages from Laravel validator
//            $failure->values(); // The values of the row that has failed.
//        }
        $ar = $import->failures();
        dd($ar[0]);
//        return redirect('user.index')->with('success', 'All good!');
    }
}
