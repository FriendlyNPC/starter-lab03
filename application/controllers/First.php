<?php

/**
 * Our first. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/First.php
 *
 * ------------------------------------------------------------------------
 */
class first extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        $record = $this->quotes->first();
        
        $this->data['mug'] = $record['mug'];
        $this->data['what'] = $record['what'];
        $this->data['who'] = $record['who'];
        
        $this->render();
    }
    
    function sleep(){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        $record = $this->quotes->get(1);
        
        $this->data['mug'] = $record['mug'];
        $this->data['what'] = $record['what'];
        $this->data['who'] = $record['who'];
        
        $this->render();
    }

}

/* End of file First.php */
/* Location: application/controllers/First.php */