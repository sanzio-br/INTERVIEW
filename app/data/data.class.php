<?php

require('dataprovider.class.php');



class Data {
    static private $ds;
    static public function initialize(DataProvider $data_provider) {
        return self::$ds = $data_provider;
    }
    
    static public function get_users() {
        return self::$ds->get_users();
    }

    static public function get_user($email) {
        return self::$ds->get_user($email);
    }
    static public function get_user_by_id($key) {
        return self::$ds->get_user_by_id($key);
    }
    
    static public function add_user($id_number,$name,$Phone,$email){
        return self::$ds->add_user($id_number,$name,$Phone,$email);
    }
    static public function deactivate_user($key) {
        return self::$ds->deactivate_user($key);
    }
    static public function activate_user($key) {
        return self::$ds->activate_user($key);
    }
    static public function update_user($id, $id_number, $name, $phone, $email) {
        return self::$ds->update_user($id, $id_number, $name, $phone, $email);
    }
    static public function search_terms($search) {
        return self::$ds->search_terms($search);
    }
    
    static public function add_term($term, $defination) {
        return self::$ds->add_term($term, $defination);
    }
    
    static public function update_term($original_term, $new_term, $definition) {
        return self::$ds->update_term($original_term, $new_term, $definition);
    }
    
    static public function delete_user($term) {
        return self::$ds->delete_user($term);
    }
}