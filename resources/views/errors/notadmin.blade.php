<div class="container">
    <div class="content" style="display: flex;align-items:center;justify-content:center">
        <h1>This area is restricted for you.</h1>
    </div>
</div>

<li class="nav-item">
    <a href="{{route('logout')}}" class="nav-link">
      <i class="nav-icon far fa-circle text-info"></i>
      <p>Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </li>


<script>
    // Redirect after a few seconds
    setTimeout(function() {
        window.location.href = "{{ route('login') }}";
    }, 5000); // 5000 milliseconds = 5 seconds
</script>