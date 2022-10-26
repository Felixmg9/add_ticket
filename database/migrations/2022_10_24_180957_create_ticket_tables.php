<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {	
        Schema::create('Ticket', function (Blueprint $table) {
	    $len_uid = env('LEN_UID', 36);

            $table->id();	    
	    $table->char('uid', $len_uid)->unique();
		//default(DB::raw('bin2hex(random_bytes($len_uid / 2))'));
	    $table->string('subject');
	    $table->string('user_name');
	    $table->string('user_email');
	    $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
	    $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::create('Message', function (Blueprint $table) {
            $table->id();
	    $table->bigInteger('ticket_id')->unsigned();
 	    $table->enum('author', ['client', 'manager']);	
	    $table->string('content');
	    $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
	    $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

	    $table->foreign('ticket_id')->references('id')->on('Ticket');
        });
        Schema::create('ServerCredentials', function (Blueprint $table) {
            $table->id();
	    $table->bigInteger('message_id')->unsigned();
	    $table->string('ftp_login');
	    $table->string('ftp_password');

	    $table->foreign('message_id')->references('id')->on('Message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	foreach(['ServerCredentials', 'Message', 'Ticket'] as $table)
        	Schema::dropIfExists($table);
    }
};
