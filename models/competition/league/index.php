<?php
namespace TBI\Models\Competition;
use TBI\Models\Competition as Competition_Model;

class League extends Competition_Model {
    public function __construct($id) {
        parent::__construct($id);
    }
}