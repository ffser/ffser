       <!--reg-->
       

      <div role="form"  class="form-signin">
        <h2 class="form-signin-heading">reg</h2>
        <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
          <input type="text" id="username" name="username" autofocus="" required="" placeholder="Email or account" class="form-control">
        </div>
         <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
          <input type="password" id="passwd" name="passwd" required="" placeholder="Password" class="form-control">
        </div>
        <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
           <input type="password" id="repasswd" name="repasswd" required="" placeholder="Password again" class="form-control">
        </div>
        <div class="form-group has-warning">
          <label class="control-label" for="inputSuccess1">Input with success</label>
          <input type="text" id="code" name="code"  autofocus="" required="" placeholder="code" class="form-control">
        </div>
        

        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">agree
          </label>
        </div>
        <button type="submit" onclick="register.doreg();" class="btn btn-lg btn-primary btn-block">register</button>
      </div>

        <!--reg-->
<script>
(function(){
var register={
        doreg:function(){
                var username=$('#username').val();
                var passwd=$('#passwd').val();
		var repasswd=$('#repasswd').val();
		var code=$('#code').val();
                $.post('/reg',{'username':username,'passwd':passwd,'repasswd':repasswd,'code':code},function(data){
                        if(data.error==0){
                                location.href='/login';
                        
                        }else{
                                alert(data.data);
                        }

                },'json');      
        }

}
window.register=register;
})();
</script>
