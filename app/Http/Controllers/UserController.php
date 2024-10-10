<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class UserController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$users = DB::table('users')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index',['users' => $users]);
 
    }
}