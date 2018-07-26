<ul class="nav nav-sidebar">
  <li class="{{ request()->is('task') ? 'active' : '' }}"><a href="{{route('task.index')}}">Overview <span class="sr-only">(current)</span></a></li>
  <li class="{{ request()->is('category') ? 'active' : '' }}"><a href="{{route('category.index')}}">Category</a></li>
  <li class="{{ request()->is('chart') ? 'active' : '' }}"><a href="{{route('chart.index')}}">Charts</a></li>
  <li class="{{ request()->is('report') ? 'active' : '' }} disabled"><a href="#">Reports</a></li>
</ul>