<?php
/*
 * Custom Helpers
 *
 */

//check auth
if (!function_exists('lang_base_url')) {
    function lang_base_url()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->lang_base_url;
    }
}

//check auth
if (!function_exists('auth_check')) {
    function auth_check()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_logged_in();
    }
}

//check admin
if (!function_exists('is_admin')) {
    function is_admin()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_admin();
    }
}

//check editor
if (!function_exists('is_author')) {
    function is_author()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_author();
    }
}

//check contributor
if (!function_exists('is_contributor')) {
    function is_contributor()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_contributor();
    }
}


//show admin panel
if (!function_exists('show_admin_panel')) {
    function show_admin_panel()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->show_admin_panel();
    }
}

//prevent editor
if (!function_exists('prevent_author')) {
    function prevent_author()
    {
        //check auth
        if (is_author()) {
            redirect(base_url() . 'admin');
        }
    }
}

//prevent contributor
if (!function_exists('prevent_contributor')) {
    function prevent_contributor()
    {
        //check auth
        if (is_contributor()) {
            redirect(base_url() . 'admin');
        }
    }
}

//get logged user
if (!function_exists('user')) {
    function user()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $user = $ci->auth_model->get_logged_user();
        if (empty($user)) {
            $ci->auth_model->logout();
        } else {
            return $user;
        }

    }
}

//get user by id
if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->get_user($user_id);
    }
}

//get parent link
if (!function_exists('helper_get_parent_link')) {
    function helper_get_parent_link($parent_id, $type)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->navigation_model->get_parent_link($parent_id, $type);
    }
}

//get sub menu links
if (!function_exists('helper_get_sub_menu_links')) {
    function helper_get_sub_menu_links($id, $type)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->navigation_model->get_sub_links($id, $type);
    }
}

//get category
if (!function_exists('helper_get_category')) {
    function helper_get_category($category_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->category_model->get_category($category_id);
    }
}
//get city
if (!function_exists('helper_get_city_id_from_city_list')) {
    function helper_get_city_id_from_city_list($longitude,$latitude)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->widget_model->get_city($longitude,$latitude);
    }
}

//get subcategories
if (!function_exists('helper_get_subcategories')) {
    function helper_get_subcategories($parent_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->category_model->get_subcategories_by_parent_id($parent_id);
    }
}

//get posts category info
if (!function_exists('get_post_category')) {
    function get_post_category($post)
    {
        if (!empty($post)) {
            $ci =& get_instance();

            //check if subcategory exists
            $category = $ci->category_model->get_category($post->subcategory_id);

            if (!empty($category)) {
                $data = array(
                    'id' => $category->id,
                    'name' => $category->name,
                    'name_slug' => $category->name_slug,
                    'color' => $category->color,
                );
                return $data;
            } else {

                //check if category exists
                $category = $ci->category_model->get_category($post->category_id);
                if (!empty($category)) {
                    $data = array(
                        'id' => $category->id,
                        'name' => $category->name,
                        'name_slug' => $category->name_slug,
                        'color' => $category->color,
                    );
                    return $data;
                }
            }

            $data = array(
                'name' => "",
                'name_slug' => "",
                'color' => "",
            );
            return $data;
        }
    }
}

//get last posts by category
if (!function_exists('helper_get_last_posts_by_category')) {
    function helper_get_last_posts_by_category($category_id, $count)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->post_model->get_last_posts_by_category($category_id, $count);
    }
}

//get subcategory posts
if (!function_exists('helper_get_last_posts_by_subcategory')) {
    function helper_get_last_posts_by_subcategory($subcategory_id, $count)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->post_model->get_last_posts_by_subcategory($subcategory_id, $count);
    }
}

