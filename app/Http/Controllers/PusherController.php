<?php
namespace App\Http\Controllers;
use Pusher\Pusher;
class PusherController extends Controller
{
   public function index(){
      	$options = array(
				'cluster' => 'ap2',
				'useTLS' => true
			);
			$pusher = new Pusher(
					'83a310a5fd0558a9e5bf',
					'728027e92c112e10790d',
					'1332051',
					$options
			);
			//$this->Api_model->insertStatus('000024',1);
			$data['message'] = array('PrintHello'=>'<h1>Hello wasim how are you ? -</h1>');
			$pusher->trigger('foodbeeApp', 'OrderStatus1671610927', $data);
   }
}
