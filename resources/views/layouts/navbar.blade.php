<nav class="navbar navbar-expand-lg navbar-dark bg-diamond shadow mb-5">
    <a class="navbar-brand" href="#">Petotum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ (request()->is('/')) ? 'active font-italic' : '' }}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{ (request()->is('settings')) ? 'active font-italic' : '' }}">
          <a class="nav-link" href="settings">Setting</a>
        </li>
      </ul>
    </div>
  </nav>