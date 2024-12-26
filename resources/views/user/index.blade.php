<x-layout title="Login">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <span class="d-flex">
            <button class="btn-primary mt-3">
                Entrar
            </button>

            <a href="{{ route("user.create") }}" class="btn btn-secondary mt-3 ms-2">
                Registrar-se
            </a>
        </span>
    </form>
</x-layout>