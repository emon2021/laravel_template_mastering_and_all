<div class="container">
    <div class="content" style="display: flex;align-items:center;justify-content:center">
        <h1>This area is restricted for you.</h1>
    </div>
</div>

<script>
    // Redirect after a few seconds
    setTimeout(function() {
        window.location.href = "{{ route('login') }}";
    }, 5000); // 5000 milliseconds = 5 seconds
</script>