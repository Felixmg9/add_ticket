<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	echo  'my_append--';
	//var_dump($data);
	var_dump((array_keys($data) == ['ftp_login', 'ftp_password']));
	if (array_keys($data) == ['ftp_login', 'ftp_password'])
	    self::$cred = $data;
//	if (asset(self::$cred))
	echo '=== $cred = ';
	var_dump(self::$cred);
    }		
}