//get post images
if (!function_exists('get_post_image')) {
    function get_post_image($post, $image_size)
    {
        if (!empty($post)) {

            if (!empty($post->image_url)) {
                return $post->image_url;
            } else {
                if ($image_size == "big") {
                    return base_url() . $post->image_big;
                } elseif ($image_size == "default") {
                    return base_url() . $post->image_default;
                } elseif ($image_size == "slider") {
                    return base_url() . $post->image_slider;
                } elseif ($image_size == "mid") {
                    return base_url() . $post->image_mid;
                } elseif ($image_size == "small") {
                    return base_url() . $post->image_small;
                }
            }

        }
    }
}


//get post images
if (!function_exists('get_post_additional_images')) {
    function get_post_additional_images($post_id)
    {
        $ci =& get_instance();
        return $ci->post_file_model->get_post_additional_images($post_id);
    }
}


//get post audios
if (!function_exists('get_post_audios')) {
    function get_post_audios($post_id)
    {
        $ci =& get_instance();
        return $ci->post_file_model->get_post_audios($post_id);
    }
}


//get ad codes
if (!function_exists('helper_get_ad_codes')) {
    function helper_get_ad_codes($ad_space)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->ad_model->get_ad_codes($ad_space);
    }
}

//get translated message
if (!function_exists('trans')) {
    function trans($string)
    {
        $ci =& get_instance();
        return $ci->lang->line($string);
    }
}

//print old form data
if (!function_exists('old')) {
    function old($field)
    {
        $ci =& get_instance();
        return html_escape($ci->session->flashdata('form_data')[$field]);
    }
}

//delete image from server
if (!function_exists('delete_image_from_server')) {
    function delete_image_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 15 && file_exists($full_path)) {
            unlink($full_path);
        }
    }
}

//delete file from server
if (!function_exists('delete_file_from_server')) {
    function delete_file_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 15 && file_exists($full_path)) {
            unlink($full_path);
        }
    }
}

//is category has subcategory
if (!function_exists('is_category_has_subcategory')) {
    function is_category_has_subcategory($id)
    {
        $ci =& get_instance();

        if (count($ci->category_model->get_subcategories_by_parent_id($id)) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

//get user avatar
if (!function_exists('get_user_avatar')) {
    function get_user_avatar($user)
    {
        if (!empty($user)) {
            if (!empty($user->avatar) && file_exists(FCPATH . $user->avatar)) {
                return base_url() . $user->avatar;
            } elseif (!empty($user->avatar)) {
                return $user->avatar;
            } else {
                return base_url() . "assets/img/user.png";
            }
        } else {
            return base_url() . "assets/img/user.png";
        }
    }
}

//get user avatar by id
if (!function_exists('get_user_avatar_by_id')) {
    function get_user_avatar_by_id($user_id)
    {
        $ci =& get_instance();

        $user = $ci->auth_model->get_user($user_id);
        if (!empty($user)) {
            if (!empty($user->avatar) && file_exists(FCPATH . $user->avatar)) {
                return base_url() . $user->avatar;
            } elseif (!empty($user->avatar)) {
                return $user->avatar;
            } else {
                return base_url() . "assets/img/user.png";
            }
        } else {
            return base_url() . "assets/img/user.png";
        }
    }
}

//get page title
if (!function_exists('get_page_title')) {
    function get_page_title($page)
    {
        if (!empty($page)) {
            return html_escape($page->title);
        } else {
            return "";
        }
    }
}

//get page description
if (!function_exists('get_page_description')) {
    function get_page_description($page)
    {
        if (!empty($page)) {
            return html_escape($page->description);
        } else {
            return "";
        }
    }
}

//get page keywords
if (!function_exists('get_page_keywords')) {
    function get_page_keywords($page)
    {
        if (!empty($page)) {
            return html_escape($page->keywords);
        } else {
            return "";
        }
    }
}

//get post comment count
if (!function_exists('get_post_comment_count')) {
    function get_post_comment_count($post_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->get_post_comment_count($post_id);
    }
}

//get post notification count
if (!function_exists('get_notification_count_by_user_id')) {
    function get_notification_count_by_user_id($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->notification_model->count_notifications($user_id);
    }
}

//get post notification count
if (!function_exists('get_contact_messages_count')) {
    function get_contact_messages_count()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->contact_model->count_meassages();
    }
}

//get commennt count
if (!function_exists('get_unseen_comment_count')) {
    function get_unseen_comment_count()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->get_unseen_comment_count();
    }
}


//get commennt count
if (!function_exists('get_unseen_newsletter_count')) {
    function get_unseen_newsletter_count()
    {       
        $ci =& get_instance();
        return $ci->newsletter_model->get_unseen_newsletter_count();
    }
}
//get subcomments
if (!function_exists('get_subcomments')) {
    function get_subcomments($comment_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->get_subcomments($comment_id);
    }
}

//get comment like count
if (!function_exists('get_comment_like_count')) {
    function get_comment_like_count($comment_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->comment_like_count($comment_id);
    }
}

//get total vote count
if (!function_exists('get_total_vote_count')) {
    function get_total_vote_count($poll_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->poll_model->get_total_vote_count($poll_id);
    }
}

//get option vote count
if (!function_exists('get_option_vote_count')) {
    function get_option_vote_count($poll_id, $option)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->poll_model->get_option_vote_count($poll_id, $option);
    }
}

