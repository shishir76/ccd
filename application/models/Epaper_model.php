<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper_model extends CI_Model
{
	//input values
    public function input_values()
    {
        $data = array(
            'lang_id' => $this->input->post('lang_id', true),
            'title' => $this->input->post('title', true),
            'content' => $this->input->post('content', true),
            'edition' => $this->input->post('edition', true),
            //'path_big' => $this->input->post('path_big', true),
            //'path_small' => $this->input->post('path_small', true)
        );
        return $data;
    }

    public function image_input_values()
    {
        $data = array(
            'path_big' => $this->input->post('path_big', true),
            'path_small' => $this->input->post('path_small', true),
            'is_featured' => $this->input->post('is_featured', true)
        );
        return $data;
    }

    //get epapers history
    public function get_epaper_history()
    {
        $query = $this->db->get('epaper_history');
        return $query->result();
    }

    //get epapers history by id
    public function get_epaper_history_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('epaper_history');
        return $query->row();
    }

    //get epapers history list
    public function get_epaper_history_list($id)
    {
        $this->db->where('epaper_history_id', $id);
        $query = $this->db->get('epaper_history_list');
        return $query->result();
    }

    //get epapers history list by epaper history id
    public function get_epaper_history_list_by_epaper_history_id($id)
    {
        $this->db->where('epaper_history_id', $id);
        $query = $this->db->get('epaper_history_list');
        return $query->row();
    }

    //get_epaper history by edition and date
    public function get_epaper_history_by_edition_and_date($edition,$date)
    {
        $this->db->where(["epaper_history.edition" => $edition, "DATE(epaper_history.created_at)" => $date]);
        $this->db->select('epaper_history.id, epaper_history.lang_id, epaper_history.title, epaper_history.content, epaper_history.edition, epaper_history.created_at, epaper_history_list.id, epaper_history_list.epaper_history_id, epaper_history_list.path_big, epaper_history_list.path_small, epaper_history_list.is_featured, epaper_history_list.created_at');
        $this->db->from('epaper_history');
        $this->db->join('epaper_history_list','epaper_history_list.epaper_history_id=epaper_history.id');
        $query = $this->db->get();
        return $query->result();
    }

    //add to epapers history
    public function add_to_epaper_history()
    {
        $data = $this->input_values();

        $date = $this->input->post('date', true);
        if (!empty($date)) 
        {
            $data["created_at"] = $date;
        }

        return $this->db->insert('epaper_history', $data);
    }

    //add to epapers history list
    public function add_to_epaper_history_list($epaper_history_id)
    {
        $data = $this->image_input_values();

        //get file
        $file = $_FILES['files'];

        if (!empty($file['name'])) 
        {
            //upload images
            $filesCount=count($file['name']);

            for($i=0; $i < $filesCount; $i++)
            {
                if($i==0)
                {
                    $is_featured='YES';
                }
                else
                {
                    $is_featured='NO';
                }
                $file_details = array(
                    'name' => $file['name'][$i],
                    'type' => $file['type'][$i],                    
                    'tmp_name' => $file['tmp_name'][$i],
                    'error' => $file['error'][$i],
                    'size'=> $file['size'][$i]
                );

                $data["path_big"] = $this->upload_model->epaper_big_image_upload($file_details);
                $data["path_small"] = $this->upload_model->epaper_small_image_upload($file_details);
                $date = $this->input->post('date', true);
                if (!empty($date)) 
                {
                    $data["created_at"] = $date;
                }
                $data['epaper_history_id'] = $epaper_history_id;
                $data['is_featured'] = $is_featured;
                $this->db->insert('epaper_history_list', $data);
            } 
        }
       
    }

    //update image
    public function update_to_epaper_history($id)
    {
        $data = $this->input_values();

        $data["created_at"] = $this->input->post('date', true);
        $this->db->where('id', $id);
        return $this->db->update('epaper_history', $data);
    }

    //add to epapers history list
    public function update_to_epaper_history_list($epaper_history_id)
    {
        //delete old epaper history list
        $this->delete_from_epaper_history_list($epaper_history_id);

        $data = $this->image_input_values();
        //get file
        $file = $_FILES['files'];
        if (!empty($file['name'])) 
        {
            //upload images
            $filesCount=count($file['name']);

            for($i=0; $i < $filesCount; $i++)
            {
                if($i==0)
                {
                    $is_featured='YES';
                }
                else
                {
                    $is_featured='NO';
                }
                $file_details = array(
                    'name' => $file['name'][$i],
                    'type' => $file['type'][$i],                    
                    'tmp_name' => $file['tmp_name'][$i],
                    'error' => $file['error'][$i],
                    'size'=> $file['size'][$i]
                );

                $data["path_big"] = $this->upload_model->epaper_big_image_upload($file_details);
                $data["path_small"] = $this->upload_model->epaper_small_image_upload($file_details);
                $date = $this->input->post('date', true);
                if (!empty($date)) 
                {
                    $data["created_at"] = $date;
                }
                $data['epaper_history_id'] = $epaper_history_id;
                $data['is_featured'] = $is_featured;
                $this->db->insert('epaper_history_list', $data);
            } 
        }
       
    }

    //delete from epapers history list
    public function delete_from_epaper_history_list($epaper_history_id)
    {
        //find epaper history lists
        $epaper_history_lists = $this->get_epaper_history_list($epaper_history_id);
        if (!empty($epaper_history_lists)) {
            foreach ($epaper_history_lists as $epaper_history_list) {
                //delete
                delete_image_from_server($epaper_history_list->path_big);
                delete_image_from_server($epaper_history_list->path_small);

                $this->db->where('epaper_history_id', $epaper_history_list->id);
                $this->db->delete('epaper_history_list');
            }
        }
    }

    //delete from epapers history
    public function delete_from_epaper_history($id)
    {
        $epaper_history_lists= $this->get_epaper_history_list($id);

        if (!empty($epaper_history_lists))
        {
            foreach ($epaper_history_lists as $epaper_history_list) 
            {
                //delete image from server
                delete_image_from_server($epaper_history_list->path_big);
                delete_image_from_server($epaper_history_list->path_small);
            }
            if ($this->db->delete('epaper_history_list', array('epaper_history_id' => $id)) && $this->db->delete('epaper_history', array('id' => $id)) ) 
            {
                return true;
            }
            return false;
        }
        else
        {
            return false;
        }
    }

    //delete multi epapers history
    public function delete_multi_epaper_history($epaper_ids)
    {
        if (!empty($epaper_ids)) 
        {
            foreach ($epaper_ids as $id) 
            {
                $epaper_history_lists = $this->get_epaper_history_list($id);
                if (!empty($epaper_history_lists)) 
                {
                    foreach ($epaper_history_lists as $epaper_history_list) 
                    {
                        //delete image from server
                        delete_image_from_server($epaper_history_list->path_big);
                        delete_image_from_server($epaper_history_list->path_small);
                    }

                    $this->db->where('epaper_history_id', $id);
                    $this->db->delete('epaper_history_list');

                    $this->db->where('id', $id);
                    $this->db->delete('epaper_history');
                }
            }
        }
    }
}