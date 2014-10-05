// 生成excel
$('#product-excel').bind('click',function(){
	artDialog(
	{
		title:'生成excel',
		content:'亲，真的要生成Excel吗？？？',
		yesText:'真的',
		noText:'假的'
	},
	function(){
		alert("以后估计我就真的生成了");
	},
	function(){
		alert("不玩了");
	});
});
// 一键删除
$('#all-del').bind('click',function(){
	artDialog(
		{
			title:'删除提示',
			content:'确定要删除选中项'
		},
		function(){
			alert("以后就会把选中项一键删除");
		},
		function(){
			return false;
		}
		);
})
