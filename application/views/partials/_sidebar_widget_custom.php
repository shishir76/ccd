<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Custom-->
<div class="sidebar-widget">
    <div class="widget-head" style="background-color:<?php echo html_escape($widget->head_background_color); ?>;">
        <h4 class="title" style="color:<?php echo html_escape($widget->head_color); ?>;"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <?php echo $widget->content; ?>
        <div style="display: -webkit-box;">
        <ul class="popular-posts">
	        <?php $widget_custom_posts=helper_get_last_posts_by_category($widget->category_id,$widget->post_limit);
	        	foreach ($widget_custom_posts as $post): ?>
	            <li>
					<?php $this->load->view("partials/_custom_post_item_small", ["post" => $post]); ?>
	            </li>
	        <?php endforeach; ?>
	    </ul>
      </div>
	    <?php 
        if($widget->title=="Weather" && $general_settings->show_weather_report==1)
        {
          if(isset($_SERVER['REMOTE_ADDR'])){
        //$ip = $_SERVER['REMOTE_ADDR'];
        // $ip="120.89.79.76";
        // $details = json_decode(file_get_contents("https://ipinfo.io/{$ip}"));
        // $city_name=$details->city;
        ?>

      <div class="weather_widget_area" >
        <div id="openweathermap-widget-15"></div>
      </div>
<script>
  $(function(){
weather_widget();
  });
function weather_widget(){  
   var city_name='<?php echo $city_name;?>';
  
              window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 15,city_name: "kanpur",appid: '30228c2816eb2401fd1383717270c780',units: 'metric',containerid: 'openweathermap-widget-15',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();
             
}
</script>
              	<?php
              }
              }
              if($widget->title=="Cricket"  && $general_settings->show_cricket_report==1)
              {
	    ?>
     
	 
	<?php } ?>
    </div>
</div>

