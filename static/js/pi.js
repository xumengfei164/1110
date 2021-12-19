function delCon(){
	var de = document.getElementsByClassName('delall');
    var sub = false;
	var flag=false;
	for(i=0;i<de.length;i++){
		if(de[i].checked){
			flag=true;
		}
	}
	if(flag){
		sub = confirm('确定要将选中数据删除吗？')?true:false;
	}
    if(sub) {
        var fm = document.getElementsByTagName('form')[1];
        fm.submit();
    }
}

function selAll()
{   var de = document.getElementsByClassName('delall');
	for(i=0;i<de.length;i++)
	{
		if(!de[i].checked)
		{
			de[i].checked=true;
		}
	}
}
function noAll()
{	
	var de = document.getElementsByClassName('delall');
	for(i=0;i<de.length;i++)
	{
		if(de[i].checked)
		{
			de[i].checked=false;
		}
	}
}

window.onload= function() {
    var con = document.getElementsByClassName('confirm');
    var fm = document.getElementsByTagName('form')[0];
	var but = document.getElementById('butt');


    but.onclick = function () {
        fm.submit();
    }
    for(var i = 0;i < con.length; i++) {
        con[i].onclick = function () {
            if(confirm('确认删除？')) {
                return true;
            } else {
                return false;
            }
        }
    }
   
}