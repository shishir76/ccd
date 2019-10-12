<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    //input values
    public function input_values()
    {
        $data = array(
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'message' => $this->input->post('message', true)
        );
        return $data;
    }

    //add contact message
    public function add_contact_message()
    {
        $data = $this->input_values();
        return $this->db->insert('contacts', $data);
    }

    //get contact messages
    public function get_contact_messages()
    {
        $query = $this->db->get('contacts');
        return $query->result();
    }

    //get contact message
    public function get_contact_message($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('contacts');
        return $query->result();
    }

     //get contact message
    public function read_contact_message($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('contacts');
        return $query->row();
    } 
    //count messages
    public function count_meassages()
    {        
        $this->db->where('status', 0);
        $query = $this->db->get('contacts');
        return $query->num_rows();
    }


      //get messages by 
    public function upadte_message_status()
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('status', 0); 
         return $this->db->update('contacts', $data);       
        
    }
     //get last contact messages
    public function get_last_contact_messages()
    {
        $this->db->limit(5);
        $query = $this->db->get('contacts');
        return $query->result();
    }

    //delete contact message
    public function delete_contact_message($id)
    {
        $contact = $this->get_contact_message($id);

        if (!empty($contact)) {
            $this->db->where('id', $id);
            return $this->db->delete('contacts');
        }
        return false;
    }

    //delete multi post
    public function delete_multi_messages($message_ids)
    {
        if (!empty($message_ids)) {
            foreach ($message_ids as $id) { 
                    $this->db->where('id', $id);
                    $this->db->delete('contacts');
              
            }
        }

    }
}