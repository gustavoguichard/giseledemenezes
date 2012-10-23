/*
Name: Ultimate Taxonomy Manager
URI: http://taxonomymanager.wordpress.com/
*/
jQuery(document).ready(function() {
    var xydac_field = jQuery("a[id^='xydac_add_image']").attr('name');
	/* jQuery("form[id='addtag']").submit(function() { 
		if("" ==jQuery("form[id='text'][name='"+xydac_field+"']").attr('value'))
			jQuery("img[id=" +xydac_field+ "]").attr('src','');
		}); */
	//Click on Add image 
    jQuery("a[id^='xydac_add_image']").click(function() {
     tb_show('Add an Image', 'media-upload.php?type=image&amp;TB_iframe=true');
     return false;
    });
	//Click on Remove Image
    jQuery("a[id^='xydac_remove_image']").click(function() {
     jQuery("img[id=" +xydac_field+ "]").attr('src','');
	 jQuery("input[type='text'][name='"+xydac_field+"']").attr('value','');
     return false;
    });
	
    window.send_to_editor = function(html) {
     var imgurl = jQuery('img',html).attr('src');
     jQuery("img[id=" +xydac_field+ "]").attr('src',imgurl);
     jQuery("input[type='text'][name='"+xydac_field+"']").attr('value',imgurl);
     jQuery("p.description").attr('value',html);
	 
     tb_remove();
    }
    //Taxonomy Page Script
    
	
	jQuery("div#xydac_panel_notice").hide();
    jQuery("div[id^=xydac_panel]").hide();
    jQuery("select#xy_tax\\[args\\]\\[rewrite\\]\\[val\\]").change(function(){
		if(jQuery(this).val() == 'false')
        {jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[slug\\]").hide();
        jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[with_front\\]").hide();}
		else
		{jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[slug\\]").show();
        jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[with_front\\]").show();}
		
    });
    jQuery("input#xydac_temp").click(function(){
        jQuery("div[id^=xydac_panel]").toggle("slow");
        jQuery("div#xydac_panel_notice").toggle();
        jQuery("input#xydac_temp").toggle();
		if(jQuery("select#xy_tax\\[args\\]\\[rewrite\\]\\[val\\]").val() == 'false')
        {jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[slug\\]").hide();
        jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[with_front\\]").hide();}
		else
		{jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[slug\\]").show();
        jQuery("div#xydac_panel_xy_tax\\[args\\]\\[rewrite\\]\\[with_front\\]").show();}
        return false;
    });
});