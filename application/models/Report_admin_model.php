<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_admin_model extends CI_Model
{
    //filter by values
    public function filter_posts()
    {
        $data = array(
            'lang_id' => $this->input->get('lang_id', true),
            'post_type' => $this->input->get('post_type', true),
            'author' => $this->input->get('author', true),
            'contributor' => $this->input->get('contributor', true),
            'category' => $this->input->get('category', true),
            'subcategory' => $this->input->get('subcategory', true),
            'q' => $this->input->get('q', true),
            'month' => $this->input->get('month', true),
            'from_date' => $this->input->get('from_post', true),
            'to_date' => $this->input->get('to_post', true),
        );

        $data['q'] = trim($data['q']);
        $data['user_id'] = "";

        //check if author
        // if (user()->role == "author"):
        //     $data['user_id'] = user()->id;
        // else:
            if (!empty($data['author'])) {
                $data['user_id'] = $data['author'];
            }
        // endif;
        // //check if contributor
        if (user()->role == "contributor"):
            $data['user_id'] = user()->id;
        else:
            if (!empty($data['contributor'])) {
                $data['user_id'] = $data['contributor'];
            }
        endif;

        if (!empty($data['lang_id'])) {
            $this->db->where('posts.lang_id', $data['lang_id']);
        }
        if (!empty($data['post_type'])) {
            $this->db->where('posts.post_type', $data['post_type']);
        }

        if (!empty($data['category'])) {
            $this->db->where('posts.category_id', $data['category']);
        }
        if (!empty($data['subcategory'])) {
            $this->db->where('posts.subcategory_id', $data['subcategory']);
        }

        if (!empty($data['q'])) {
            $this->db->like('posts.title', $data['q']);
        }
        if (!empty($data['month'])) {
            $this->db->like('MONTH(posts.created_at)', $data['month']);
        }
         if (($data['from_date'])) {
           $this->db->where('posts.created_at >=', $data['from_date']);           
        }
        if (($data['to_date'])) {
           $this->db->where('posts.created_at <=', $data['to_date']);           
        }
        if (($data['from_date']) && ($data['to_date'])) {
           $this->db->where('posts.created_at >=', $data['from_date']);  
            $this->db->where('posts.created_at <=', $data['to_date']);            
        }
        if ((!empty($data['from_date'])) && (!empty($data['user_id']))) {
           $this->db->where('posts.created_at >=', $data['from_date']);  
            $this->db->where('posts.user_id', $data['user_id']);            
        }
        if (!empty($data['user_id'])) {
            $this->db->where('posts.user_id', $data['user_id']);
        }
    }

    //filter by list
    public function filter_posts_list($list)
    {
        if (!empty($list)) {
            if ($list == "slider_posts") {
                $this->db->where('posts.is_slider', 1);
            }
            if ($list == "featured_posts") {
                $this->db->where('posts.is_featured', 1);
            }
            if ($list == "breaking_news") {
                $this->db->where('posts.is_breaking', 1);
            }
            if ($list == "recommended_posts") {
                $this->db->where('posts.is_recommended', 1);
            }
        }
    }

    
    //get paginated posts count
    public function get_paginated_posts_count($list)
    {
        $this->filter_posts();
        $this->filter_posts_list($list);       
       
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.status', 1);
        $this->db->where('posts.created_at <= CURRENT_TIMESTAMP()');  
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get paginated posts
    public function get_paginated_posts($per_page, $offset, $list)
    {
        $this->filter_posts();
        $this->filter_posts_list($list);        
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.status', 1);
        $this->db->where('posts.created_at <= CURRENT_TIMESTAMP()');
        $this->db->order_by('posts.created_at', 'DESC');       
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get authors
    public function get_authors()
    {
        $this->db->where('role !=', 'user');
        $this->db->where('role !=', 'admin');
        $query = $this->db->get('users');
        return $query->result();
    }

    //get contributors
    public function get_contributors()
    {
        $this->db->where('role !=', 'user');
        $this->db->where('role !=', 'admin');
        $query = $this->db->get('users');
        return $query->result();
    }
}
?>