//date format
if (!function_exists('helper_date_format')) {
    function helper_date_format($datetime)
    {
        $date = date("M j, Y", strtotime($datetime));
        $date = str_replace("Jan", trans("January"), $date);
        $date = str_replace("Feb", trans("February"), $date);
        $date = str_replace("Mar", trans("March"), $date);
        $date = str_replace("Apr", trans("April"), $date);
        $date = str_replace("May", trans("May"), $date);
        $date = str_replace("Jun", trans("June"), $date);
        $date = str_replace("Jul", trans("July"), $date);
        $date = str_replace("Aug", trans("August"), $date);
        $date = str_replace("Sep", trans("September"), $date);
        $date = str_replace("Oct", trans("October"), $date);
        $date = str_replace("Nov", trans("November"), $date);
        $date = str_replace("Dec", trans("December"), $date);
        return $date;

    }
}
if (!function_exists('getDatetimeNow')) {
function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y-m-d H:i:s');
}
}
//date format for comments
if (!function_exists('helper_comment_date_format')) {
    function helper_comment_date_format($datetime)
    {
        $date = date("M j, Y g:i a", strtotime($datetime));
        $date = str_replace("Jan", trans("January"), $date);
        $date = str_replace("Feb", trans("February"), $date);
        $date = str_replace("Mar", trans("March"), $date);
        $date = str_replace("Apr", trans("April"), $date);
        $date = str_replace("May", trans("May"), $date);
        $date = str_replace("Jun", trans("June"), $date);
        $date = str_replace("Jul", trans("July"), $date);
        $date = str_replace("Aug", trans("August"), $date);
        $date = str_replace("Sep", trans("September"), $date);
        $date = str_replace("Oct", trans("October"), $date);
        $date = str_replace("Nov", trans("November"), $date);
        $date = str_replace("Dec", trans("December"), $date);
        return $date;
    }
}

//get logo
if (!function_exists('get_logo')) {
    function get_logo($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->logo) && file_exists(FCPATH . $settings->logo)) {
                return base_url() . $settings->logo;
            } else {
                return base_url() . "assets/img/logo.png";
            }
        } else {
            return base_url() . "assets/img/logo.png";
        }
    }
}

//get logo
if (!function_exists('get_logo_footer')) {
    function get_logo_footer($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->logo_footer) && file_exists(FCPATH . $settings->logo_footer)) {
                return base_url() . $settings->logo_footer;
            } else {
                return base_url() . "assets/img/logo-footer.png";
            }
        } else {
            return base_url() . "assets/img/logo-footer.png";
        }
    }
}

