
<?php $content = <<<EOD

	<div class="container">
		<div class="row">
		    <div class="col">
		    </div>
		    <div class="col-12">
		    	<h1>News</h1>
		    	<ul class="news_list">
		    		<li v-for="post in posts" >
		    			<h3>{{ post.header }}</h3>
		    			<div class="image_news_list"  :style="{'background-image': 'url(' + post.img + ')'}"></div>
		    			<p v-html="post.description"></p>
		    			<a class="btn btn-primary"  v-bind:href="'/news/index/' + post.id" role="button">Link</a>
		    		</li>
		    	</ul>
		    </div>
		    <div class="col">
		    </div>
		</div>
	</div>

EOD;

$script = '<script type="text/javascript" src="/js/main.js"></script>';

?>

<? $this->load->view('layouts/content', ['content'=>$content,'script'=>$script]); ?> 
