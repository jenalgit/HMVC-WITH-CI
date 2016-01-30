<?php defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('CI'))
{
    function CI()
    {
        if (!function_exists('get_instance')) return FALSE;
        
        $CI = &get_instance();      
        return $CI;
    }
}


if ( ! function_exists('getDateFormat')){   

    function getDateFormat($date,$format,$seperator1=",")
    {
        switch($format)
        {
            case 1: // (Ymd)->(dmY) 06 Dec, 2010 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("d M".$seperator1." Y",$arr_date);           
            break;
        
            case 2: // (Ymd)->(dmY) 06 December, 2010
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("d F".$seperator1." Y",$arr_date);           
            break;
            
            case 3: // (Ymd)->(dmY) Mon Dec 06, 2010 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("D M d".$seperator1." Y",$arr_date);           
            break;
            
            case 4: // (Ymd)->(dmY) Monday December 06, 2010 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("l F d".$seperator1." Y",$arr_date);           
            break;
            
            case 5: // (Ymd)->(dmY) Monday December 06, 2010, 03:04:00 
                $arr_time1=explode(" ",$date);           
                $arr_date=strtotime($date);
                $ret_date=date("l F d".$seperator1." Y".$seperator1." h:i:s",$arr_date);           
            break;
            
            case 6: // (Ymd)->(dmY) Monday December 06, 2010, 15:03:PM 
                $arr_time1=explode(" ",$date);           
                $arr_date=strtotime($date);
                $ret_date=date("l F d".$seperator1." Y".$seperator1." H:i:A",$arr_date);           
            break;
            
            case 7: // (Ymd)->(dmY) Monday December 06, 2010, 15:03:PM 
                $arr_time1=explode(" ",$date);           
                $arr_date=strtotime($date);
                $ret_date=date("d M".$seperator1." Y".$seperator1." H:i:A",$arr_date);           
            break;
            
            case 8: // (Ymd)->(dmY) Monday December 06, 2010, 03:04:00 
                $arr_time1=explode(" ",$date);           
                $arr_date=strtotime($date);
                $ret_date=date("d M".$seperator1." Y".$seperator1." h:i",$arr_date);           
            break;
            
            case 9: // Spet 02, 2013 Monday
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("M d".$seperator1." Y l",$arr_date);           
            break;
            
            case 10: // (Ymd)->14/06/2013 - 06:45 AM 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date('d'.$seperator1.'m'.$seperator1.'Y - h:i A',$arr_date);
            break;
            
            case 11: // (Ymd)->14/06/2013 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date('d-m-Y',$arr_date);
            break;
            case 12: // (Ymd)->(dmY) 06 Dec, 2010 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("dS M".$seperator1." Y",$arr_date);           
            break;
            case 13: // (Ymd)->14/06/2013 - 06:45 AM 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                                $ret_date=date("d M".$seperator1." Y".$seperator1." h:i A",$arr_date);     
                //$ret_date=date('d'.$seperator1.'m'.$seperator1.'Y - h:i A',$arr_date);
            break; 
            case 14: // (Ymd)->14/06/2013 - 06:45 AM
                $arr_date=strtotime($date); 
                $ret_date=date("h:i A",$arr_date);     
                
            break; 
            case 15: // (Ymd)->14/06/2013 - 06:45 AM 
                $arr_date=explode($seperator1,$date);            
                $arr_date=strtotime($arr_date[0]);
                $ret_date=date("l",$arr_date);     
                
            break; 
            
            
        }
        return $ret_date;
    }

}


if ( ! function_exists('getAge'))
{
    function getAge($dob)
    {
        $age = 31536000;  //days secon 86400X365
        $birth = strtotime($dob); // Start as time
        $current = strtotime(date('Y')); // End as time
        if($current > $birth)
        {
            $finalAge = round(($current - $birth) /$age)+1;
        }
        return $finalAge;
    }
}



if( ! function_exists('trace'))
{
    function trace()
    {
        list($callee) = debug_backtrace();
        $arguments = func_get_args();
        $total_arguments = count($arguments);

        echo '<fieldset style="background: #fefefe !important; border:3px red solid; padding:5px; font-family:Courier New,Courier, monospace;font-size:12px">';
        echo '<legend style="background:lightgrey; padding:6px;">'.$callee['file'].' @ line: '.$callee['line'].'</legend><pre>';
        $i = 0;
        foreach ($arguments as $argument)
        {
            echo '<br/><strong>Debug #'.(++$i).' of '.$total_arguments.'</strong>: ';

            if ( (is_array($argument) || is_object($argument)) && count($argument))
            {
                print_r($argument);
            }
            else
            {
                var_dump($argument);
            }
        }

        echo '</pre>' . PHP_EOL;
        echo '</fieldset>' . PHP_EOL;
    
    }
}


