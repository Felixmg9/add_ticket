<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        echo '=== create PostController ';
	return view('post.create');
    }	
    public function store(Request $request)
    {
	echo '=== create PostController ';
	$rules = ['uid' => 'required|min:10', 'description' => 'required'];
        $this->validate( $request, $rules);
    }
}
*/


namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectRequest;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class PostController extends Controller 
{
    //---Constructor Function
    public function __construct() {
        $this->middleware('auth:sanctum');
    }//---End of Function Constructor

    //---List Product
    public function index() {
    }//---End of Function index

    //---Create
    public function Create() {
    }//---End of Function Create

    //---Store
    public function Store(ProjectRequest $request) {
    }//---End of Function Store

    //---Show
    public function Show($project) {
    }//---End of Function Show

    //---Destroy
    public function Destroy($project) {
    }//---End of Function Destroy

    //---Edit
    public function Edit($project) {
    }//---End of Function Edit

    //---Update
    public function Update(ProjectRequest $request, $project) {
    }//---End of Function Update
}