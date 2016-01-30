<select name="select" onChange="getcitydetails(this.value)">
<option value="" selected="selected" >Select City</option>
<?php foreach($city as $ct): ?>
<option value="<?php echo $ct->city_id; ?>"><?php echo $ct->city_name; ?></option>
<?php endforeach; ?> 
</select>