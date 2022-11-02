<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

use \App\Models\Ticket;
use \App\Models\Message;
use \App\Models\ServerCredentials;

//use \App\Http\Controllers\PostController;
//var_dump(new PostController);

/*
$a = new Ticket; 
$a->subject = 'www';
$a->user_name = 'felix';
$a->user_email = 'felix.mg9';
//$a->uid = 'nreingrenre';
$a->save();
echo $a->id;
*/

/*
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        echo '=== create PostController ';
	return view('post.create');
    }	
    public function store(Request $request)
    {
	echo '=== create PostController ';
	$rules = ['uid' => 'required|min:10', 'description' => 'required'];
        $this->validate( $request, $rules);
    }
}
*/


?>
<pre> 
	<?
		foreach (Ticket::all() as $t)
			echo $t->user_name . '---' . $t->user_email . PHP_EOL;
		echo PHP_EOL;
		foreach (Message::all() as $t)
			echo $t->author . '---' . $t->content . PHP_EOL ;

  	?> 
</pre>
<?


$kernel->terminate($request, $response);
