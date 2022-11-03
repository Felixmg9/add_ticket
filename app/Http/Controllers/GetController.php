<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Ticket;
use \App\Models\Message;
use \App\Models\ServerCredentials;


class GetController extends Controller
{	
    public function store(Request $request)
    {
        $name = $request->input('name');
        echo 'public function store(Request $request)';
		return;
    }
    
	static public function my_append(array $data)
    {	
		if (array_keys($data) == ['ftp_login', 'ftp_password'])
		{
			(new ServerCredentials)->my_append($data, $save = False);
			return;
		}

		DB::beginTransaction();
		try
		{			
			(new Ticket)->my_append($data);
			(new Message)->my_append($data);
			(new ServerCredentials)->my_append($data);
			DB::commit();
		}
		catch (Exception $e)
		{
			DB::rollback();
		}
		return;
	}
}
