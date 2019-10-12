<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 use Abraham\TwitterOAuth\TwitterOAuth;
class Admin_post extends Admin_Core_Controller
{

    public function __construct()
    {
        parent::__construct();

        //check auth
        if (!is_admin() && !is_author() && !is_contributor()) {
            redirect('login');
        }

        //check permission
        if (!show_admin_panel()) {
            redirect('admin/login');
        }
    }


    /**
     * Add Post
     */
    public function add_post()
    {
        $data['title'] = trans("add_post");
        $data['top_categories'] = $this->category_model->get_categories();
       // $data['all_post'] = $this->category_model->get_post();
        $data['random_posts'] = $this->post_admin_model->get_random_posts(5);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/add_post', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Add Audio
     */
    public function add_audio()
    {
        $data['title'] = trans("add_audio");
        $data['top_categories'] = $this->category_model->get_categories();
        $data['random_posts'] = $this->post_admin_model->get_random_posts(5);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/add_audio', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Add Video
     */
    public function add_video()
    {
        $data['title'] = trans("add_video");
        $data['top_categories'] = $this->category_model->get_categories();
        $data['random_posts'] = $this->post_admin_model->get_random_posts(5);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/add_video', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Add Post Post
     */
    public function add_post_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', trans("title"), 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('summary', trans("summary"), 'xss_clean|max_length[5000]');
        $this->form_validation->set_rules('category_id', trans("category"), 'required');
        $this->form_validation->set_rules('optional_url', trans("optional_url"), 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
            redirect($this->agent->referrer());
        } else {

            $post_type = $this->input->post('post_type', true);

            //if post added
            if ($this->post_admin_model->add_post($post_type)) {                
                //last id
                $last_id = $this->db->insert_id();
                $this->post_admin_model->update_slug($last_id);
               /* $post_url=array(
                    "post_id"=> $last_id,
                    "post_slug"=> $this->post_admin_model->get_post($last_id)->title_slug,
                    "url"=> base_url('post/'),
                );
                 $this->post_admin_model->add_post_url($post_url);*/
                //insert post tags
                $this->tag_model->add_post_tags($last_id);
                $get_last_post=$this->post_admin_model->get_post($last_id);
                $get_general_settings = $this->settings_model->get_general_settings();
                $share_post = $this->input->post('share_post');
                foreach ($share_post as $key => $social_media_type) {
                    if($social_media_type == "Facebook"){
                        // require Facebook PHP SDK
                        require_once(APPPATH.'libraries/Facebook/autoload.php');
                       // initialize Facebook class using your own Facebook App credentials
                        $fb = new Facebook\Facebook([
                           'app_id' => $get_general_settings->facebook_app_id,
                           'app_secret' => $get_general_settings->facebook_app_secret,
                           'default_graph_version' => 'v2.9',
                        ]);
                        // define your POST parameters (replace with your own values)
                        $params = array(
                           'message' => $get_last_post->summary,
                           'link' => base_url().'post/'.$get_last_post->title_slug,
                           'picture' =>base_url().$get_last_post->image_big,
                           'name' => $get_last_post->title,
                           'caption' => base_url().'post/'.$get_last_post->title_slug,
                           // 'description' => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
                        );  // post to Facebook
                       try
                        {
                           $res = $fb->post(''.$get_general_settings->facebook_page_id.'/feed/', $params, $get_general_settings->facebook_access_token);
                           echo 'Successfully posted to Facebook';
                        } 
                        catch(Exception $e) 
                        {
                           echo $e->getMessage();
                        }
                    }
                    if($social_media_type == "Twitter"){
                        require_once (APPPATH.'libraries/vendor/autoload.php');            
                        define('CONSUMER_KEY', $get_general_settings->twitter_consumer_key);
                        define('CONSUMER_SECRET', $get_general_settings->twitter_consumer_secret);
                        define('ACCESS_TOKEN', $get_general_settings->twitter_access_token);
                        define('ACCESS_TOKEN_SECRET', $get_general_settings->twitter_access_token_secret);
                         
                        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);           
                        $status = $get_last_post->title .'.'.base_url().'post/'.$get_last_post->title_slug; //text for your tweet.
                        $post_tweets = $connection->post("statuses/update", ["status" => $status]);
                    }

                    
                }
                //update slug
              
                date_flaxh();
                if ($post_type == "audio") {
                    $this->post_file_model->add_post_audios($last_id);
                } elseif ($post_type == "post") {
                    $this->post_file_model->add_post_additional_images($last_id);
                }

                $this->session->set_flashdata('success', trans("post") . " " . trans("msg_suc_added"));
                redirect(base_url()."admin_post/update_post/".$last_id);
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', trans("msg_error"));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Posts
     */
    public function posts()
    {
      
        $data['title'] = trans('posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['contributors'] = $this->auth_model->get_contributors();
        $data['form_action'] = "admin_post/posts";
        $data['list_type'] = "posts";
        excptn_haer();
        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/posts', $this->post_admin_model->get_paginated_posts_count('posts'));
        $data['post_count']=$this->post_admin_model->get_paginated_posts_count('posts');

        $data['posts'] = $this->post_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'posts');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
         
    }

    public function post_share_box()
    {
        if ($this->input->get('id')) 
        {
            $id = $this->input->get('id');
        }
        $data['posts_share'] = $this->post_admin_model->get_posts_share($id);
        $this->load->view('admin/post/_post_share_box', $data);
    }


    /**
     * Slider Posts
     */
    public function slider_posts()
    {
        prevent_author();

        $data['title'] = trans('slider_posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/slider_posts";
        $data['list_type'] = "slider_posts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/slider_posts', $this->post_admin_model->get_paginated_posts_count('slider_posts'));
         $data['post_count']=$this->post_admin_model->get_paginated_posts_count('slider_posts');
        $data['posts'] = $this->post_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'slider_posts');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Featured Posts
     */
    public function featured_posts()
    {
        prevent_author();

        $data['title'] = trans('featured_posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/featured_posts";
        $data['list_type'] = "featured_posts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/featured_posts', $this->post_admin_model->get_paginated_posts_count('featured_posts'));
        $data['post_count']=$this->post_admin_model->get_paginated_posts_count('featured_posts');
        $data['posts'] = $this->post_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'featured_posts');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Breaking news
     */
    public function breaking_news()
    {
        prevent_author();

        $data['title'] = trans('breaking_news');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/breaking_news";
        $data['list_type'] = "breaking_news";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/breaking_news', $this->post_admin_model->get_paginated_posts_count('breaking_news'));
         $data['post_count']=$this->post_admin_model->get_paginated_posts_count('breaking_news');
        $data['posts'] = $this->post_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'breaking_news');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Recommended Posts
     */
    public function recommended_posts()
    {
        prevent_author();

        $data['title'] = trans('recommended_posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/recommended_posts";
        $data['list_type'] = "recommended_posts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/recommended_posts', $this->post_admin_model->get_paginated_posts_count('recommended_posts'));
          $data['post_count']=$this->post_admin_model->get_paginated_posts_count('recommended_posts');
        $data['posts'] = $this->post_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'recommended_posts');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Pending Posts
     */
    public function pending_posts()
    {

        $data['title'] = trans('pending_posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/pending_posts";
        $data['list_type'] = "pending_posts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/pending_posts', $this->post_admin_model->get_paginated_pending_posts_count());
         $data['post_count']=$this->post_admin_model->get_paginated_pending_posts_count();
        $data['posts'] = $this->post_admin_model->get_paginated_pending_posts($pagination['per_page'], $pagination['offset']);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/pending_posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Scheduled Posts
     */
    public function scheduled_posts()
    {
        $data['title'] = trans('scheduled_posts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/scheduled_posts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/scheduled_posts', $this->post_admin_model->get_paginated_scheduled_posts_count());
         $data['scheduled_post_count']=$this->post_admin_model->get_paginated_scheduled_posts_count();
        $data['posts'] = $this->post_admin_model->get_paginated_scheduled_posts($pagination['per_page'], $pagination['offset']);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/scheduled_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Reports
     */
    public function reports()
    {
        $data['title'] = trans('reports');
        $data['authors'] = $this->report_admin_model->get_authors();
        $data['contributors'] = $this->report_admin_model->get_contributors();
        $data['form_action'] = "admin_post/reports";
        $data['list_type'] = "reports";
        excptn_haer();
        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/reports', $this->report_admin_model->get_paginated_posts_count('reports'));
        $data['reports_count']=$this->report_admin_model->get_paginated_posts_count('reports');

        $data['posts'] = $this->report_admin_model->get_paginated_posts($pagination['per_page'], $pagination['offset'], 'reports');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/report/reports', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Drafts
     */
    public function drafts()
    {
        $data['title'] = trans('drafts');
        $data['authors'] = $this->auth_model->get_authors();
        $data['form_action'] = "admin_post/drafts";

        //get paginated posts
        $pagination = $this->paginate(base_url() . 'admin_post/drafts', $this->post_admin_model->get_paginated_drafts_count());
         $data['drafts_count']=$this->post_admin_model->get_paginated_drafts_count();
        $data['posts'] = $this->post_admin_model->get_paginated_drafts($pagination['per_page'], $pagination['offset']);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/drafts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Post
     */
    public function update_post($id)
    {
        $data['title'] = trans("update_post");

        //get post
        $data['post'] = $this->post_admin_model->get_post($id);
        $data['random_posts'] = $this->post_admin_model->get_random_posts(5);

        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }

        //check if author && contributor
        if (is_contributor()) {
            //check owner
            if ($data['post']->user_id != user()->id):
                redirect("admin");
            endif;
        }

        //combine post tags
        $tags = "";
        $count = 0;
        $tags_array = $this->tag_model->get_post_tags($id);
        foreach ($tags_array as $item) {
            if ($count > 0) {
                $tags .= ",";
            }
            $tags .= $item->tag;
            $count++;
        }

        $data['tags'] = $tags;
        $data['post_images'] = $this->post_file_model->get_post_additional_images($id);
        $data['categories'] = $this->category_model->get_categories_by_lang($data['post']->lang_id);
        $data['subcategories'] = $this->category_model->get_subcategories_by_parent_id($data['post']->category_id);

        $this->load->view('admin/includes/_header', $data);
        if ($data['post']->post_type == "video") {
            $this->load->view('admin/post/update_video', $data);
        } elseif ($data['post']->post_type == "audio") {
            $this->load->view('admin/post/update_audio', $data);
        } else {
            $this->load->view('admin/post/update_post', $data);
        }
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Post Post
     */
    public function update_post_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', trans("title"), 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('summary', trans("summary"), 'xss_clean|max_length[5000]');
        $this->form_validation->set_rules('category_id', trans("category"), 'required');
        $this->form_validation->set_rules('optional_url', trans("optional_url"), 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //post id
            $post_id = $this->input->post('id', true);
            $post_type = $this->input->post('post_type', true);

            if ($this->post_admin_model->update_post($post_id, $post_type)) {

                //update slug
                $this->post_admin_model->update_slug($post_id);

                //update post tags
                $this->tag_model->update_post_tags($post_id);

                if ($post_type == "audio") {
                    $this->post_file_model->add_post_audios($post_id);
                } elseif ($post_type == "post") {
                    $this->post_file_model->add_post_additional_images($post_id);
                }

                $this->session->set_flashdata('success', trans("post") . " " . trans("msg_suc_updated"));

                $referrer = $this->input->post("referrer");
                if (!empty($referrer)) {
                    redirect($referrer);
                } else {
                    redirect('admin_post/posts');
                }

            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', trans("msg_error"));
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Post Options Post
     */
    public function post_options_post()
    {
        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);

        $data["post"] = $this->post_admin_model->get_post($id);

        //check if exists
        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }

        //if option add remove from slider
        if ($option == 'add-remove-from-slider') {

            $result = $this->post_admin_model->post_add_remove_slider($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', trans("msg_remove_slider"));
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', trans("msg_add_slider"));
                redirect($this->agent->referrer());
            }

        }

        //if option add remove from featured
        if ($option == 'add-remove-from-featured') {

            $result = $this->post_admin_model->post_add_remove_featured($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', trans("msg_remove_featured"));
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', trans("msg_add_featured"));
                redirect($this->agent->referrer());
            }
        }

        //if option add remove from breaking
        if ($option == 'add-remove-from-breaking') {

            $result = $this->post_admin_model->post_add_remove_breaking($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', trans("msg_remove_breaking"));
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', trans("msg_add_breaking"));
                redirect($this->agent->referrer());
            }

        }

        //if option add remove from recommended
        if ($option == 'add-remove-from-recommended') {

            $result = $this->post_admin_model->post_add_remove_recommended($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', trans("msg_remove_recommended"));
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', trans("msg_add_recommended"));
                redirect($this->agent->referrer());
            }
        }


        //if option approve
        if ($option == 'approve') {
            if (is_admin()):
                if ($this->post_admin_model->approve_post($id)) {
                    $this->session->set_flashdata('success', trans("msg_post_approved"));
                } else {
                    $this->session->set_flashdata('error', trans("msg_error"));
                }
            endif;
            redirect($this->agent->referrer());
        }

        //if option publish
        if ($option == 'publish') {

            if ($this->post_admin_model->publish_post($id)) {
                $this->session->set_flashdata('success', trans("msg_published"));
            } else {
                $this->session->set_flashdata('error', trans("msg_error"));
            }

            redirect($this->agent->referrer());
        }

        //if option publish draft
        if ($option == 'publish_draft') {

            if ($this->post_admin_model->publish_draft($id)) {
                $this->session->set_flashdata('success', trans("msg_published"));
            } else {
                $this->session->set_flashdata('error', trans("msg_error"));
            }

            redirect($this->agent->referrer());
        }

        //if option delete
        if ($option == 'delete_with_img') {

            if ($this->post_admin_model->delete_post($id,'with')) {
               //delete post tags
               $this->tag_model->delete_post_tags($id);

               $this->session->set_flashdata('success', trans("post") . " " . trans("msg_suc_deleted"));
               redirect($this->agent->referrer());
            } else {
               $this->session->set_flashdata('error', trans("msg_error"));
               redirect($this->agent->referrer());
            }
        }
        //if option delete
        if ($option == 'delete_without_img') {

            if ($this->post_admin_model->delete_post($id,'without')) {
               //delete post tags
               $this->tag_model->delete_post_tags($id);

               $this->session->set_flashdata('success', trans("post") . " " . trans("msg_suc_deleted"));
               redirect($this->agent->referrer());
            } else {
               $this->session->set_flashdata('error', trans("msg_error"));
               redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Delete Selected Posts
     */
    public function delete_selected_posts()
    {
        $post_ids = $this->input->post('post_ids', true);
       
        $this->post_admin_model->delete_multi_posts($post_ids);
    }

    /**
     * Save Featured Post Order
     */
    public function featured_posts_order_post()
    {
        $post_id = $this->input->post('id', true);
        $order = $this->input->post('featured_order', true);
        $this->post_admin_model->save_featured_post_order($post_id, $order);
        redirect($this->agent->referrer());
    }


    /**
     * Save Home Slider Post Order
     */
    public function home_slider_posts_order_post()
    {
        $post_id = $this->input->post('id', true);
        $order = $this->input->post('slider_order', true);
        $this->post_admin_model->save_home_slider_post_order($post_id, $order);
        redirect($this->agent->referrer());
    }


    /**
     * Get Video from URL
     */
    public function get_video_from_url()
    {
        $url = $this->input->post('url', true);

        $this->load->library('video_url_parser');
        echo $this->video_url_parser->get_url_embed($url);

    }


    /**
     * Get Video Thumbnail
     */
    public function get_video_thumbnail()
    {
        $url = $this->input->post('url', true);

        echo $this->file_model->get_video_thumbnail($url);
    }


    /**
     * Delete Additional Image
     */
    public function delete_post_additional_image()
    {
        $file_id = $this->input->post('file_id', true);
        $this->post_file_model->delete_post_additional_image($file_id);
    }


    /**
     * Delete Audio
     */
    public function delete_post_audio()
    {
        $post_id = $this->input->post('post_id', true);
        $audio_id = $this->input->post('audio_id', true);
        $this->post_file_model->delete_post_audio($post_id, $audio_id);
    }

    /**
     * Delete Video
     */
    public function delete_post_video()
    {
        $post_id = $this->input->post('post_id', true);
        $this->post_file_model->delete_post_video($post_id);
    }

    /**
     * Delete Post Main Image
     */
    public function delete_post_main_image()
    {
        $post_id = $this->input->post('post_id', true);
        $this->post_file_model->delete_post_main_image($post_id);
    }

    public function set_pagination_per_page($count)
    {
        $_SESSION['pagination_per_page'] = $count;
        redirect($this->agent->referrer());
    }
}
