<?php
class ItemController extends \BaseController {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));
	}
	
	/**
	* Display all tasks
	* @return View
	*/
	public function getIndex() {
		
		
		$items = Item::all();
		
		if($items->isEmpty() != TRUE) {
        	return View::make('item_list')->with('items',$items);
    }
    	else {
        	return Redirect::action('IndexController@getIndex')->with('flash_message','No Tasks to display.');;
    }

		
	}
	/**
	* Show the "Add a task form"
	* @return View
	*/
	public function getCreate() {

		$categories =Category::all();
    	return View::make('item_add')->with('categories',$categories);
	}
	/**
	* Process the "Add a task form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the task model
		$item = new Item();

		$item->due_date = $_POST['due_date'];
		$item->task = $_POST['task'];

		$item->save();
		/*
		 * The code in the below foreach loop is to add a pivot table to reflect the many-to-many
		 * relationship of the "items" to "categories" using the category_item table.  This feature may
		 * be implemented at a later date but for now is not going to be in this initial scope of the 
		 * project.
		 *
		foreach(Input::get('categories') as $category) {
			# This enters a new row in the category_item table
			#$item->categories()->save(Category::find($category));
			$item->categories()->attach($category);
			#echo $category;
			#echo Category::find($category);
		}
		*/
		return Redirect::action('IndexController@getIndex')->with('flash_message','Your book has been added.');
	}
	/**
	* Show the "Edit a task form"
	* @return View
	*/
	public function getEdit($id) {
		try {
		    $item    = Item::findOrFail($id);
		    #$authors = Author::getIdNamePair();
		}
		catch(exception $e) {
			return Redirect::to('/task')->with('flash_message', 'Task not found');
		    #return Redirect::to('/task')->with('flash_message', 'Task not found');
		}
    	return View::make('item_edit')
    		->with('item', $item);
	}
	/**
	* Process the "Edit a task form"
	* @return Redirect
	*/
	public function postEdit() {
		try {
	        $item = Item::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task')->with('flash_message', 'Task not found');
	    }
	    
		$item->due_date = $_POST['due_date'];
		$item->task = $_POST['task'];
	    $item->save();
	    
	   	return Redirect::action('IndexController@getIndex')->with('flash_message','Your changes have been saved.');
	}
	/**
	* Process task deletion
	*
	* @return Redirect
	*/
	public function getDelete($id) {
		
	    $item = Item::where('id', '=', $id)->get();
	    if($item) {
	    	Item::destroy($id);
	    	return Redirect::back()->with('flash_message', 'Task deleted');
	        #return Redirect::to('/task')->with('flash_message', 'Task deleted');
	    }
	    else {
	    	return Redirect::back()->with('flash_message', 'Could not delete task.');
	      	#return Redirect::to('/task')->with('flash_message', 'Could not delete task.');
	    }
	}	
	
}