{{-- @if(request()->session()->has('user'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      var signupBtn = document.querySelector('#signupBtn');
      if (signupBtn) {
        signupBtn.style.display = 'none';
      }

      var loginBtn = document.querySelector('#loginBtn');
      if (loginBtn) {
        loginBtn.style.display = 'none';
      }

      document.getElementById('demo').innerHTML = "{{request()->session()->get('user')['name']}}";

      var profile = document.querySelector('#profile');
      if (profile) {        
        profile.style.display = "";        
        // profile.innerHTML = "{{request()->session()->get('user')['name']}}";
      }

      var logoutBtn = document.querySelector('#logoutBtn');
      if (logoutBtn) {
        logoutBtn.style.display = "";
      }
    });
  </script>
@endif --}}

<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="max-width:1600px; padding:0 40px;">
    <div class="navbar-header">
      <a class="navbar-brand" href="/" style="font-family: 'Berkshire Swash'; font-weight: bold; font-size: 30px;">collabora.</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('/toExplore')}}">Explore</a></li>
      @if(Session::has('user'))
        <li id="profile"><a style="color: #fff; font-weight: bold; text-transform: capitalize;"><span class="glyphicon glyphicon-user"></span> {{Session::get('user')['name']}}</a></li>
        <li id="logoutBtn"><a href="/logout" style="box-sizing: border-box; border: 5px white;"><span class="glyphicon glyphicon-log-in"></span></a></li>
      @else
        <li id="signupBtn"><a href="/#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li id="loginBtn"><a href="/login" style="box-sizing: border-box; border: 5px white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
    </ul>
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>



