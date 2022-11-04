<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// protected $set_fields - set of required fields for save this table 

abstract class CommonTable extends Model
{
	public function my_append(array &$data)
    	{
		if (array_diff($this->set_fields, array_keys($data)) != [])
	    		return;

		foreach($this->set_fields as $key)
	    		$this->{$key} = $data[$key];
 		
        $this->save();
		
		if (empty($this->id))
			throw new Exception("no new record {$this->table}");
		
        $data += [strtolower($this->table) . '_id' => $this->id];
		
        return;
    	}
}
