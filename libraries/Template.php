<?php
//Define Class Template
 class Template{
     protected $template;

     //pass data to template
     protected $vars = array();

     /* Whenever we create a new template class, the path to the template is added on instantiation*/
     public function __construct($template){
         $this->template = $template;
     }

     //Get Template Variables
     public function __get($key){
         return $this->vars[$key];
     }

     public function __set($key, $value){
         return $this->vars[$key] = $value;
     }

     //Convert Object to String
     public function __toString(){
         extract($this->vars); //use extract to get template variables
         chdir(dirname($this->template)); //return to parent directory
         ob_start(); //output buffering

         include basename($this->template); //include template into our file
         return ob_get_clean(); //Get the current buffer contents and delete the output buffer
     }
 }