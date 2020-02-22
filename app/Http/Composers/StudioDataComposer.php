<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Controllers\StudioController;

	class StudioDataComposer {

		public function compose(View $view){

			$controller = new StudioController;
			$studios = $controller->getStudios();
			
			//dd($Studios);
			$view->with('studios',!empty($studios) ? $studios : []);
		}
	}
