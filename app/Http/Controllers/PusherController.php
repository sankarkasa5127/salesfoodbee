<?php
namespace App\Http\Controllers;
use Pusher\Pusher;
class PusherController extends Controller
{
   public function index(){
			$options = array(
				'cluster' => env('PUSHER_APP_CLUSTER'),
				'useTLS' => true
			);
			$pusher = new Pusher(
				env('PUSHER_APP_KEY'),
				env('PUSHER_APP_SECRET'),
				env('PUSHER_APP_ID'),
				$options
			);
			//$this->Api_model->insertStatus('000024',1);
			$data['message'] = array('PrintHello'=>'<h1>Hello wasim how are you ? -</h1>');
			$pusher->trigger('foodbeeApp', 'OrderStatus1671610927', $data);
   }
}
