<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

function generate_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',       
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),       
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'Ticket';
    public function my_append(array $data)
    {
	$set_field = ['subject', 'user_name', 'user_email'];

	if (array_diff($set_field, array_keys($data)) != [])
	    return;

	$rec = new Ticket;

	foreach($set_field as $key)
	    $rec->{$key} = $data[$key];
 	
	DB::beginTransaction();
        $rec->save();
	echo '== id =' . $rec->id;
        DB::commit();
	return $rec->id;  
    }
    public function save(array $options = []) 
    {
        if (empty($this->uid))
		$this->uid = generate_uuid();
        parent::save($options);
    }
}
