<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


abstract class CommonTable extends Model
{
	public function my_append(array &$data, bool $save = True)
    {
		foreach($this->set_fields as $key)
	    	if (isset($data[$key]))
				$this->{$key} = $data[$key];
			elseif ($save)
				return;					
	
        if ($save)
		{	$this->save();

			if (empty($this->id))
				throw new Exception("no new record {$this->table}");
		
			$data += [strtolower($this->table) . '_id' => $this->id];
		}
		return;
	}
}
