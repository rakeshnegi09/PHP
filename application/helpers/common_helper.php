<?php

if(!function_exists('get_monthly_info')) {
    function get_monthly_info($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('monthly_information_update')->limit(1);    
        $CI->db->where('student_id', $id); 		
        $CI->db->where('month', date('m')); 		
        $CI->db->where('year', date('Y')); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}

if(!function_exists('fees_arrear')) {
    function fees_arrear($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 	
        $CI->db->where('in_arrear', 'YES'); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}

if(!function_exists('fees_arrear_amount')) {
    function fees_arrear_amount($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 
        $CI->db->order_by('amount', 'DESC'); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}

if(!function_exists('fees_due_date')) {
    function fees_due_date($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 	
        $CI->db->where('due_date !=', NULL);
        $query = $CI->db->get();
        $result = $query->row_array()['due_date'];
        return $result;
    }
}