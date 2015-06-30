
<body class="login">
    <div class="login-box main-content">
      <header>
          <ul class="action-buttons clearfix fr">
              <li><a href="#" class="button button-gray">Register</a></li>
              <li><a href="#" class="button button-gray"><span class="help"></span>Forgot Password</a></li>
          </ul>
          <h2>NeueAdmin II Login</h2>
      </header>
    	<section>
    		<div class="message notice">Enter any letter and press Login</div>
    		<form id="form"  method="post" class="clearfix">
			<p>
				<input type="text" id="username"  class="large" value="" name="username" required="required" placeholder="Username" />
                        <input type="password" id="password" class="large" value="" name="password" required="required" placeholder="Password" />
                        <button class="large button button-gray fr" type="submit">Login</button>
			</p>
			<p class="clearfix">
				<span class="fl">
					<input type="checkbox" id="remember" class="" value="1" name="remember"/>
					<label class="choice" for="remember">Keep me logged-in for two weeks</label>
				</span>
			</p>
		</form>
    	