<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{

    //add to newsletter
    public function add_to_newsletter($email)
    {
        $data = array(
            'email' => $email
        );
        return $this->db->insert('newsletters', $data);
    }

    //delete from newsletter
    public function delete_from_newsletter($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('newsletters');
    }

    //get newsletters
    public function get_newsletters()
    {
        $query = $this->db->get('newsletters');
        return $query->result();
    }

    //get newsletter
    public function get_newsletter($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('newsletters');
        return $query->row();
    }

    //get newsletter by id
    public function get_newsletter_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('newsletters');
        return $query->row();
    }
    //get last comments
    public function get_last_newsletter($limit)
    {
       
        $this->db->order_by('id');
        $this->db->limit($limit);
        $query = $this->db->get('newsletters');
        return $query->result();
    }

        //get comment count
    public function get_unseen_newsletter_count()
    {
         $this->db->where('seen_status', 0);
        $query = $this->db->get('newsletters');
        return $query->num_rows();
    }

     //get notification by user_id
    public function update_newsletter_seen_status()
    {
        $data = array(
            'seen_status' => 1
        );
        $this->db->where('seen_status', 0); 
         return $this->db->update('newsletters', $data);       
        
    }

}