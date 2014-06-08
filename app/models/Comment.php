<?php
use Jenssegers\Mongodb\Model as Eloquent;

class Comment extends Eloquent {

    protected $collection = 'comments';
    
}