
$(document).ready(function(){

function show()
{
	var url= "http://localhost/practice/codeigniter/API/api/student/index_get";
	$.ajax({
		url :url,
		type:'GET',
		success:function(rsp)
		{
			// console.log(rsp.data.length);
			var html="";
			var i;
			for(i=0;i<rsp.data.length;i++)
			{
				var img="<img src='http://localhost/practice/codeigniter/API/img/"+rsp.data[i].pic+"' style='width:80px; height:80px;'>";
				//html+="<tr><td>"+rsp.data[i].name+"</td><td>"+rsp.data[i].email+"</td><td>"+rsp.data[i].password+"</td><td>"+img+"</td></tr>";
				html+="<tr>"+
						"<td>"+rsp.data[i].id+"</td>"+
						"<td>"+rsp.data[i].name+"</td>"+
						"<td>"+rsp.data[i].email+"</td>"+
						"<td>"+rsp.data[i].password+"</td>"+
						"<td>"+img+"</td>"+
						"<td><button class='btn btn-success' id='editbtn' data-eid='"+rsp.data[i].id+"'>Edit</button></td>"+
						"<td><button class='btn btn-info' id='deletebtn' data-did='"+rsp.data[i].id+"'>Delete</button></td>"+
					   "</tr>";
			}
			$("#alldata").html(html);


		}
	});

}
show();

//for edit form
$(document).on("click","#editbtn",function(){
	var id=$(this).attr("data-eid");
	var url= "http://localhost/practice/codeigniter/API/api/student/index_get?id="+id;
	$("#modal").show();
	$.ajax({
		url : url,
		type: 'GET',
		success:function(rsp)
		{
			$("#id").val(rsp.data[0].id);
			$("#name").val(rsp.data[0].name);
			$("#email").val(rsp.data[0].email);
			$("#password").val(rsp.data[0].password);
			$("#mobile").val(rsp.data[0].mobile);
		}
	});
});	

//for update
$("#update").click(function(e){
	e.preventDefault();
	var url= "http://localhost/practice/codeigniter/API/api/student/index_get";
	var id=$("#id").val();
	var name=$("#name").val();
	var email=$("#email").val();
	var password=$("#password").val();
	var mobile=$("#mobile").val();
	var obj={id:id,name:name,email:email,password:password,mobile:mobile};
	var json_edit=JSON.stringify(obj);
	$.ajax({
		url: url,
		type:'PUT',
		data:json_edit,
		success:function(rsp)
		{
			$("#modal").hide();
			show();
		}
	});
});

});
// http://localhost/practice/codeigniter/API/api/student/index_get