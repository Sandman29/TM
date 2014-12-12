<?php

class Category extends Eloquent {
   
    public function categories() {
        return $this->belongsToMany('Item');
    }
    
}
