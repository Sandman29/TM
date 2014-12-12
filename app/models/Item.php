<?php

class Item extends Eloquent {
   
    public function categories() {
        return $this->belongsToMany('Category');
    }
    
}
