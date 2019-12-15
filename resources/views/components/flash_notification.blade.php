@if (session()->has('flash_notification'))
    <script>
        let flash_notification = {};
        @foreach (session('flash_notification') as $key => $value)
            flash_notification.{{ $key }} = "{{ $value }}";
        @endforeach
        Swal.fire(flash_notification)
    </script>
@endif
