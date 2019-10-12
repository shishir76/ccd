<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        //load the library
        $this->load->helper('xml');

    }

    /**
     * Rss All Posts
     */
    public function rss_all_posts()
    {
            $api_key= $this->input->get('api_key');    
            $this->db->where('api_key', $api_key);        
            $query = $this->db->get('feed_api');
            $result=$query->row(); 
       
            if ($this->general_settings->show_rss == 1):
            if(count($result) == 0){
                $data['api_key'] = "False";
            }  
            else{
                $data['api_key'] = "True";
            }
             $data['feed_name'] = $this->settings->site_title . " - " . trans("all_posts");
            $data['encoding'] = 'utf-8';
            $data['feed_url'] = lang_base_url() . "rss/posts";
            $data['page_description'] = $this->settings->site_title . " - " . trans("all_posts");
            $data['page_language'] = $this->selected_lang->short_form;
            $data['creator_email'] = '';
            $data['posts'] = $this->post_model->get_posts();
            header("Content-Type: application/rss+xml; charset=utf-8");

            $this->load->view('rss', $data);
       endif;
       
       
        
    }
   /**
     * Rss By Category
     */
    public function rss_by_category($slug)
    {
            $api_key= $this->input->get('api_key');    
            $this->db->where('api_key', $api_key);        
            $query = $this->db->get('feed_api');
            $result=$query->row(); 
       
            if ($this->general_settings->show_rss == 1):
            if(count($result) == 0){
                $data['api_key'] = "False";
            }  
            else{
                $data['api_key'] = "True";
            }
            $slug = $this->security->xss_clean($slug);
            $category = $this->category_model->get_category_by_slug($slug);

            $category_id = $category->id;

            $data['category'] = $this->category_model->get_category($category_id);
            if (empty($data['category'])) {
                redirect(lang_base_url());
            }

            $data['feed_name'] = $this->settings->site_title . " - " . trans("title_category") . ": " . $data['category']->name;
            $data['encoding'] = 'utf-8';
            $data['feed_url'] = lang_base_url() . "rss/category/" . $data['category']->name_slug;
            $data['page_description'] = $this->settings->site_title . " - " . trans("title_category") . ": " . $data['category']->name;
            $data['page_language'] = $this->selected_lang->short_form;
            $data['creator_email'] = '';
            $data['posts'] = $this->post_model->get_posts_by_category($data['category']->id);
            header("Content-Type: application/rss+xml; charset=utf-8");

            $this->load->view('rss', $data);
        endif;
    }

    /**
     * Rss By Category
     */
    public function rss_by_sub_category($slug)
    {
            $api_key= $this->input->get('api_key');    
            $this->db->where('api_key', $api_key);        
            $query = $this->db->get('feed_api');
            $result=$query->row(); 
       
            if ($this->general_settings->show_rss == 1):
            if(count($result) == 0){
                $data['api_key'] = "False";
            }  
            else{
                $data['api_key'] = "True";
            }
            $slug = $this->security->xss_clean($slug);
            $category = $this->category_model->get_category_by_slug($slug);

            $category_id = $category->id;

            $data['sub_category'] = $this->category_model->get_category($category_id);

            if (empty($data['sub_category'])) {
                redirect(lang_base_url());
            }

            $data['feed_name'] = $this->settings->site_title . " - " . trans("title_category") . ": " . $data['sub_category']->name;

            $data['encoding'] = 'utf-8';
            $data['feed_url'] = lang_base_url() . "rss/sub_category/" . $data['sub_category']->name_slug;
            $data['page_description'] = $this->settings->site_title . " - " . trans("title_category") . ": " . $data['sub_category']->name;
            $data['page_language'] = $this->selected_lang->short_form;
            $data['creator_email'] = '';
            $data['posts'] = $this->post_model->get_posts_by_sub_category($data['sub_category']->id);
            header("Content-Type: application/rss+xml; charset=utf-8");

            $this->load->view('rss', $data);
        endif;
    }
}