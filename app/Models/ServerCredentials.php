<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CommonTable;


class ServerCredentials extends CommonTable
{
    use HasFactory;
    protected $table = 'ServerCredentials';
    protected $set_fields = ['ftp_login', 'ftp_password', 'message_id'];
	public $timestamps = false;
}
