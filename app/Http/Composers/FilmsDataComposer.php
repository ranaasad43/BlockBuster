<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Controllers\FilmController;

	class FilmsDataComposer {

		public function compose(View $view){
			
			$controller = new FilmController;

			$films = $controller->showfilms();
			//dd($films);
			$view->with('films',!empty($films) ? $films : []);
		}

	}