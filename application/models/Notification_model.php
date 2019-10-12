<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model
{
	//input values
    public function input_values()
    {
        $data = array(
            'user_id' => $this->input->post('user_id', true),
            'comment' => $this->input->post('comment', true)
        );
        return $data;
    }

    //add to notification
    public function add_to_notification($user_id)
    {
        $data = array(
            'user_id' => $user_id,
            'comment' => $this->input->post('comment', true),
            'is_select_all' => $this->input->post('is_select_all', true)
        );
        return $this->db->insert('notifications', $data);
    }

	//get notifications
    public function get_notifications()
    {
       
        $query = $this->db->get('notifications');
        return $query->result();
    }

    //get notification by id
    public function get_notification_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('notifications');
        return $query->row();
    }

    //count notification
    public function count_notifications($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('seen_status', 0);
        $query = $this->db->get('notifications');
        return $query->num_rows();
    }

    //get notification by user_id
    public function get_notification_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('seen_status', 0);
        $query = $this->db->get('notifications');
        if ($query->num_rows()>0)
        {
            return $query->result();
        }
        return false;
    }

   //get notification by user_id
    public function upadte_notification_status_by_user_id($user_id)
    {
        $data = array(
            'seen_status' => 1
        );
        $this->db->where('user_id', $user_id); 
         return $this->db->update('notifications', $data);       
        
    }
 //delete from notification
    public function delete_from_notification($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('notifications');
    }

    //delete multi notifications
    public function delete_multi_notifications($notification_ids)
    {
        if (!empty($notification_ids)) {
            foreach ($notification_ids as $id) {
                $notification = $this->get_notification_by_id($id);

                if (!empty($notification)) {

                    $this->db->where('id', $id);
                    $this->db->delete('notifications');
                }
            }
        }

    }

    //get notifications
    public function get_users_by_role()
    {
    	$this->db->where('role !=', 'admin');
        $query = $this->db->get('users');
        return $query->result();
    }
}