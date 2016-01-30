<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Store_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }

     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: list of all  Store with  Description Function
     * @created_at: Sept 09, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/


          public function index()
     {

         $this->load->model('Stores');
         $this->load->model('Users');
         $data["allStores"] = $this->Stores->get_all_stores();
         $data['users'] = $this->Users->getUsersName();
         $data['states'] = $this->Stores->getStateName();
         $data['cities'] = $this->Stores->getCityName();
         $this->template->build(config_item('current_theme_path').'stores_list', $data);
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of Stores view 
     * @created_at: Octobar 01, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/
      


         function update($id)
    {
         $this->load->model('Stores');
         $this->load->model('Users');
         $stores['single_stores'] = $this->Stores->getStoreDetailList($id);
         $stores['single_stores_business'] = $this->Stores->getStoreBusinessDetailList($id);
         $stores['document_status_pan'] = $this->Stores->getStorePanStatus($id);
         $stores['document_status_tin'] = $this->Stores->getStoreTinStatus($id);
         $stores['document_status_tan'] = $this->Stores->getStoreTanStatus($id);
         $stores['document_status_acc'] = $this->Stores->getStoreAccStatus($id);
         $stores['document_status_logo'] = $this->Stores->getStoreLogoStatus($id);
         $stores['document_status_cover'] = $this->Stores->getStoreCoverStatus($id);
         $stores ['users'] = $this->Users->get_all_users();
         $this->template->build(config_item('current_theme_path').'store_account_details' , $stores);
        
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of Stores  
     * @created_at: Octobar 01, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/



      public function update_description()
    {

           $this->load->model('Stores');
           $update_store_data = array(
            'seller_name' => $this->input->post('seller_name'),
            'user_id' => $this->input->post('users_id'),
            'id' => $this->input->post('id'),
            'address' => $this->input->post('address'), 
            'country' => $this->input->post('country'), 
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'), 
            'contact_number' => $this->input->post('number'),
            'display_name' => $this->input->post('display'), 
            'store_description' => $this->input->post('description'),
            'email' => $this->input->post('email'),
            'pincode' => $this->input->post('code'),
            'pickup_address' => $this->input->post('p_address'),
            'pickup_state' => $this->input->post('p_state'), 
            'pickup_city' => $this->input->post('p_city'),
            'pickup_c_number' => $this->input->post('p_contact'),
            'pickup_pin_code' => $this->input->post('p_code'),  
            'updated_at' => $this->input->post('date'),
            'updated_by' => 1,         
            'status' => $this->input->post('status')                        
         );
            if(!empty($this->input->post()))
           {
                      $store_id = $this->Stores->updateStore($update_store_data);

                    if(!empty($store_id))
                    {
                        //$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product Description Record is Successfully Saved!</div>');
                        echo  $store_id;
                    }
                    else
                    {
                         echo -1;
                         //$this->template->build(config_item('current_theme_path').'category_add');      
                    }
        }
        else
        {    

              echo 0; 
        }


    }






     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Store Description View Function
     * @created_at: Sept 09, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

    
         public function create() 
    {
           $this->load->model('Users');
           $data["users"] = $this->Users->get_all_users();
           $this->template->build(config_item('current_theme_path').'stores_create',$data);
        
    }

     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Store Description Function
     * @created_at: Sept 09, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/


    public function save(){

         $this->load->model('Stores');
         $new_stores_insert_data = array(
            'seller_name' => $this->input->post('name'),
            'user_id' => $this->input->post('users_id'),
            'address' => $this->input->post('address'), 
            'country' => $this->input->post('country'), 
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'), 
            'contact_number' => $this->input->post('number'),
            'display_name' => $this->input->post('display'), 
            'store_description' => $this->input->post('description'),
            'email' => $this->input->post('email'),
            'pincode' => $this->input->post('code'),
            'pickup_address' => $this->input->post('p_address'),
            'pickup_state' => $this->input->post('p_state'), 
            'pickup_city' => $this->input->post('p_city'),
            'pickup_c_number' => $this->input->post('p_contact'),
            'pickup_pin_code' => $this->input->post('p_code'),  
            'created_at' => $this->input->post('date'),
            'created_by' => 1,         
            'status' => $this->input->post('status')                       
          );
        
         if(!empty($this->input->post()))
         {
              $stores_id = $this->Stores->createStores($new_stores_insert_data);
              if(!empty($stores_id))
            {
               
                echo $stores_id;
            }
            else
            {
                echo -1;
               
            }
        }else{

            echo 0;
        }
    }





     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Store Business Description Function
     * @created_at: Sept 09, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/


    public function save_business(){

         $this->load->model('Stores');
         $new_stores_insert_business_data = array(
            'name' => $this->input->post('name'),
            'store_id' => $this->input->post('store_business_id'),
            'pan_number' => $this->input->post('pan'), 
            'tin_number' => $this->input->post('tin'), 
            'tan_number' => $this->input->post('tan'),
            'bank_name' => $this->input->post('bank_name'), 
            'account_holder_name' => $this->input->post('account_holder'),
            'account_number' => $this->input->post('account'), 
            'IFSC' => $this->input->post('code'), 
            'state' => $this->input->post('state_b'),
            'city' => $this->input->post('city_b'),
            'branch' => $this->input->post('branch'), 
            'created_at' => $this->input->post('date'),
            'created_by' => 1,         
            'status' => $this->input->post('status')                       
          );
        
         if(!empty($this->input->post()))
         {
              $stores_id = $this->Stores->createStoresBusiness($new_stores_insert_business_data);
              if(!empty($stores_id))
            {
               
                echo $stores_id;
            }
            else
            {
                echo -1;
               
            }
        }else{

            echo 0;
        }
    }




     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update Store Business Description Function
     * @created_at: Sept 09, 2015 
     * @library: 
     * @models:   Stores
     * @helpers:   
     * @3rdparty:     
     **/


    public function update_business(){

         $this->load->model('Stores');
         $new_stores_insert_business_data = array(
            'name' => $this->input->post('name'),
            'store_id' => $this->input->post('store_id'),
            'pan_number' => $this->input->post('pan'),
            'tin_number' => $this->input->post('tin'), 
            'tan_number' => $this->input->post('tan'),
            'bank_name' => $this->input->post('bank_name'), 
            'account_holder_name' => $this->input->post('account_holder'),
            'account_number' => $this->input->post('account'), 
            'IFSC' => $this->input->post('code'), 
            'state' => $this->input->post('state_b'),
            'city' => $this->input->post('city_b'),
            'branch' => $this->input->post('branch'), 
            'updated_at' => $this->input->post('date'),
            'updated_by' => 1,         
            'status' => $this->input->post('status')                       
          );
        
         if(!empty($this->input->post()))
         {
              $stores_id = $this->Stores->updateStoresBusinessUpdate($new_stores_insert_business_data);
              if(!empty($stores_id))
            {
               
                echo $stores_id;
            }
            else
            {
                echo -1;
               
            }
        }else{

            echo 0;
        }
    }



     public function update_user_strore_roles()
    {
        $this->load->model("usersStoresRoles");
        $objJsonRoles = json_decode($this->input->post('objJsonRoles'));
        $compare = $this->usersStoresRoles->compare_roles($objJsonRoles->user_id,$objJsonRoles->store_id);
        if(!empty($compare))
        {
        $this->usersStoresRoles->update_roles($objJsonRoles->role_name,$objJsonRoles->user_id,$objJsonRoles->store_id,trim($objJsonRoles->features,"##"));
        //echo 1;
         }
        else
        {
        $this->usersStoresRoles->insert_roles($objJsonRoles->role_name,$objJsonRoles->user_id,$objJsonRoles->store_id,trim($objJsonRoles->features,"##"));
        }
        exit;
        
        
    }
       public function user_strore_roles($store_id,$user_id) {
        
        $this->load->model("usersStoresRoles");
        $data["allRolesList"] = $this->usersStoresRoles->get_users_stores_roles_by_role_id($store_id,$user_id);
        if(isset($data["allRolesList"][0])){
            echo json_encode($data["allRolesList"][0]);
        }else{
            echo -1;
        }
        exit;
    }
       public function roles_features_list() 
    {
        $this->load->model("rolesFeatures");
        $data["allRolesList"] = $this->rolesFeatures->get_all_features_list();
            
        $finalData[1]['id']         = 1;
	    $finalData[1]['label']      = 'ALL';
        $finalData[1]['inode']      = 'true';
        $finalData[1]['open']       = 'true';
        $finalData[1]['my-hash']    = 'hash-0';
        $finalData[1]['my-url']     = '';
        $finalData[1]['p_id']       = '0';
                     
        foreach($data["allRolesList"] as $key => $rolesList){
             $idx = $rolesList['id'];
             if($rolesList['rfm_parent_id'] == 1){ 
                 $finalData[1]['branch'][$idx]['id']      = $idx;
                 $finalData[1]['branch'][$idx]['label']   = $rolesList['name'];
                 $finalData[1]['branch'][$idx]['inode']   = 'false';
                 $finalData[1]['branch'][$idx]['open']    = 'false';
                 $finalData[1]['branch'][$idx]['my-hash'] = 'hash-'.$idx;
                 $finalData[1]['branch'][$idx]['my-url']  = '';
                 $finalData[1]['branch'][$idx]['p_id']    = $rolesList['rfm_parent_id'];
             }else{
                 if(isset($finalData[1]['branch'])){
                    foreach ($finalData[1]['branch'] as $keyLevel2 => $branchLevel2){
                        if($keyLevel2 == $rolesList['rfm_parent_id']){
                            $finalData[1]['branch'][$keyLevel2]['inode']   = 'true';
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['id']      = $idx;
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['label']   = $rolesList['name'];
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['inode']   = 'false';
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['open']    = 'false';
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['my-hash'] = 'hash-'.$idx;
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['my-url']  = '';
                            $finalData[1]['branch'][$keyLevel2]['branch'][$idx]['p_id']    = $rolesList['rfm_parent_id'];
                        }else{
                             if(isset($finalData[1]['branch'])){
                                foreach ($finalData[1]['branch'] as $keyLevel2 => $branchLevel2){
                                    if(isset($branchLevel2["branch"])){
                                        foreach ($branchLevel2["branch"] as $keyLevel3 => $branchLevel3){
                                            if($keyLevel3 == $rolesList['rfm_parent_id']){
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['id']      = $idx;
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['label']   = $rolesList['name'];
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['inode']   = 'false';
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['open']    = 'false';
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['my-hash'] = 'hash-'.$idx;
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['my-url']  = '';
                                                $finalData[1]['branch'][$keyLevel2]['branch'][$keyLevel3]['branch'][$idx]['p_id']    = $rolesList['rfm_parent_id'];
                                            }
                                        }
                                    }        
                                }
                             }
                        
                        }
                    }
                }           
             }
         }
        
        $jsonData = '[{';
        foreach($finalData[1] as $keyLevel1 => $valueLevel1){
            if($keyLevel1 != "branch"){
                $jsonData .= '"'.$keyLevel1.'":"'.$valueLevel1.'",';
            }elseif($finalData[1]["inode"] == "true"){
                $jsonData .= '"'.$keyLevel1.'":[';
                foreach($finalData[1]["branch"] as $keyLevel2 => $valueLevel2){
                    if($finalData[1]["branch"][$keyLevel2] != "branch"){
                        $jsonData .= '{"id":"'.$finalData[1]["branch"][$keyLevel2]["id"].'",';
                        $jsonData .= '"label":"'.$finalData[1]["branch"][$keyLevel2]["label"].'",';
                        $jsonData .= '"open":"'.$finalData[1]["branch"][$keyLevel2]["open"].'",';
                        $jsonData .= '"my-hash":"'.$finalData[1]["branch"][$keyLevel2]["my-hash"].'",';
                        $jsonData .= '"my-url":"'.$finalData[1]["branch"][$keyLevel2]["my-url"].'",';
                        $jsonData .= '"p_id":"'.$finalData[1]["branch"][$keyLevel2]["p_id"].'",';
                        if($finalData[1]["branch"][$keyLevel2]["inode"] == "true"){
                            $jsonData .= '"branch":[';
                            foreach($finalData[1]["branch"][$keyLevel2]["branch"] as $keyLevel3 => $valueLevel3){
                                $jsonData .= '{"id":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["id"].'",';
                                $jsonData .= '"label":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["label"].'",';
                                $jsonData .= '"open":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["open"].'",';
                                $jsonData .= '"my-hash":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["my-hash"].'",';
                                $jsonData .= '"my-url":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["my-url"].'",';
                                $jsonData .= '"p_id":"'.$finalData[1]["branch"][$keyLevel2]["branch"][$keyLevel3]["p_id"].'"},';
                            }                   
                        }
                        $trimExtraCommas = trim($jsonData,",");
                        $jsonData = $trimExtraCommas. "]},";
                    }                    
                }
            }
        }
        $trimExtraCommas = trim($jsonData,",");
        $jsonData = $trimExtraCommas. "]}]";
        echo $jsonData;
        exit;
    }






    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of stores
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/

    public function delete($id)
{
  $this->load->model('Stores');
   $this->Stores->deleteStores($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Store Record is Successfully Deleted!</div>');
   redirect('store/index');  
}

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of stores
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   stores
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Stores');
   $this->Stores->unDeleteStores($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Store Record is Successfully UnDeleted!</div>');
   redirect('store/index'); 
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of stores
     * @created_at: Sept 10, 2015 
     * @library:  
     * @models:   stores
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Stores');
   $this->Stores->statusStores($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Store is Successfully Activated!</div>');
   redirect('store/index');   
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of stores
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Store
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
    $this->load->model('Stores');
    $this->Stores->statusStoresIn($id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Store is Successfully Deactivated!</div>');
    redirect('store/index');   
}



       public function do_upload_document_pan()
    {
        $upload_path_url = $this->config->item('base_path') . 'upload/store_profile_document/';

        $config = array(
            'upload_path'   => $upload_path_url,
            'allowed_types' => 'jpg|gif|png|pdf|doc|docx',
            'overwrite'     => 1,                       
        );
         
        $this->load->library('upload', $config);
        $stores_id = $this->input->post('store_id');
        $name = $this->input->post('document_name');

        $images =  time();
        $path = '#storeAccount_document';
/*
echo "<pre>";
print_r($_FILES['files']['name']);
exit;*/
        $_FILES['files']['name']= $_FILES['files']['name'][0];
        $_FILES['files']['type']= $_FILES['files']['type'][0];
        $_FILES['files']['tmp_name']=  $_FILES['files']['tmp_name'][0];
        $_FILES['files']['error']= $_FILES['files']['error'][0];
        $_FILES['files']['size']= $_FILES['files']['size'][0];
             $image = $_FILES['files']['name'][0];   
            
            $fileName = "store_document_pan" .'_'. $images;

            //$images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

              if ($this->upload->do_upload('files'))
              {
                 $file_data['upload_data'] = $this->upload->data();
                 
                  $this->load->model('Stores');
            $update_pan = array(
            'store_id' => $stores_id,
            'document_name' => $name,
            'document_status' => 2,
            'name' => $file_data['upload_data']['orig_name'],
            'type' => $file_data['upload_data']['file_ext'],
            'size' => $file_data['upload_data']['file_size']                    
             );
                  $store_id = $this->Stores->updatePan($update_pan); 

                  redirect('store/update/'.$stores_id.$path);
              } 
               else
              {
                print_r($this->upload->display_errors());
                echo "not uploaded";
                //return false;
              }
        
    }




}
