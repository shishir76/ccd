<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_model extends CI_Model
{
    public function input_values()
    {
        $data = array(
            'ad_code_728' => $this->input->post('ad_code_728', false),
            'ad_code_468' => $this->input->post('ad_code_468', false),
            'ad_code_234' => $this->input->post('ad_code_234', false),
            'is_active' => $this->input->post('is_active', false), 
        );

        return $data;
    }

    public function input_url_values()
    {
        $data = array(
            'url_ad_code_728' => $this->input->post('url_ad_code_728', false),
            'url_ad_code_468' => $this->input->post('url_ad_code_468', false),
            'url_ad_code_234' => $this->input->post('url_ad_code_234', false),
        );

        return $data;
    }

    public function update_ad_spaces($ad_space)
    {
        $data = $this->input_values();
        $data_url = $this->input_url_values();
         if($this->input->post('ad_type') == 0){
             $data['ad_type']=$this->input->post('ad_type', false);
        if ($ad_space == "sidebar_top" || $ad_space == "sidebar_bottom") {

            $data["ad_code_300"] = $this->input->post('ad_code_300', false);
            $url_ad_code_300 = $this->input->post('url_ad_code_300', false);

            $file = $_FILES['file_ad_code_300'];
            if (!empty($file['name'])) {
                $style = "300";
                $path = $this->upload_model->ad_upload($file);
                $data["ad_code_300"] = $this->create_ad_code($ad_space,$url_ad_code_300, $path, $style);
            }

        } else {
            if ($ad_space == "post_mid") {
                $data["ad_between_para"] = $this->input->post('ad_between', false);  
               
            }

            $file = $_FILES['file_ad_code_728'];
            if (!empty($file['name'])) {
                $style = "728";
                $path = $this->upload_model->ad_upload($file);
                $data["ad_code_728"] = $this->create_ad_code($ad_space,$data_url["url_ad_code_728"], $path, $style);
            }
            $file = $_FILES['file_ad_code_468'];
            if (!empty($file['name'])) {
                $style = "468";
                $path = $this->upload_model->ad_upload($file);
                $data["ad_code_468"] = $this->create_ad_code($ad_space,$data_url["url_ad_code_468"], $path, $style);
            }
           
        }
        }
             else{
                 if ($ad_space == "post_mid") {
                $data["ad_between_para"] = $this->input->post('ad_between', false);  
               
            }
                $data['ad_type']=$this->input->post('ad_type', false);
                $data['responsive_code']=$this->input->post('ad_responsive', false);
             }

        $file = $_FILES['file_ad_code_234'];
        if (!empty($file['name'])) {
            $style = "234";
            $path = $this->upload_model->ad_upload($file);
            $data["ad_code_234"] = $this->create_ad_code($ad_space,$data_url["url_ad_code_234"], $path, $style);
        }
        if (!empty($this->input->post('category_id'))) {
         $category_ids=$this->input->post('category_id'); 
                $category_IDs="";
                foreach ($category_ids as $category_id)
                {
                    if($category_IDs==""){
                        $category_IDs=$category_id;
                    } 
                    else{
                        $category_IDs=$category_IDs."~".$category_id;
                    }   
                }
                $data["category_id"] = $category_IDs;   

            }


        $this->db->where('ad_space', $ad_space);
        return $this->db->update('ad_spaces', $data);

    }

    //get ads
    public function get_ads()
    {
        $query = $this->db->get('ad_spaces');
        return $query->result();
    }

    //get ad codes
    public function get_ad_codes($ad_space)
    {
        $this->db->where('ad_space', $ad_space);
        $query = $this->db->get('ad_spaces');
        return $query->row();
    }

    //create ad code
    public function create_ad_code($ad_space,$url, $image_path, $imgStyle)
    {
        // return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""></a>';
        if($ad_space == "epaper_left" || $ad_space == "epaper_right" || $ad_space == "ad_model"){
            if($imgStyle== 728)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
            if($imgStyle== 468)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
            if($imgStyle== 300)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
            if($imgStyle== 234)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
        }

        else{
                if($imgStyle== 728)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                style="width:728px;height:90px;"></a>';
            }
            if($imgStyle== 468)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                style="width:468px;height:60px;"></a>';
            }
            if($imgStyle== 300)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
            if($imgStyle== 234)
            {
                return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt=""
                class="img img-responsive"></a>';
            }
        }
        
    }

}