<select name="collection_id" id="collection_id" >
<option value="" selected="selected" >--Select Collection--</option>
<?php foreach($collection as $collect): ?>
<option value="<?php echo $collect->id; ?>"><?php echo $collect->name; ?></option>
<?php endforeach; ?> 
</select> 