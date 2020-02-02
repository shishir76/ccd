<?phpdefined('BASEPATH') OR exit('No direct script access allowed');class Multiple_choice_model extends CI_Model{    //input values    public function input_values()    {		$data = array(            'que_category' => $this->input->post('que_category', true),            'que_language' => $this->input->post('que_language', true),            'que_topic' => $this->input->post('que_topic', true),            'que_difficulty_level' => $this->input->post('que_difficulty_level', true),            'que_type' => $this->input->post('que_type', true),            'que_heading' => $this->input->post('que_heading', true),            'que_paragraph' => $this->input->post('que_paragraph', true),            'que_question' => $this->input->post('que_question', true),            'que_answer1' => $this->input->post('que_answer1', true),            'que_answer2' => $this->input->post('que_answer2', true),            'que_answer3' => $this->input->post('que_answer3', true),            'que_answer4' => $this->input->post('que_answer4', true),            'que_correct_answer' => $this->input->post('que_correct_answer', true),            'que_datetime' => $this->input->post('que_datetime', true),            'que_status' => $this->input->post('que_status', true),	        );        return $data;    }    //add    public function add()    {        $data = $this->input_values();        return $this->db->insert('que_multiple_choice', $data);    }    //update    public function update($id)    {        //set values        $data = $this->input_values();        $this->db->where('que_id', $id);        return $this->db->update('que_multiple_choice', $data);    }	    //get all data    public function get_all_multiple_choice()    {        $this->db->order_by('que_multiple_choice.que_id', 'ASC');        $query = $this->db->get('que_multiple_choice');        return $query->result();    }    //get data by id    public function get_multiple_choice_by_id($id)    {        $this->db->where('que_multiple_choice.que_id', $id);        $query = $this->db->get('que_multiple_choice');        return $query->row();    }    //get unique    public function get_multiple_choice_by_name($que_question)    {        $this->db->where('que_multiple_choice.que_question', $que_question);        $query = $this->db->get('que_multiple_choice');        return $query->row();    }        //delete    public function delete($id)    {        $que_question = $this->get_multiple_choice_by_id($id);        if (!empty($que_question)) {			$this->db->where('que_multiple_choice.que_id', $id);            return $this->db->delete('que_multiple_choice');        } else {            return false;        }    }	    //check if field is unique    public function is_unique_field($que_question, $que_id = 0)    {        $que_question = $this->multiple_choice_model->get_multiple_choice_by_name($que_question);         //if id doesnt exists        if ($que_id == 0)         {            if (empty($que_question))             {                return true;            }             else             {                return false;            }        }        if ($que_id != 0)         {            if (!empty($que_question) && $que_question->que_id == $que_id)             {                //field taken                return true;            }             else             {                return false;            }        }    }}