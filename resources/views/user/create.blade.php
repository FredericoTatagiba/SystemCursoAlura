<x-layout title="Novo Usuário">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmação de Senha:</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <button class="btn-primary mt-3">
            Registrar-se
        </button>
    </form>
</x-layout>