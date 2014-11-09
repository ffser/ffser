<!--login-->
       
      <div role="form" class="form-signin">
        <h2 class="form-signin-heading">login</h2>
        <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
          <input type="email" name="username" id="username"  autofocus="" required="" placeholder="Email address" class="form-control">
        </div>
        <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
          <input type="password" id="passwd" name="passwd" required="" placeholder="Password" class="form-control">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">auto login
          </label>
        </div>
        <button type="submit" onclick="login.dologin();" class="btn btn-lg btn-primary btn-block">login</button>
      </div>

  
        <!--login-->
<script>
(function(){
var login={
	dologin:function(){
		var username=$('#username').val();
		var passwd=$('#passwd').val();
		$.post('/login',{'username':username,'passwd':passwd},function(data){
			if(data.error==0){
				location.href='/video';
			
			}else{
				alert(data.data);
			}

		},'json');	
	}

}
window.login=login;
})();
</script>
