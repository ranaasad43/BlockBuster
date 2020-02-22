<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Controllers\FilmController;

	class FilmDataComposer {

		public function compose(View $view){
			
			$controller = new FilmController;
			$data = ['featured' =>1];
			$films = $controller->getfilms($data);
			
			$view->with('films',!empty($films) ? $films : []);
		}

	}