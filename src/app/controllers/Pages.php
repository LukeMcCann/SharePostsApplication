<?php 

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index() 
    {
        $data = [
            'title' => 'Welcome to ' . ucwords(SITENAME),
            'description' => 'Simple social network built with the Bjornstad MVC PHP Framework'
        ]; 

        $this->view('pages/index', $data);
    }

    public function about() 
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App for sharing posts with other users'
        ];
        $this->view('pages/about', $data);
    }
}