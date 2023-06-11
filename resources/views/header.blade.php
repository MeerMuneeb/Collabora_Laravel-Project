<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="max-width:1600px; padding:0 40px;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-family: 'Berkshire Swash'; font-weight: bold; font-size: 30px;">collabora.</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('/toExplore')}}">Explore</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" style="box-sizing: border-box; border: 5px white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
