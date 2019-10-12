<?php defined('BASEPATH') OR exit('No direct script access allowed');class Question_difficulty_level extends Admin_Core_Controller{    public function __construct()    {        parent::__construct();        //check auth        if (!is_admin())         {            redirect('login');        }        //check permission        if (!show_admin_panel())         {            redirect('admin/login');        }    }        /*** Add City */    public function add()    {        $data['title'] = trans("add_question_difficulty_level");        $this->load->view('admin/includes/_header', $data);        $this->load->view('admin/question_difficulty_level/add', $data);        $this->load->view('admin/includes/_footer');    }    /*** Add City Post */    public function add_question_difficulty_level()    {        //validate inputs        $this->form_validation->set_rules('difficulty_level', trans("difficulty_level"), 'required|xss_clean');		$difficulty_level = $this->input->post('difficulty_level', true);		if (!$this->question_difficulty_level_model->is_unique_field($difficulty_level)) 		{		    $this->session->set_flashdata('form_data', $this->question_difficulty_level_model->input_values());		    $this->session->set_flashdata('error', trans("message_field_already_error"));		    redirect($this->agent->referrer());		}        if ($this->form_validation->run() === false)         {            $this->session->set_flashdata('errors', validation_errors());            $this->session->set_flashdata('form_data', $this->question_difficulty_level_model->input_values());            redirect($this->agent->referrer());        }         else         {            if ($this->question_difficulty_level_model->add())             {                $last_id = $this->db->insert_id();				$this->session->set_flashdata('success', trans("question_difficulty_level") . " " . trans("msg_suc_added"));                redirect($this->agent->referrer());            }             else             {                $this->session->set_flashdata('form_data', $this->question_difficulty_level_model->input_values());                $this->session->set_flashdata('error', trans("msg_error"));                redirect($this->agent->referrer());            }        }    }    /*** City List View */    public function listview()    {        $data['title'] = trans("question_difficulty_levels");        $data['difficulty_levels'] = $this->question_difficulty_level_model->get_all_difficulty_levels();        $data['lang_search_column'] = 2;        $this->load->view('admin/includes/_header', $data);        $this->load->view('admin/question_difficulty_level/listview', $data);        $this->load->view('admin/includes/_footer');    }    /*** Update City */    public function update($id)    {        $data['title'] = trans("update_question_difficulty_level");        //find city        $data['difficulty_level'] = $this->question_difficulty_level_model->get_difficulty_level($id);        //poll not found        if (empty($data['difficulty_level']))         {            redirect($this->agent->referrer());        }        $this->load->view('admin/includes/_header', $data);        $this->load->view('admin/question_difficulty_level/update', $data);        $this->load->view('admin/includes/_footer');    }    /*** Update City Post */    public function update_question_difficulty_level()    {        //validate inputs        $this->form_validation->set_rules('difficulty_level', trans("difficulty_level"), 'required|xss_clean');	        if ($this->form_validation->run() === false)         {            $this->session->set_flashdata('errors', validation_errors());            $this->session->set_flashdata('form_data', $this->question_difficulty_level_model->input_values());            redirect($this->agent->referrer());        }         else         {            //get id            $id = $this->input->post('id', true);            $difficulty_level = $this->input->post('difficulty_level', true);            if (!$this->question_difficulty_level_model->is_unique_field($difficulty_level, $id)) {                $this->session->set_flashdata('error', trans("message_field_already_error"));                redirect($this->agent->referrer());            }                        if ($this->question_difficulty_level_model->update($id))             {				$this->session->set_flashdata('success', trans("question_difficulty_level") . " " . trans("msg_suc_updated"));                redirect('question_difficulty_level/listview');            }             else             {                $this->session->set_flashdata('form_data', $this->question_difficulty_level_model->input_values());                $this->session->set_flashdata('error', trans("msg_error"));                redirect($this->agent->referrer());            }        }    }    /*** Delete City Post */    public function delete_question_difficulty_level()    {        $id = $this->input->post('id', true);        $difficulty_level = $this->question_difficulty_level_model->get_difficulty_level($id);        if (empty($difficulty_level))         {            redirect($this->agent->referrer());        }        if ($this->question_difficulty_level_model->delete($id))         {            $this->session->set_flashdata('success', trans("question_difficulty_level") . " " . trans("msg_suc_deleted"));            redirect($this->agent->referrer());        } else         {            $this->session->set_flashdata('error', trans("msg_error"));            redirect($this->agent->referrer());        }    }}