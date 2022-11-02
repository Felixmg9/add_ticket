<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


abstract class CommonTable extends Model
{
	public function my_append(array &$data)
    	{
		if (array_diff($this->set_fields, array_keys($data)) != [])
	    		return;

		foreach($this->set_fields as $key)
	    		$this->{$key} = $data[$key];
 		
        	$this->save();
		$table_name = strtolower(get_class($this));

		if (empty($this->id))
			throw new Exception("no new record {$this->table}");
		$data += [strtolower($this->table) . '_id' => $this->id];
		return;
    	}
}
