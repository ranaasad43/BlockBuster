<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Controllers\GenreController;

	class GenreDataComposer {

		public function compose(View $view){

			$controller = new GenreController;
			$genres = $controller->getGenres();
			
			$view->with('genres',!empty($genres) ? $genres : []);
		}
	}
