<?php

class Category extends Eloquent {
   
  
     public function items() {
        return $this->belongsToMany('Item');
    }
}
