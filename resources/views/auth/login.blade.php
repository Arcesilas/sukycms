<form action="{{ route('auth.login') }}" method="POST">
    @csrf

    <input type="email" placeholder="Email..." name="email">

    <input type="password" placeholder="Password..." name="password">

    <button type="submit">Login</button>

</form>
