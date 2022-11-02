<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CommonTable; 


class Message extends CommonTable
{
	use HasFactory;
	protected $table = 'Message';
	protected $set_fields = ['author', 'content', 'ticket_id'];
}
