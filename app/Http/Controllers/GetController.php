<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Ticket;
use \App\Models\Message;


class GetController extends Controller
{
    static public array $cred = [];
    public function store(Request $request)
    {
        $name = $request->input('name');

        echo 'public function store(Request $request)';
    }
    static public function my_append(array $data)
    {    
	//var_dump((array_keys($data) == ['ftp_login', 'ftp_password']));
	if (array_keys($data) == ['ftp_login', 'ftp_password'])
	    self::$cred = $data;
	//var_dump(self::$cred);

	DB::beginTransaction();
	try
	{	(new Ticket)->my_append($data);
		(new Message)->my_append($data);
		DB::commit();
	}
	catch (Exception $e)
	{	DB::rollback();	}
    }		
}
