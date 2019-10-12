<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        //check auth
        if (!is_admin()) {
            redirect('login');
        }

        //check permission
        if (!show_admin_panel()) {
            redirect('admin/login');
        }
    }


    /**
     * Add Page
     */
    public function add_page()
    {
        $data['title'] = trans("add_page");
        $data['menu_links'] = $this->navigation_model->get_menu_links();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Page Post
     */
    public function add_page_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', trans("title"), 'required|xss_clean|max_length[500]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {

            if (!$this->page_model->check_page_name()) {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', trans("msg_page_slug_error"));
                redirect($this->agent->referrer());
                exit();
            }

            if ($this->page_model->add()) {
                $this->session->set_flashdata('success', trans("page") . " " . trans("msg_suc_added"));
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', trans("msg_error"));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Pages
     */
    public function pages()
    {
        $data['title'] = trans("pages");
        $data['pages'] = $this->page_model->get_all_pages();
        $data['lang_search_column'] = 2;
        chk_lce();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/pages', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Page
     */
    public function update_page($id)
    {
        $data['title'] = trans("update_page");

        //find page
        $data['page'] = $this->page_model->get_page_by_id($id);

        //page not found
        if (empty($data['page'])) {
            redirect($this->agent->referrer());
        }
        $data['menu_links'] = $this->navigation_model->get_menu_links_by_lang($data['page']->lang_id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Page Post
     */
    public function update_page_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', trans("title"), 'required|xss_clean|max_length[500]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            $redirect_url = $this->input->post('redirect_url', true);

            if (!$this->page_model->check_page_name()) {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', trans("msg_page_slug_error"));
                redirect($this->agent->referrer());
                exit();
            }

            if ($this->page_model->update($id)) {
                $this->session->set_flashdata('success', trans("page") . " " . trans("msg_suc_updated"));

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect('page/pages');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', trans("msg_error"));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Page Post
     */
    public function delete_page_post()
    {

        $id = $this->input->post('id', true);

        $page = $this->page_model->get_page_by_id($id);

        if (empty($page)) {
            redirect($this->agent->referrer());
        }

        //check if page custom or not
        if ($page->is_custom == 0) {
            $lang = $this->language_model->get_language($page->lang_id);
            if (!empty($lang)) {
                $this->session->set_flashdata('error', trans("msg_page_delete"));
                redirect($this->agent->referrer());
            }
        }

        if ($this->page_model->delete($id)) {
            $this->session->set_flashdata('success', trans("page") . " " . trans("msg_suc_deleted"));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans("msg_error"));
            redirect($this->agent->referrer());
        }
    }


}