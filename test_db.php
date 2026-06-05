<?php
require_once 'bootstrap/app.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Http\Kernel');
$response = $kernel->handle($request = \Illuminate\Http\Request::capture());

use Illuminate\Support\Facades\DB;

// Check latest users
$users = DB::table('users')->select('id','user_name','email','status')->orderBy('creation_date','DESC')->limit(5)->get();
echo json_encode($users, JSON_PRETTY_PRINT);
?>
