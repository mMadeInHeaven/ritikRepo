<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       #notification-toggle {
  position: fixed;
  top: 20px;
  left: 20px;
  z-index: 9999;
}

#notification-bar {
  background-color: #f8d7da;
  color: #721c24;
  padding: 10px;
  text-align: center;
  position: fixed;
  top: 20px;
  left: -200px;
  z-index: 9998;
  transition: left 0.3s ease-in-out;
}

#notification-bar.show {
  left: 20px;
}

#notification-text {
  display: inline-block;
  margin-right: 10px;
}

#notification-close {
  background-color: #dc3545;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

    </style>
</head>
<body>
<button id="notification-toggle">Show Notification</button>
<div id="notification-bar">
  <span id="notification-text">Important notification goes here.</span>
  <button id="notification-close">Close</button>
</div>

</body>
<script>
  document.getElementById('notification-toggle').addEventListener('click', function() {
  document.getElementById('notification-bar').classList.toggle('show');
});

document.getElementById('notification-close').addEventListener('click', function() {
  document.getElementById('notification-bar').classList.remove('show');
});


</script>
</html>
</html>