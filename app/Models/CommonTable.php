<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


abstract class CommonTable extends Model
{
	public function my_append(array &$data, bool $save = True)
    {
		//$data += ['message_id' => 47];
		
		/*
		echo ' ---------------------$this->set_fields  = ';
		var_dump($this->set_fields);
		echo ' ---------------------array_keys($data)  = ';
		var_dump(array_keys($data));
		
		echo '-----------------------------';
		echo '------------' . $this->ftp_login;
		*/
		foreach($this->set_fields as $key)
		{
	    	if (isset($data[$key]))
				$this->{$key} = $data[$key];
			elseif ($save)
				return;			
		}
 		echo '------------' . $this->ftp_login;
	
		
	
        if ($save)
		{	$this->save();

			if (empty($this->id))
				throw new Exception("no new record {$this->table}");
		
			$data += [strtolower($this->table) . '_id' => $this->id];
		}
		return;
	}
}
