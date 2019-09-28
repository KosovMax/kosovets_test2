var app = new Vue({ 
    el: '#app',
    data: {
        message: '',
        posts:{}
    },
    created: function() {
    	$this = this;
    	$.ajax({
    		type:'POST',
    		url:'/back/index',
    		data:{
    			name:"GET_NEWS_LIST",
	        	param:{}
    		}
    	}).done(function(data){
			console.log(data)
			if(data.status == "success"){
				$this.posts = data.news
			}
    	});
    }
});