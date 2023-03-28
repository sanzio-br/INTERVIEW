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
    static public function get_all_users() {
        return self::$ds->get_all_users();
    }
    static public function get_transactions() {
        return self::$ds->get_transactions();
    }
    static public function get_user_transactions_totals($id){
        return self::$ds->get_user_transactions_totals($id);
    }
    static public function get_all_transactions_totals(){
        return self::$ds->get_all_transactions_totals();
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
    static public function update_pass($id,$password) {
        return self::$ds->update_pass($id,$password);
    }
    static public function add_user_transactions($id,$CheckoutRequestID,$ResultCode,$amount,$MpesaReceiptNumber,$PhoneNumber) {
        return self::$ds->add_user_transactions($id,$CheckoutRequestID,$ResultCode,$amount,$MpesaReceiptNumber,$PhoneNumber);
    }
    static public function get_users_transactions() {
        return self::$ds->get_users_transactions();
    }
    static public function get_user_transactions($id) {
        return self::$ds->get_user_transactions($id);
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