var app = new Vue({ 
    el: '#app',
    data: {
        head:'Newsss',
        desc:'',
        image:'',
        date:'00-00-0000',
        eyes:0,
        like:1,
        like_count:0,
        news_id:-1,

        comment_name:'',
        comment_text:'',
        list_comments:{},
        top_news:{}
    },
    created: function() {
        this.news_id = $('input[name="news_id"]').val()
        // console.log(this.$route);
    	$this = this;
    	$.ajax({
    		type:'POST',
    		url:'/back/index',
    		data:{
    			name:"GET_NEWS_ONE",
	        	param:{
                    NEWS_ID: $this.news_id,
                    USER:window.SESSION_ID
                }
    		}
    	}).done(function(data){
			console.log(data)
			
            if(data.status == "success"){
                $this.head = data.news[0].header;
                $this.desc = data.news[0].description;
                $this.image = data.news[0].img;
                $this.eyes = data.news[0].views;
                $this.date = moment.unix(data.news[0].time).format('DD-MM-YYYY HH:mm');
                
                $this.like_count = data.like_count;
                $this.like = data.like_status != 0 ? 1 : 0;
           
                $this.list_comments = data.list_comments;
                $this.top_news = data.top_news;
            }

    	});

        
    },
    methods: {
        likeclick:function(event){
            var like = parseInt(event.target.getAttribute('data-like'));
            console.log(like);

            like = like == 0 ? 1 : 0; 

            $this = this;
            $.ajax({
                type:'POST',
                url:'/back/index',
                data:{
                    name:"UPDATE_LIKE_NEWS",
                    param:{
                        NEWS_ID: $this.news_id,
                        LIKE:like,
                        USER:window.SESSION_ID
                    }
                }
            }).done(function(data){
                console.log(data)

                if(data.status == "success"){
                    $this.like_count = data.like_count;
                    $this.like = data.like_status != 0 ? 1 : 0;
                }

            });

        },
        sendComment:function(event){
            $this = this;

             $.ajax({
                type:'POST',
                url:'/back/index',
                data:{
                    name:"CREATE_COMMENT",
                    param:{
                        NEWS_ID: $this.news_id,
                        TEXT: $this.comment_text,
                        NAME: $this.comment_name,
                        USER:window.SESSION_ID,
                    }
                }
            }).done(function(data){
                console.log(data)

                if(data.status == "success"){
                    $this.comment_text = '';
                    $this.comment_name = '';

                    $this.list_comments = data.list_comments;
                }

            });
        },

        likeComment:function(){

            var LIKE = parseInt(event.target.getAttribute('data-like'));
            var COMMENT_ID = parseInt(event.target.getAttribute('data-comment-id'));

            LIKE = LIKE == 0 ? 1 : 0; 

            $this = this;
            $.ajax({
                type:'POST',
                url:'/back/index',
                data:{
                    name:"UPDATE_LIKE_COMMENT",
                    param:{
                        LIKE:LIKE,
                        USER:window.SESSION_ID,
                        COMMENT_ID: COMMENT_ID,
                        NEWS_ID: $this.news_id,
                    }
                }
            }).done(function(data){
                console.log(data)

                if(data.status == "success"){
                    $this.list_comments = data.list_comments;
                }

            });
            
        },
        deleteComment:function(event){
            $this = this;

            var COMMENT_ID = parseInt(event.target.getAttribute('data-comment-id'));

             $.ajax({
                type:'POST',
                url:'/back/index',
                data:{
                    name:"DELETE_COMMENT",
                    param:{
                        COMMENT_ID:COMMENT_ID,
                        NEWS_ID: $this.news_id,
                        USER:window.SESSION_ID
                    }
                }
            }).done(function(data){
                console.log(data)

                if(data.status == "success"){
                    $this.list_comments = data.list_comments;
                }

            });
        }
    }
});