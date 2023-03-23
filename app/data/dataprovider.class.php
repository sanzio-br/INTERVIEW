<?php

require('user.class.php');

class DataProvider
{
    function __construct($source)
    {
        $this->source = $source;
    }
    public function get_users()
    {
    }

    public function get_user($email)
    {
    }
    public function get_user_by_id($key)
    {
    }

    public function update_term($original_term, $new_term, $defination)
    {
    }
    public function delete_term($term)
    {
    }

    public function search_terms($search)
    {
    }

    public function add_term($term, $defination)
    {

    }


}