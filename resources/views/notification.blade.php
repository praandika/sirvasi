<!DOCTYPE html>
<head>
  <title>Laravel 8 Pusher Notification Example Tutorial - XpertPhp</title>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  
</head>
<body>
<h1>Laravel 8 Pusher Notification Example Tutorial</h1>
<div class="notif"></div>

<script>
 
   var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
      cluster: '{{env("PUSHER_APP_CLUSTER")}}',
      encrypted: true
    });
 
    var channel = pusher.subscribe('notify-channel');
    channel.bind('App\\Events\\Notify', function(data) {
        // let html = `<p>${data.message}</p> <br>`;
        // document.getElementsByClassName('notif').innerHtml = html;
        alert(data.message);
    });
  </script>
</body>