//get favicon
if (!function_exists('get_favicon')) {
    function get_favicon($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->favicon) && file_exists(FCPATH . $settings->favicon)) {
                return base_url() . $settings->favicon;
            } else {
                return base_url() . "assets/img/favicon.png";
            }
        } else {
            return base_url() . "assets/img/favicon.png";
        }
    }
}

//get settings
if (!function_exists('get_settings')) {
    function get_settings($lang_id)
    {
        $ci =& get_instance();
        $ci->load->model('settings_model');
        return $ci->settings_model->get_settings($lang_id);
    }
}

//get general settings
if (!function_exists('get_general_settings')) {
    function get_general_settings()
    {
        $ci =& get_instance();
        $ci->load->model('settings_model');
        return $ci->settings_model->get_general_settings();
    }
}

//get admin url
if (!function_exists('get_admin_url')) {
    function get_admin_url()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $ci->load->model('settings_model');
        $settings = $ci->settings_model->get_general_settings();

        if (!empty($settings)) {
            return $settings->admin_url();
        }
    }
}

if (!function_exists('chk_lce')) {
    function chk_lce()
    {
        // if (tm_referx() == hash('whirlpool', log_mes_re() . get_instanx())) {
        //     return true;
        // }
        return true;
    }
}

//date diff
if (!function_exists('date_difference')) {
    function date_difference($date1, $date2, $format = '%a')
    {
        $datetime_1 = date_create($date1);
        $datetime_2 = date_create($date2);
        $diff = date_diff($datetime_1, $datetime_2);
        return $diff->format($format);
    }
}

//get feed posts count
if (!function_exists('get_feed_posts_count')) {
    function get_feed_posts_count($feed_id)
    {
        $ci =& get_instance();
        return $ci->post_admin_model->get_feed_posts_count($feed_id);
    }
}

//get language
if (!function_exists('get_language')) {
    function get_language($lang_id)
    {
        $ci =& get_instance();
        return $ci->language_model->get_language($lang_id);
    }
}

//get languages
if (!function_exists('get_active_languages')) {
    function get_active_languages()
    {
        $ci =& get_instance();
        $ci->load->model('language_model');
        return $ci->language_model->get_active_languages();
    }
}

//set cookie
if (!function_exists('helper_setcookie')) {
    function helper_setcookie($name, $value)
    {
        setcookie($name, $value, time() + (86400 * 30), "/"); //30 days
    }
}

//delete cookie
if (!function_exists('helper_deletecookie')) {
    function helper_deletecookie($name)
    {
        setcookie($name, "", time() - 3600, "/");
    }
}

//is reaction voted
if (!function_exists('is_reaction_voted')) {
    function is_reaction_voted($post_id, $reaction)
    {
        if (isset($_SESSION["vr_reaction_" . $reaction . "_" . $post_id]) && $_SESSION["vr_reaction_" . $reaction . "_" . $post_id] == '1') {
            return true;
        } else {
            return false;
        }
    }
}

//get notifications count
if (!function_exists('count_notifications')) {
    function count_notifications($user_id)
    {
        $ci =& get_instance();
        return $ci->notification_model->count_notifications($user_id);
    }
}

//get notifications by userId
if (!function_exists('get_notification_by_user_id')) {
    function get_notification_by_user_id($user_id)
    {
        $ci =& get_instance();
        return $ci->notification_model->get_notification_by_user_id($user_id);
    }
}

//get edition
if (!function_exists('get_edition')) {
    function get_edition($id)
    {
        $ci =& get_instance();
        return $ci->edition_model->get_editions_by_id($id);
    }
}

//get epaper history list
if (!function_exists('get_epaper_history_list')) {
    function get_epaper_history_list($id)
    {
        $ci =& get_instance();
        return $ci->epaper_model->get_epaper_history_list_by_epaper_history_id($id);
    }
}

