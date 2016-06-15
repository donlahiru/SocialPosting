// JavaScript Document
$(document).ready(function(){
	
	try
	{
		$("#frmSocialPost").validationEngine();
	}
	catch(err)
	{
		
	}
	
	$('#frmSocialPost #btnPost').on('click',submitPost);
});

function submitPost()
{
	var data 		 = "requestType=postData";
	var message 	 = $.trim($('#frmSocialPost #txtPost').val());
	var arrHeader 	 = "{"
	arrHeader 		+= '"message":'+URLEncode_json(message)+'';
	arrHeader 		+= "}";
	
	var arrHeader	 = arrHeader;
	var arrDetails		= "";				
	if(!$('#frmSocialPost').validationEngine('validate'))
	{
		return;
	}
	
	$('#frmSocialPost .checkbox').each(function(index, element) {
		
		if($(this).is(':checked'))
		{
			arrDetails += "{";
			arrDetails += '"name":"'+ $(this).val() +'",' ;
			arrDetails += '"class":"'+ $(this).prop('id') +'"' ;
			arrDetails +=  '},';
		}
	});
	
	arrDetails 		= arrDetails.substr(0,arrDetails.length-1);
	var arrDetails	= '['+arrDetails+']';
	data	   	   += "&arrHeader="+arrHeader+"&arrDetails="+arrDetails;
	
	var url = "src/social_post_db.php";
		$.ajax({
				url:url,
				dataType:'json',
				type:'post',
				data:data,
				async:false,
				success:function(json){
					$('#frmSocialPost #btnPost').validationEngine('showPrompt', json.msg,json.type /*'pass'*/);
					if(json.type=='pass')
					{
						var t = setTimeout("alertx()",3000);
						return;
					}
				}	
		});
}
function alertx()
{
	$('#frmSocialPost #btnPost').validationEngine('hide')	;
}
function URLEncode_json(url)
{
	
	url = JSON.stringify(url);
	url = url.replace(/#/gi,"%23");
	url = url.replace(/&/gi,"%26");
	return url;
}