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
	* Display all categories
	* @return View
	*/
	public function getIndex() {
		
		
		$categories = Category::all();
		
		if($categories->isEmpty() != TRUE) {
        	return View::make('category_list')->with('categories',$categories);
    }
    	else {
        	return Redirect::action('IndexController@getIndex')->with('flash_message','No Categories to display.');;
    }

		
	}
	/**
	* Show the "Add a categorie form"
	* @return View
	*/
	public function getCreate() {
    	return View::make('category_add');  
	}
	/**
	* Process the "Add a categorie form"
	* @return Redirect
	*/
	public function postCreate() {
		
		$category = new Category();
		$category->name = $_POST['name'];
		$category->save();

		return Redirect::action('IndexController@getIndex')->with('flash_message','Your category has been added.');
	}
	/**
	* Show the "Edit a categorie form"
	* @return View
	*/
	public function getEdit($id) {
		try {
		    $category   = Category::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/category')->with('flash_message', 'Category not found');
		}
    	return View::make('category_edit')
    		->with('category', $category);
	}
	/**
	* Process the "Edit a categorie form"
	* @return Redirect
	*/
	public function postEdit() {
		try {
	        $category = Category::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/category')->with('flash_message', 'Category not found');
	    }
	    
	    $category->name = $_POST['name'];
	    $category->save();
	   	return Redirect::action('CategoryController@getIndex')->with('flash_message','Your changes have been saved.');
	}
	/**
	* Process categorie deletion
	*
	* @return Redirect
	*/
	public function getDelete($id) {
		
	    $category = Category::where('id', '=', $id)->get();
	    if($category) {
	    	Category::destroy($id);
	    	return Redirect::back()->with('flash_message', 'Category deleted');
	        #return Redirect::to('/task')->with('flash_message', 'Task deleted');
	    }
	    else {
	    	return Redirect::back()->with('flash_message', 'Could not delete category.');
	      	#return Redirect::to('/task')->with('flash_message', 'Could not delete task.');
	    }
	}	
	
}