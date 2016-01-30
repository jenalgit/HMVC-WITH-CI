$(document).ready(function() 
  {
        var objRolesTree = [];
        $('#roles_tree').aciTree({
            ajax: {
                    dataType: "json",
                    //url: 'assets/json/tree_sample.json'
                     url: BASE_URL+"store/roles_features_list"
                },  
            itemHook: function(parent, item, itemData, level) {
                objRolesTree.push(itemData);
                itemData.label = '<div style="float:right;font-size:15px;"> '+ 
                                 itemData.label + 
                                 '</div>&nbsp;&nbsp;<input type="checkbox" onclick="setVisibility(this.id,this.checked);" id="role_feature_'+itemData.id+'" style="display:none;" >';
                this.setLabel(item, {
                           label:  itemData.label 
                });
              
                //setTimeout("$('input[type=checkbox]').onoff()",300);      
            }
        });
        
        
        setVisibility = function (id,checked){
           
           objRolesTree.forEach(function (item, index, array) {    
               if('role_feature_'+item.id == id){
                    if(!((typeof item.branch === 'undefined') || (typeof item.branch === undefined))){
                        item.branch.forEach(function (itemBranch, indexBranch, arrayBranch) {
                            $('#role_feature_'+itemBranch.id).prop('checked', checked);
                            if(!((typeof itemBranch.branch === 'undefined') || (typeof itemBranch.branch === undefined))){
                                itemBranch.branch.forEach(function (itemSubBranch, indexSubBranch, arraySubBranch) {
                                    $('#role_feature_'+itemSubBranch.id).prop('checked', checked);
                                });
                            }
                        });
                    }
               
               }              
            });
            
        }
        
        $("#frmUsersStroresRoles").submit(function (e) {
            e.preventDefault(); // this will prevent from submitting the form.
            objJsonRoles={};
            objJsonRoles.role_name = $('#user_role').val();
            objJsonRoles.user_id   = $('#user_id').val();
            objJsonRoles.store_id  = $('#select_store').val();
            
            strFeatures = '';
            $('input[type=checkbox]').each(function () {
                rows = this.id.split('role_feature_');
                if(!isNaN(rows[1])){
                    strFeatures += rows[1]+'#';
                    if (this.checked) {
                        strFeatures += 1;  
                    }else{
                        strFeatures += 0;
                    }
                    strFeatures += '##';
                }
                    
            });
            objJsonRoles.features = strFeatures;
             $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: { "objJsonRoles": JSON.stringify(objJsonRoles) },
                   // contentType: "application/json; charset=utf-8",
                    url: BASE_URL + "store/update_user_strore_roles/"
                }).done(function(data)
                 {
                    if(data != 1){
                        alert("There is an issue on updating user store roles, please try again");    
                    }else{
                        alert("Roles updated successfuly!");
                    }
                }) 
            
        });
         

        $('#select_store').on ('change', function(){
           var store_id = $('#select_store').val();
           var user_id  = $('#user_id').val();
           if(store_id == -1){
                alert("Please select the store to retrive roles");
           }
            $('#roles_tree').show();
             $('input[type=checkbox]').onoff();
            
            $.ajax({
                    dataType: "json",
                    url: BASE_URL + "store/user_strore_roles/"+store_id+"/"+user_id+"/"
                }).done(function(data) {
                    if(data==-1)
                    {
                        alert("There is an issue on fecthing roles, please try again or Create a new roles for users"); 
                       $('#user_role').val("");
                    }else{
                       $('#user_role').val(data.name);       
                       if(data.features=='all'){
                           $('input[type=checkbox]').prop('checked', true);
                       }else{   
                            $('input[type=checkbox]').prop('checked', true);
                            rows = data.features.split('##');
                            jQuery.each(rows , function(index, value){
                                columns = value.split('#');
                                roleStatus = true;
                                if(columns[1]==0){
                                    roleStatus = false;
                                }
                                $('#role_feature_'+columns[0]).prop('checked', roleStatus);                                  
                            });
                            
                       }
                    }
                })    
        });
        /**
        * End
        * @For Storewise Roles & Permissions - admin/user/stores_roles/1
        * Created on Aug 25, 2015 by Deepak Patil<deepak.patil@relesol.com>
        * Modified on Sep 29, 2015 by Jasdeep Singh <jasdeep.singh@relesol.com>
        *
        **/
});