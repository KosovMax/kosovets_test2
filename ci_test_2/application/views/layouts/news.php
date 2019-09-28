<?php $content = <<<EOD

	<div class="container">
		<div class="row">
		    <div class="col">
		    </div>
		    <div class="col-12">
		    	<input type="hidden" name="news_id" value="$news_id"  />

		    	<h1>{{ head }}</h1>
		    	<div class="image_news"  :style="{'background-image': 'url(' + image + ')'}"></div>
		    	<p v-html="desc"></p>
		    	<p> 
		    	<div class="bottom_info_news">
		    		<span>Опубликовано {{date}}</span>
		    		<div><i class="fa fa-thumbs-up" :data-like="like" v-on:click="likeclick"></i><span>{{like_count}}</span></div> 
		    		<div><i class="fa fa-eye"></i><span>{{eyes}}</span></div> 
		    	</div>
		    	</p>

		    	<hr />	
		    	<h4>Коментарий</h4>
		    	<ul class="list_comments">
		    		<li v-for="lc in list_comments">
		    			<h5>{{lc.name}}</h5>
		    			<p v-html="lc.text" style="margin-bottom: 0;"></p>
		    			<div class="bottom_info_news">
				    		<div><i class="fa fa-thumbs-up" :data-like="lc.like_status != 0 ? 1 : 0" v-on:click="likeComment" :data-comment-id="lc.id"></i><span>{{lc.like_count}}</span></div> 
				    		<div><i class="fa fa-trash" v-on:click="deleteComment" :data-comment-id="lc.id"></i></div> 
				    	</div>
		    		</li>
		    	</ul>
		    	<div>
		    	<div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" v-bind:class="error_comment_name" aria-describedby="emailHelp" placeholder="Name" v-model="comment_name" v-on:keyup="inputName">
				    <small class="form-text text_error">{{error_in_comment_name}}</small>
				  </div>
		    	<div class="form-group">
				    <textarea class="form-control" v-bind:class="error_comment_text" rows="5" v-model="comment_text" v-on:keyup="inputText"></textarea>
				    <small class="form-text text_error">{{error_in_comment_text}}</small>
				  </div>
		    	<div style="text-align: center;"><button type="button" class="btn btn-primary" v-on:click="sendComment" >Отправить</button></div>
		    	</div>

		    	<hr />	
		    	<h4>Популярные новости</h4>
		    	<div class="container">
		          <div class="row">
		            <div class="col-md-4" v-for="tn in top_news">
		              <div class="card mb-4 box-shadow">
		                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" :src="tn.img" data-holder-rendered="true">
		                <div class="card-body">
		                	<h5>{{tn.header}}</h5>
		                  <p class="card-text max_text" v-html="tn.short_description" ></p>
		                	<div class="d-flex justify-content-end align-items-end">
		                    <div class="btn-group">
		                      <a type="button" class="btn btn-sm btn-outline-secondary" v-bind:href="'/news/index/' + tn.id">Link</a>
		                    </div>
		                  </div>
		                </div>
		                
		              </div>
		            </div>
		          </div>
		        </div>

		    </div>
		    <div class="col">
		    </div>
		</div>
	</div>

EOD;

$script = '<script type="text/javascript" src="/js/news.js"></script>';

?>

<? $this->load->view('layouts/content', ['content'=>$content,'script'=>$script]); ?> 