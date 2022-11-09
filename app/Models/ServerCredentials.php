<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CommonTable;


class ServerCredentials extends CommonTable
{
    use HasFactory;
    protected $table = 'ServerCredentials';
<<<<<<< HEAD
    protected $set_fields = ['ftp_login', 'ftp_password', 'message_id'];
	public $timestamps = false;
=======
    protected $set_fields = ['ftp_login', 'ftp_password', 'message_id''];
>>>>>>> 75db7910326a30cd16a7de516cc32c4d8532f6ed
}
