<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upperBolder
 *
 * @author Devan
 */
class upperBolder {
    function boldTheCaps(){
        //need to reference this, as per the documentation
        $this->CI =& get_instance();
        $buffer = $this->CI->output->get_output();

        //find all the paragraphs with class = lead
        preg_match_all("/<p class=\"lead\">(.*)<\/p>/i", $buffer, $pat_array, PREG_SET_ORDER);
        foreach($pat_array as $match){
            
            //find all the captialized words in the paragraph
            preg_match_all("/\b[A-Z]+[a-z]*\b/", $match[1], $caps_array, PREG_SET_ORDER);
            
            //print_r($caps_array);
            
            
            $to_replace = $match[0];
            //for each cap word, replace it with the word with strong tags
            foreach($caps_array as $caps_words){
                $replace = "<strong>".$caps_words[0]."</strong>";
                $to_replace = str_replace($caps_words[0], $replace, $to_replace);
            }
            
            $buffer = str_replace($match[0],$to_replace,$buffer);
             
        }
            
        $replaced = $buffer;
        $this->CI->output->set_output($replaced);
        $this->CI->output->_display();
    }
}
