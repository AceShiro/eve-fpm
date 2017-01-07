<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Daerie Technologies | FPM v0.1</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-top-links navbar-right" style="margin-right: 20px;">
        <li><a>{{ $request->session()->get('name') }}</a></li>
        <li><img src={{ $request->session()->get('avatar') }} style="width: 35px; height: 35px; border-radius: 30px;"></li>
        
      </ul>