if ( ! function_exists('char_limiter'))
{
  function char_limiter($str,$len,$suffix='...')
  {
      $str = strip_tags($str,'<br />');
      if(strlen($str)>$len)
      {
          //$str=substr($str,0,$len,'utf-8').$suffix;
           $str = mb_substr($str,0,$len,'utf-8').$suffix;
      }
      return nl2br($str);
  }
}  


if(!function_exists('get_days_count_from_dates'))
{
    function get_days_count_from_dates($start, $end)
    {
        //return $days_between = ceil(abs($end - $start) / 86400);
            
             $date1=explode(' ',$start);
             $date2=explode(' ',$end);
           
                $ts1 = strtotime($date1[0]);
                $ts2 = strtotime($date2[0]);
                $seconds_diff = $ts2 - $ts1;
                $days_between = floor($seconds_diff/3600/24);


        switch($days_between)
        {
            case -1:
            case 0: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Today';     
            break;
        
            case 1: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Yesterday';     
            break;
            
            case ($days_between > 30 && $days_between < 365): // (Ymd)->(dmY) 06 Dec, 2010 
                $months = floor($days_between/30);
                $days = ($days_between - ($months * 30));
                $month_delimeter = ($months > 1) ? 's': '';
                $days_ago = $months.' Month'.$month_delimeter.' '.$days.' Days ago';     
            break;
            case ($days_between > 365): // (Ymd)->(dmY) 06 Dec, 2010 
                $years = floor($days_between/365);
                $m_y=($days_between-($years * 365));
                $months = floor($m_y/30);
                $days = ($m_y - ($months * 30));
                $year_delimeter = ($years > 1) ? 's': '';
                $month_delimeter = ($months > 1) ? 's': '';
                $days_ago = $years.' Year'.$year_delimeter.' '.$months.' Month'.$month_delimeter.' '.$days.' Days ago';     
            break;
            
            default : // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = $days_between.' Days ago';     
            break;
    
        }
        return $days_ago;
    }
}


if ( ! function_exists('char_limiter'))
{
  function char_limiter($str,$len,$suffix='...')
  {
      $str = strip_tags($str,'<br />');
      if(strlen($str)>$len)
      {
          //$str=substr($str,0,$len,'utf-8').$suffix;
           $str = mb_substr($str,0,$len,'utf-8').$suffix;
      }
      return nl2br($str);
  }
} 

if(!function_exists('get_dates_day'))
{
   function get_dates_day($start, $end)
   {
       $days_ago='';
       //return $days_between = ceil(abs($end - $start) / 86400);
           
               $date1=explode(' ',$start);
               $date2=explode(' ',$end);
          
               $ts1 = strtotime($date1[0]);
               $ts2 = strtotime($date2[0]);

               $seconds_diff = $ts2 - $ts1;
               $days_between = floor($seconds_diff/3600/24);
      
       switch($days_between)
       {
           case -1:
           case 0: // (Ymd)->(dmY) 06 Dec, 2010 
               $days_ago = 'Today';     
           break;
       
           case 1: // (Ymd)->(dmY) 06 Dec, 2010 
               $days_ago = 'Yesterday';     
           break;
           
           default : // (Ymd)->(dmY) 06 Dec, 2010 
              $days_ago = getDateFormat($start,'15',' ');     
           break;
   
       }

                  $html='<span class="trigger today-date"><b class="date_target" >'.$days_ago.'<label for="end_date_'.$ts1.'"><span>'.getDateFormat($start,'2',' ').'</span></label></b><input type="text" id="end_date_'.$ts1.'" readonly="readonly" class="end_date" /></span>';
       return $html;
   }
}


if(!function_exists('get_dates_show'))
{
    function get_dates_show($start, $end)
    {
        //return $days_between = ceil(abs($end - $start) / 86400);
            
                $date1=explode(' ',$start);
                $date2=explode(' ',$end);
           
                $ts1 = strtotime($date1[0]);
                $ts2 = strtotime($date2[0]);

                $seconds_diff = $ts2 - $ts1;
                $days_between = floor($seconds_diff/3600/24);

        
        switch($days_between)
        {
            case -1:
            case 0: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Today';     
            break;
        
            case 1: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Yesterday';     
            break;
            
            default : // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = getDateFormat($start,'2',' ');     
            break;
    
        }
        return $days_ago;
    }
}


