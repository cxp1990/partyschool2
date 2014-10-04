$('#addTimu').bind('click',function(){
	var addTmContent = '<form><label for="timu">题目：</label><input id="timu" type="text" class="form-control" placeholder="请输入题目" style="width:480px;"><label for="">选项：</label><input id="ansA" type="text" class="form-control" placeholder="请输入选项A"><br><input id="ansB" type="text" class="form-control" placeholder="请输入选项B"><br><input id="ansC" type="text" class="form-control" placeholder="请输入选项C"><br><input id="ansD" type="text" class="form-control" placeholder="请输入选项D"><br><label for="timu">答案：</label><input id="rightAns" type="text" class="form-control" placeholder="如：答案：（A）"></form>';
	artDialog(
	{
		id:'question-form',
		title:'添加题目',
		content:addTmContent,
		yesText:'添加',
	},
	function(){
		var timu = $('#timu').val(),
			ansA = $('#ansA').val(),
			ansB = $('#ansB').val(),
			ansC = $('#ansC').val(),
			ansD = $('#ansD').val(),
			rightAns = $('#rightAns').val();
		if (timu=="" || ansA == "" || ansB == "" || ansC == "" || ansD =="" || rightAns =="") {
			alert('题目相关数据都不能为空');
			return false;
		}else{
			$.ajax({
				url:'/admin/xx',
				type:'POST',
				data:{
					timu:timu,
					ansA:ansA,
					ansB:ansB,
					ansC:ansC,
					ansD:ansD,
					rightAns:rightAns
				},
				success:function(msg){
					//alert(msg);
					if(msg>0)alert('添加题目成功');

					//console.log(msg);
				}
			});
		}

		
	},
	function(){
		return false;
	}
	);
});