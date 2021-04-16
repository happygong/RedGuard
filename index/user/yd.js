$(window).on('load',function(){
	var preseOpt = {
		
		tourTitle:'新手引导',
		
		overlayColor:'#111626',
		//loc:'demos/presentation.html',
		
		tourMap: {
			open:true
		},
		intro:{
			cover:'../assets/images/logo/logo.png'
		},
		lang:{
			introTitle:'欢迎使用乐公短链引导系统！',
			introContent:'很高兴遇见您呢~'
		},
    steps: [
        {
            'title': '认识控制台',
            'content': '接下来为您介绍一些主页的功能',
            'target': '',
             'timer':5000
        },
        {
			title:'统计一览',			
			content:'在这里您可以方便的看到您的余额，点击次数统计，链接生成统计，等等',				
			target:'el-1',
			'timer':5000
		},
		{
			title:'绑定生成',			
			content:'在这里您生成链接您可以对其进行绑定统计，绑定后的链接会直接到您的账户下',	
			target:'el-2',
			'timer':5000
		},
			{
			title:'系统公告',			
			content:'在这里您查看最新的优惠信息，公告通知等等',				
			target:'el-3',
			timer:5000
		},
		{
			title:'用户菜单',			
			content:'各种功能任您选择，愿您能好好利用哦~',				
			target:'el-4',
			timer:5000
		},
		{
			title:'超级统计',			
			content:'点击这里查看短链统计详情！非常精确的那种哦~',				
			target:'el-5',
			timer:5000
		},	
		{
			title:'开发者工具',			
			content:'更多接口等您使用哦~',				
			target:'el-7',
			timer:5000
		},
			{
			title:'工单投诉',			
			content:'还有问题在这里与我们详谈吧！',				
			target:'el-6',
			timer:5000
		},
		
		{
            'title': '功能介绍完毕',
            'content': '请尽情享受短链带来的方便吧~by乐公',
            'target': '',
            timer:5000
        }

    ],
		debug:false
	}
	function myTour(){
		iGuider(preseOpt);
	}
	
	$('.start-tour').on('click',function(){
		myTour();
		return false;
	});
	iGuider('button',preseOpt);
	myTour();
	
	$('.custom-el-drag').draggable({
		drag: function( event, ui ) {
			iGuider('update');	
		}	
	});

	$('.add-new-item-1').on('click',function(){
		if(!$('.add-new-item-2').length){
			setTimeout(function(){
				$('.add-new-item-1').after('<span class="custom-element add-new-item-2"> New element </span>');
			},1000);
		}
	});
})