if(!function_exists('get_dates_day1'))
{
    function get_dates_day1($start, $end)
    {
        $days_ago='';
        //return $days_between = ceil(abs($end - $start) / 86400);
            
                $date1=explode(' ',$start);
                $date2=explode(' ',$end);
           
                $ts1 = strtotime($date1[0]);
                $ts2 = strtotime($date2[0]);

                $seconds_diff = $ts2 - $ts1;
                $days_between = floor($seconds_diff/3600/24);

        
        switch($days_between)
        {
            case -1:
            case 0: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Today';     
            break;
        
            case 1: // (Ymd)->(dmY) 06 Dec, 2010 
                $days_ago = 'Yesterday';     
            break;
            
            default : // (Ymd)->(dmY) 06 Dec, 2010 
               // $days_ago = getDateFormat($start,'2',' ');  class="date_target"   
            break;
    
        }

        $html='<span > <b>'.$days_ago.'</b> '.getDateFormat($start,'2',' ').'</span>';
        return $html;
    }
}


if(!function_exists('get_user_mention'))
{
  function get_user_mention($uid)
  {
  $ci = &get_instance();
  $profile=array();
  $photo_url = base_url().'upload/users_data';
  $profile_url = base_url().'usersinfo';
  $sql_data=$ci->db->query("select id, CONCAT_WS(' ',first_name, last_name) AS name, photo as avatar, 'contact' AS type,CONCAT_WS('/','".$profile_url."', id) AS user_link, screen_name as username, email_id from users where screen_name LIKE '".$uid."%' LIMIT 0, 25")->result_array();
  foreach ($sql_data as $key => $value) {
  
    if(trim($value['avatar'])!=''){
    $value['avatar']=$photo_url.'/'.$value['avatar'];
    }else{
      $alphabet=substr(strtolower($value['username']),0,1);
      $img=$alphabet.'.jpg';
       $value['avatar']=base_url().'assets/common/images/abcdimages/'.$img;
    }
    $profile[$key]=$value;
  }
 return json_encode($profile);
  return $profile;
  }
  
  
  
}



if(!function_exists('onclick_check'))
{
  function onclick_upvote($onclick_data)
  {
      $user_id=$onclick_data['user_id'];

      $section_title=addslashes($onclick_data['section_title']);

      $section_type=$onclick_data['section_type'];

      $section_type_action=$onclick_data['section_type_action'];

      $section_action_id=$onclick_data['section_action_id'];


      $html='';
      
      if($user_id!=''){

        if($section_type=='3'){
          $html.='onclick="increase_comment(';
          $html.="'".$section_type."','".$section_action_id."','".$user_id."'";
          $html.=')"';
          }else{
          $html.='onclick="increase(';
          $html.="'".$section_type."','".$section_action_id."','".$user_id."'";
          $html.=')"';
          }
                      
      }else{
      
          $html.='onclick="login_popup(';
          $html.="'".$section_type_action."','".$section_title."'";
          $html.=')"';

      }


  //trace($onclick_data);
  return $html;
  }
  
  
  
}

if( ! function_exists('follower_list'))
{
   
    function follower_list()
    {
      $ci = &get_instance();
      $html="";
      if($ci->session->userdata("_current_user_id")!=''){
        $id = $ci->session->userdata("_current_user_id");

        $ci->db->select('u.*');
        $ci->db->from('users_followers as uf');
        $ci->db->where('uf.follower_id', $id);
         $ci->db->where('uf.status', '1');
        $ci->db->join("users as u","u.id = uf.user_id","inner");
        $query = $ci->db->get();
        $sql_data = $query->result_array();
        foreach ($sql_data as $value) {
         $html.='<option value="'.$value['username'].'">@'.$value['screen_name'].'</option>'; 
        }

      }else{
       $html.='<option>select Follower</option>'; 
      }
       
       return $html;
    }
}




if( ! function_exists('profile_image_alphabet'))
{
   
function profile_image_alphabet($name)
{
  $ci = &get_instance();
$alphabet=substr(ucfirst($name),0,1);

switch ($alphabet) {

    case 'A':$image='a.jpg';break;
    case 'B':$image='b.jpg';break;
    case 'C':$image='c.jpg';break;
    case 'D':$image='d.jpg';break;
    case 'E':$image='e.jpg';break;
    case 'F':$image='f.jpg';break;
    case 'G':$image='g.jpg';break;
    case 'H':$image='h.jpg';break;
    case 'I':$image='i.jpg';break;
    case 'J':$image='j.jpg';break;
    case 'K':$image='k.jpg';break;
    case 'L':$image='l.jpg';break;
    case 'M':$image='m.jpg';break;
    case 'N':$image='n.jpg';break;
    case 'O':$image='o.jpg';break;
    case 'P':$image='p.jpg';break;
    case 'Q':$image='q.jpg';break;
    case 'R':$image='r.jpg';break;
    case 'S':$image='s.jpg';break;
    case 'T':$image='t.jpg';break;
    case 'U':$image='u.jpg';break;
    case 'V':$image='v.jpg';break;
    case 'W':$image='w.jpg';break;
    case 'X':$image='x.jpg';break;
    case 'Y':$image='y.jpg';break;
    case 'Z':$image='z.jpg';break;
    default: $image='user.jpg';break;
  }
  
   $photo_img='<img src="'.$ci->config->item('link_base_url').'assets/common/images/abcdimages/'.$image.'" class="avatar-css"/>';

return $photo_img;

}
}





