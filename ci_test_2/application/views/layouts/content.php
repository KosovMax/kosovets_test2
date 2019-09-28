<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <style type="text/css">
    	/* Move down content because we have a fixed navbar that is 3.5rem tall */
		body {
		  padding-top: 3.5rem;
		}
    </style>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript">
      window.SESSION_ID = 0;

      if(localStorage.SESSION_ID){
        window.SESSION_ID = localStorage.getItem('SESSION_ID');
      }else{
        window.SESSION_ID = getRndInteger(10000, 99999);
        localStorage.setItem('SESSION_ID', window.SESSION_ID);
      }

      console.log('SESSION_ID', window.SESSION_ID)

      function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min + 1) ) + min;
      }

    </script>

  </head>

  <body>

    <div id="preloader" class="preloader" style="display: none;"><div><div></div><div></div></div></div>

    <? $this->load->view('layouts/header'); ?>

    <main role="main" id="app">

      <?= $content ?>

    </main>

    <?= $script ?>
    <?= $script_two ?>

    <? $this->load->view('layouts/footer'); ?> 

</body></html>