//slug generator
if (!function_exists('str_slug')) {
    function str_slug($str, $separator = 'dash', $lowercase = TRUE)
    {
        $str = trim($str);
        $CI =& get_instance();
        $foreign_characters = array(
            '/ä|æ|ǽ/' => 'ae',
            '/ö|œ/' => 'o',
            '/ü/' => 'u',
            '/Ä/' => 'Ae',
            '/Ü/' => 'u',
            '/Ö/' => 'o',
            '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Α|Ά|Ả|Ạ|Ầ|Ẫ|Ẩ|Ậ|Ằ|Ắ|Ẵ|Ẳ|Ặ|А/' => 'A',
            '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|α|ά|ả|ạ|ầ|ấ|ẫ|ẩ|ậ|ằ|ắ|ẵ|ẳ|ặ|а/' => 'a',
            '/Б/' => 'B',
            '/б/' => 'b',
            '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
            '/ç|ć|ĉ|ċ|č/' => 'c',
            '/Д/' => 'D',
            '/д/' => 'd',
            '/Ð|Ď|Đ|Δ/' => 'Dj',
            '/ð|ď|đ|δ/' => 'dj',
            '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ε|Έ|Ẽ|Ẻ|Ẹ|Ề|Ế|Ễ|Ể|Ệ|Е|Э/' => 'E',
            '/è|é|ê|ë|ē|ĕ|ė|ę|ě|έ|ε|ẽ|ẻ|ẹ|ề|ế|ễ|ể|ệ|е|э/' => 'e',
            '/Ф/' => 'F',
            '/ф/' => 'f',
            '/Ĝ|Ğ|Ġ|Ģ|Γ|Г|Ґ/' => 'G',
            '/ĝ|ğ|ġ|ģ|γ|г|ґ/' => 'g',
            '/Ĥ|Ħ/' => 'H',
            '/ĥ|ħ/' => 'h',
            '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Η|Ή|Ί|Ι|Ϊ|Ỉ|Ị|И|Ы/' => 'I',
            '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|η|ή|ί|ι|ϊ|ỉ|ị|и|ы|ї/' => 'i',
            '/Ĵ/' => 'J',
            '/ĵ/' => 'j',
            '/Ķ|Κ|К/' => 'K',
            '/ķ|κ|к/' => 'k',
            '/Ĺ|Ļ|Ľ|Ŀ|Ł|Λ|Л/' => 'L',
            '/ĺ|ļ|ľ|ŀ|ł|λ|л/' => 'l',
            '/М/' => 'M',
            '/м/' => 'm',
            '/Ñ|Ń|Ņ|Ň|Ν|Н/' => 'N',
            '/ñ|ń|ņ|ň|ŉ|ν|н/' => 'n',
            '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|Ο|Ό|Ω|Ώ|Ỏ|Ọ|Ồ|Ố|Ỗ|Ổ|Ộ|Ờ|Ớ|Ỡ|Ở|Ợ|О/' => 'O',
            '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|ο|ό|ω|ώ|ỏ|ọ|ồ|ố|ỗ|ổ|ộ|ờ|ớ|ỡ|ở|ợ|о/' => 'o',
            '/П/' => 'P',
            '/п/' => 'p',
            '/Ŕ|Ŗ|Ř|Ρ|Р/' => 'R',
            '/ŕ|ŗ|ř|ρ|р/' => 'r',
            '/Ś|Ŝ|Ş|Ș|Š|Σ|С/' => 'S',
            '/ś|ŝ|ş|ș|š|ſ|σ|ς|с/' => 's',
            '/Ț|Ţ|Ť|Ŧ|τ|Т/' => 'T',
            '/ț|ţ|ť|ŧ|т/' => 't',
            '/Þ|þ/' => 'th',
            '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ũ|Ủ|Ụ|Ừ|Ứ|Ữ|Ử|Ự|У/' => 'U',
            '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|υ|ύ|ϋ|ủ|ụ|ừ|ứ|ữ|ử|ự|у/' => 'u',
            '/Ý|Ÿ|Ŷ|Υ|Ύ|Ϋ|Ỳ|Ỹ|Ỷ|Ỵ|Й/' => 'Y',
            '/ý|ÿ|ŷ|ỳ|ỹ|ỷ|ỵ|й/' => 'y',
            '/В/' => 'V',
            '/в/' => 'v',
            '/Ŵ/' => 'W',
            '/ŵ/' => 'w',
            '/Ź|Ż|Ž|Ζ|З/' => 'Z',
            '/ź|ż|ž|ζ|з/' => 'z',
            '/Æ|Ǽ/' => 'AE',
            '/ß/' => 'ss',
            '/Ĳ/' => 'IJ',
            '/ĳ/' => 'ij',
            '/Œ/' => 'OE',
            '/ƒ/' => 'f',
            '/ξ/' => 'ks',
            '/π/' => 'p',
            '/β/' => 'v',
            '/μ/' => 'm',
            '/ψ/' => 'ps',
            '/Ё/' => 'Yo',
            '/ё/' => 'yo',
            '/Є/' => 'Ye',
            '/є/' => 'ye',
            '/Ї/' => 'Yi',
            '/Ж/' => 'Zh',
            '/ж/' => 'zh',
            '/Х/' => 'Kh',
            '/х/' => 'kh',
            '/Ц/' => 'Ts',
            '/ц/' => 'ts',
            '/Ч/' => 'Ch',
            '/ч/' => 'ch',
            '/Ш/' => 'Sh',
            '/ш/' => 'sh',
            '/Щ/' => 'Shch',
            '/щ/' => 'shch',
            '/Ъ|ъ|Ь|ь/' => '',
            '/Ю/' => 'Yu',
            '/ю/' => 'yu',
            '/Я/' => 'Ya',
            '/я/' => 'ya'
        );

        $str = preg_replace(array_keys($foreign_characters), array_values($foreign_characters), $str);

        $replace = ($separator == 'dash') ? '-' : '_';

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace . '+' => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            if (function_exists('mb_convert_case')) {
                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
            } else {
                $str = strtolower($str);
            }
        }

        $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str);

        return trim(stripslashes($str));
    }
}