if( ! function_exists('getMeta'))
{
   
function getMeta()
{
  $CI = &get_instance();
  $site_name = $CI->config->item('site_name');
 
//$section=array('0'=>'collection','1'=>'products','2'=>'stories');


$url_main=$CI->uri->segment(1);

switch ($url_main) {
    case 'collection':
       $section_type='0';
       $table_type='collection';
        break;
     case 'stories':
        $section_type='2';
        $table_type='story';
        break;
     case 'product':
        $section_type='1';
        $table_type='products';
        break;
    default:
        $section_type='';
        $table_type='';
} 


$url_slug=$CI->uri->segment(3);


if($section_type!='' && $url_slug!=''){



$res_row=$CI->db->query("SELECT id FROM ".$table_type." WHERE url_slug='".$url_slug."' ")->row();

$section_type_id=$res_row->id;



  $res=$CI->db->query("SELECT * FROM seo_meta WHERE section_type='".$section_type."' and section_type_id='".$section_type_id."' ")->row();
  
  if( is_object($res) )
  {
   // trace($res);
    return array(
    
      "meta_title"=>$res->meta_title,
      "meta_keyword"=>$res->meta_keyword,
      "meta_description"=>$res->meta_description
     );
                
                
  }else
  {     
        return array("meta_title"=>"curatigo ".$table_type,
        "meta_keyword"=>"curatigo ".$table_type,
         "meta_description"=>"curatigo ".$table_type,
         'dynamic_meta'=>TRUE 
      );
  }

}else{

   return array("meta_title"=>"curatigo",
        "meta_keyword"=>"curatigo",
         "meta_description"=>"curatigo",
         'dynamic_meta'=>TRUE 
      );


}








} 

}


     

    function filterCommentBeforeSave($comment, $comment_area_type='')
    {
        if( !empty($comment) )
        {
                    
            $comment = preg_replace_callback("/\@(.*?)(\s|\z)/", function($t) use ($comment)
                { 
                    return replaceMentionUserToLink($comment, $t);                 
                }, $comment );
            
            // replace #xyz to link as twitter style
            //$comment = self::filterHashToLink($comment, $comment_area_type);
        }
                
        return $comment;
    }


  function replaceMentionUserToLink($s, $t)
    {
       
        $ci = &get_instance();
        $username = $t[1];
        $nxs = strpos($s, "@$username");
        $nxs = strlen("@$username") + $nxs;
        $nxs = substr($s, $nxs, 1);
        
        $profile_url = null;
        
        if( !empty($username) ){
            
            $row = $ci->db->query("select * from users where screen_name='".$username."'")->row_array();

            if( isset($row['id']) ){
                $profile_url = base_url().'usersinfo/'.$row['id'];
            }
        }
        
        if( empty($profile_url) ){
            return "@$username".$nxs;
        }else{
            $html = "<a href='$profile_url' target='_blank' style='color:blue' >@$username</a>".$nxs;
            return $html;
        }
    }




    /* Works out the time since the entry post, takes a an argument in unix time (seconds) 
*/
function Timesince($original) {
    // array of time period chunks
    $chunks = array(
    array(60 * 60 * 24 * 365 , 'year'),
    array(60 * 60 * 24 * 30 , 'month'),
    array(60 * 60 * 24 * 7, 'week'),
    array(60 * 60 * 24 , 'day'),
    array(60 * 60 , 'hour'),
    array(60 , 'min'),
    array(1 , 'sec'),
    );
 
    $today = time(); /* Current unix time  */
    $since = $today - $original;
 
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
 
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
 
    // finding the biggest chunk (if the chunk fits, break)
    if (($count = floor($since / $seconds)) != 0) {
        break;
    }
    }
 
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
 
    if ($i + 1 < $j) {
    // now getting the second item
    $seconds2 = $chunks[$i + 1][0];
    $name2 = $chunks[$i + 1][1];
 
    // add second item if its greater than 0
    if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
        $print .= ($count2 == 1) ? ', 1 '.$name2 : " $count2 {$name2}s";
    }
    }
    return $print;
}