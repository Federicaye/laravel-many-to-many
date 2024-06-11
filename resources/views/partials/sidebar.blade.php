<div>
<ul class="nav flex-column">
<li class="nav-item">
    <a class="nav-link active" {{Route::currentRouteName() == 'home' ? 'active' : ''}} href="{{route('home')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}} href="{{route('admin.dashboard')}}">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" {{Route::currentRouteName() == 'admin.projects.index' ? 'active' : ''}} href="{{route('admin.projects.index')}}">Projects</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Technologies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul>
</div>