//get image url from ckeditor
if (!function_exists('get_img_src')) {
    function get_img_src($input)
    {
        preg_match_all("/<img[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $input, $output);
        $return = array();
        if(isset($output[1][0])) {
        $return = $output[1];
        }
        return $return;
    }
}
//remove_blank_tag_from_html
if (!function_exists('remove_blank_tag')) {
function remove_blank_tag($html) {
   $html = str_replace( '&nbsp;', ' ', $html );
   do {
       $tmp = $html;
       $html = preg_replace(
           '#<([^ >]+)[^>]*>[[:space:]]*</\1>#', '', $html );
   } while ( $html !== $tmp );

   return $html;
}
}
//remove_image_from_html
if (!function_exists('remove_image_from_html')) {
    function remove_image_from_html($html,$img_src,$text)
    {
        $img_src = preg_replace("/(\W)/", "\\\\$1", $img_src);
        return preg_replace("/<img[^>]*?\ssrc\s*=\s*[\'\"]" . $img_src. "[\'\"].*?>/si", "<span>$text</span>", $html);
    }
}

//remove_image_from_html
if (!function_exists('translate_hindi_to_english')) {
    function translate_hindi_to_english($text){
    $translateapi_Key = 'AIzaSyBbgEHdjJBw-iTjaGLgXn51RYMvgZh-xPU';
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $translateapi_Key . '&q=' . rawurlencode($text) . '&source=hi&target=en';
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $responseDecoded = json_decode($response, true);
    $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
    curl_close($handle);
    return $responseDecoded['data']['translations'][0]['translatedText'];   
}
}


//get image url from ckeditor and upload to folder
if (!function_exists('localize_big_image')) {
    function localize_big_image($post_image)
    {
        $image_url=file_get_contents($post_image);
        $img=imagecreatefromstring($image_url); 
       
        $thumb_w = 750;
        $thumb_h = 422;
        $old_x = imagesx($img);   // Source image width
        $old_y = imagesy($img);   // Source image height
        $image_size=imagecreatetruecolor($thumb_w,$thumb_h);
        imagecopyresampled($image_size, $img, 0, 0, 0, 0, $thumb_w,$thumb_h, $old_x, $old_y);
        $path = "uploads/images/image_".$thumb_w.'x'.$thumb_h.'_'.uniqid().'.jpg';
        imagejpeg($image_size,$path);
        return $post_image=$path;
    }
}

if (!function_exists('localize_default_image')) {
    function localize_default_image($post_image)
    {
        $image_url=file_get_contents($post_image);
        $img=imagecreatefromstring($image_url); 
        $old_x = imagesx($img);   // Source image width
        $old_y = imagesy($img);   // Source image height
        $thumb_w = 750;
        $thumb_h = $old_y;
        $image_size=imagecreatetruecolor($thumb_w,$thumb_h);
        imagecopyresampled($image_size, $img, 0, 0, 0, 0, $thumb_w,$thumb_h, $old_x, $old_y);
        $path = "uploads/images/image_".$thumb_w.'x_'.uniqid().'.jpg';
        imagejpeg($image_size,$path);
        return $post_image=$path;
    }
}

if (!function_exists('localize_slider_image')) {
    function localize_slider_image($post_image)
    {
        $image_url=file_get_contents($post_image);
        $img=imagecreatefromstring($image_url); 
        $thumb_w = 600;
        $thumb_h = 460;
        $old_x = imagesx($img);   // Source image width
        $old_y = imagesy($img);   // Source image height
        $image_size=imagecreatetruecolor($thumb_w,$thumb_h);
        imagecopyresampled($image_size, $img, 0, 0, 0, 0, $thumb_w,$thumb_h, $old_x, $old_y);
        $path = "uploads/images/image_".$thumb_w.'x'.$thumb_h.'_'.uniqid().'.jpg';
        imagejpeg($image_size,$path);
        return $post_image=$path;
    }
}

if (!function_exists('localize_mid_image')) {
    function localize_mid_image($post_image)
    {
        $image_url=file_get_contents($post_image);
        $img=imagecreatefromstring($image_url); 
        $thumb_w = 380;
        $thumb_h = 240;
        $old_x = imagesx($img);   // Source image width
        $old_y = imagesy($img);   // Source image height
        $image_size=imagecreatetruecolor($thumb_w,$thumb_h);
        imagecopyresampled($image_size, $img, 0, 0, 0, 0, $thumb_w,$thumb_h, $old_x, $old_y);
        $path = "uploads/images/image_".$thumb_w.'x'.$thumb_h.'_'.uniqid().'.jpg';
        imagejpeg($image_size,$path);
        return $post_image=$path;
    }
}

if (!function_exists('localize_small_image')) {
    function localize_small_image($post_image)
    {
        $image_url=file_get_contents($post_image);
        $img=imagecreatefromstring($image_url); 
        $thumb_w = 140;
        $thumb_h = 98;
        $old_x = imagesx($img);   // Source image width
        $old_y = imagesy($img);   // Source image height
        $image_size=imagecreatetruecolor($thumb_w,$thumb_h);
        imagecopyresampled($image_size, $img, 0, 0, 0, 0, $thumb_w,$thumb_h, $old_x, $old_y);
        $path = "uploads/images/image_".$thumb_w.'x'.$thumb_h.'_'.uniqid().'.jpg';
        imagejpeg($image_size,$path);
        return $post_image=$path;
    }
}



?>