<?php
class CategoryController extends \BaseController {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));
	}
	/**
	* Used as an example for something you might want to set up a cron job for
	*/
	/*public function getDigest() {
		$books = Book::getBooksAddedInTheLast24Hours();
		$users = User::all();
		$recipients = Book::sendDigests($users,$books);
		$results = 'Book digest sent to: '.$recipients;
		Log::info($results);
		return $results;
	}
	*/
	/**
	* Process the searchform
	* @return View
	*/
	/*
	public function getSearch() {
		return View::make('book_search');
	}
	*/
	/**
	* Display all books
	* @return View
	*/
	public function getIndex() {
		
		
		$categories = Category::all();
		
		if($categories->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        	return View::make('category_list')->with('categories',$categories);
    }
    	else {
        	return Redirect::action('IndexController@getIndex')->with('flash_message','No Categories to display.');;
    }

		
	}
	/**
	* Show the "Add a book form"
	* @return View
	*/
	public function getCreate() {
		#$authors = Author::getIdNamePair();
    	return View::make('category_add');  #->with('authors',$authors);
	}
	/**
	* Process the "Add a book form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the book model
		$category = new Category();

		$category->name = $_POST['name'];
	
		
		# Magic: Eloquent
		$category->save();
		return Redirect::action('IndexController@getIndex')->with('flash_message','Your category has been added.');
	}
	/**
	* Show the "Edit a book form"
	* @return View
	*/
	public function getEdit($id) {
		try {
		    $book    = Book::findOrFail($id);
		    $authors = Author::getIdNamePair();
		}
		catch(exception $e) {
		    return Redirect::to('/book')->with('flash_message', 'Book not found');
		}
    	return View::make('book_edit')
    		->with('book', $book)
    		->with('authors', $authors);
	}
	/**
	* Process the "Edit a book form"
	* @return Redirect
	*/
	public function postEdit() {
		try {
	        $book = Book::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/book')->with('flash_message', 'Book not found');
	    }
	    # http://laravel.com/docs/4.2/eloquent#mass-assignment
	    $book->fill(Input::all());
	    $book->save();
	   	return Redirect::action('BookController@getIndex')->with('flash_message','Your changes have been saved.');
	}
	/**
	* Process book deletion
	*
	* @return Redirect
	*/
	public function postDelete() {
		try {
	        $book = Book::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/book/')->with('flash_message', 'Could not delete book - not found.');
	    }
	    Book::destroy(Input::get('id'));
	    return Redirect::to('/book/')->with('flash_message', 'Book deleted.');
	}
	/**
	* Process a book search
	* Called w/ Ajax
	*/
	public function postSearch() {
		if(Request::ajax()) {
			$query  = Input::get('query');
			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');
			# Do the actual query
	        $books  = Book::search($query);
	        # If the request is for JSON, just send the books back as JSON
	        if($format == 'json') {
		        return Response::json($books);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {
		        $results = '';
				foreach($books as $book) {
					# Created a "stub" of a view called book_search_result.php; all it is is a stub of code to display a book
					# For each book, we'll add a new stub to the results
					$results .= View::make('book_search_result')->with('book', $book)->render();
				}
				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}
}