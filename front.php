<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Himanshu-Login Form</title>
  <link rel="stylesheet" href="css/examine.css" media="screen" type="text/css" />
  <script src="js/script.js"></script>
  <!-- google api -->
  <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="766627401109-tl5bfq0e626chc3a87872ih57sfsidpg.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
   <!-- google api end-->
  <script language="JavaScript">
		  function validateForm() {
			var x = document.forms["myForm"]["Fname"].value;
			if (x == null || x == "") {
				alert("Entity Must Be Filled Out");
				return false;
			}
}
	function login_form()
	{	document.getElementById('login').style.display='block';
		document.getElementById('signup').style.display='none';
		}
	function signup_form()
	{	document.getElementById('signup').style.display='block';
		document.getElementById('login').style.display='none';
		}	
	window.onload=function(){
		document.getElementById('login').style.display='none';		
		document.getElementById('signup').style.display='none';
		}
	</script>
</head>
<body onload="process()">
	<br/><br/><br/><br/>
   <span class="button" id="toggle-login" onclick="signup_form()" style="margin-left:300px">Sign up</span>
   <span class="button" id="toggle-login" onclick="login_form()" style="margin-left:400px">Log in</span> 
   
		   <br/><br/><br><br/>
		   
		   <?php
			if(empty($_POST['signup']))
			{	?>
				<div id="login">
				   <h1>Log in</h1>
				  <form>
					<input type="email" placeholder="Email" />
					<input type="password" placeholder="Password" />
					<input type="submit" value="Log in" name="login" />
				  </form>
				</div>

				<div id="signup">
					<h1>Sign up</h1>
					<form  name="myForm" onsubmit="return validateForm()" method="post">
						<input type="text" placeholder="Fname" id="Fname" name="Fname" required/>
						<input type="text" placeholder="Sname" id="sname" name="sname" required/>
						<input type="text" placeholder="Address" id="address" name="address"required/>
						<input type="email" placeholder="E-mail" id="email" name="email" />
						<input type="password" placeholder="Password" required/>
						<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '913694802042207',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
		  <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log("Name: " + profile.getName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script>
						<h3 style="font-family:'Open Sans',sans-serif;font-weight:10;color:#3399cc;text-align:center;">OR</h3>
						<input type="submit" value="Sign up" name="signup"/>
					</form>
				</div>
				<?php
				}
			else
			{	echo 'Users Details are:<br/><br/>'. 
						'First name : '.$_POST['Fname'].'<br/>'.
						'Last name : '.$_POST['sname'].'<br/>'.
						'Address : '.$_POST['address'].'<br/>'.
						'Email : '.$_POST['email'].'<br/>';
					}
			?>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  <script src="js/index.js"></script>
</body>
</html>