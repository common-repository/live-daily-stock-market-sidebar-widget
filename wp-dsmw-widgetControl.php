<script type="text/javascript">
function enableDisable(box_checked)
{
	var disable = !box_checked.checked;
	var argument_length = arguments.length;
	var obj, startIndex = 1;
	var frm = box_checked.form;
	for (var i=startIndex;i<argument_length;i++)
	{
		obj = frm.elements[arguments[i]];
		if (typeof obj=="object")
			{
			if (document.layers) 
				{
				if (disable)
					{
					obj.onfocus=new Function("this.blur()");
					if (obj.type=="text") obj.onchange=new Function("this.value=this.defaultValue");
					}
				else 
					{
					obj.onfocus=new Function("return");
					if (obj.type=="text") obj.onchange=new Function("return");
					}
				}
			else obj.disabled=disable;	
			}
	}
}

</script>
<p>

<label for="dsmw_title">Title for Daily Stock Market Sidebar Widget:
<input  name="dsmw_title" type="text" value="<?php echo $dsmw_title; ?>" /></label>
<input type="hidden" id="dsmw_submit" name="dsmw_submit" value="1" />
</p>
<p class="dsmw_box1">
Your Daily Stock Market Sidebar Widget will load without default names in the boxes.
However, if you would like to input stock market's name that will display when your widget loads, please check this box, which also means that you agree that
the backlinks are allowed on your site.

<input type="checkbox" id="dsmw_enable_checkbox" name="dsmw_enable_checkbox" value="<?php echo $dsmw_enable_checkbox; ?>" onclick="enableDisable(this,'dsmw_first_name','dsmw_second_name');" />

<input type="hidden" id="dsmw_submit" name=" dsmw_submit" value="4" />
<br />
</p>
<p>

<label for="dsmw_first_name">Enter stock name you want to compare:

<input  id="dsmw_first_name" name="dsmw_first_name" disabled="disabled" type="text" value="<?php 
if(empty($options['dsmw_first_name'])){
   echo $dsmw_first_name = "DOW";
}else echo $dsmw_first_name;
?>" /></label>			

<input type="hidden" id="dsmw_submit" name="dsmw_submit" value="2" />

</p>
<p>
<label for="dsmw_second_name">Enter stock name you want to compare:
<input id="dsmw_second_name" name="dsmw_second_name" disabled="disabled" type="text" value="<?php 
  if(empty($options['dsmw_second_name'])){
   echo $dsmw_first_name = ".INX";
}else echo $dsmw_second_name;

?>" /></label>			

<input type="hidden" id="dsmw_submit" name="dsmw_submit" value="3" />

</p>