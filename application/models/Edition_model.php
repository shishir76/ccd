<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edition_model extends CI_Model
{
	//input values
    public function input_values()
    {
        $data = array(
            'lang_id' => $this->input->post('lang_id', true),
            'name' => $this->input->post('name', true),
            'status' => $this->input->post('status', true)
        );
        return $data;
    }

    //get editions
    public function get_editions()
    {
        $query = $this->db->get('editions');
        return $query->result();
    }

    //get editions by id
    public function get_editions_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('editions');
        return $query->row();
    }

    //add to editions
    public function add_to_editions()
    {
        $data = $this->input_values();
        $date = $this->input->post('date', true);
        if (!empty($date)) {
            $data["created_at"] = $date;
        }

        return $this->db->insert('editions', $data);
    }

    //update image
    public function update_to_editions($id)
    {
        $data = $this->input_values();
        $data["created_at"] = $this->input->post('date', true);

        $this->db->where('id', $id);
        return $this->db->update('editions', $data);
    }

    //delete from editions
    public function delete_from_editions($id)
    {
        $editions = $this->get_editions_by_id($id);

        if (!empty($editions)) {
            $this->db->where('id', $id);
            return $this->db->delete('editions');
        } else {
            return false;
        }

    }

    //delete multi editions
    public function delete_multi_editions($edition_ids)
    {
        if (!empty($edition_ids)) 
        {
            foreach ($edition_ids as $id) 
            {
                $editions = $this->get_editions_by_id($id);

                if (!empty($editions)) 
                {
                    $this->db->where('id', $id);
                    $this->db->delete('editions');
                }
            }
        }
    }
}