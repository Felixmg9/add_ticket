<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CommonTable; 


function generate_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',       
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),       
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}


class Ticket extends CommonTable 
{
    use HasFactory;
    protected $table = 'Ticket';
    protected $set_fields = ['subject', 'user_name', 'user_email']; 	

    public function save(array $options = []) 
    {
        if (empty($this->uid))
		$this->uid = generate_uuid();
        parent::save($options);
    }
}
