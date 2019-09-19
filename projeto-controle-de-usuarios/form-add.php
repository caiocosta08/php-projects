<form method="POST" action="add.php">
    <label>Nome: </label><br/>
    <input type="text" name="nome" id="nome" /><br/><br/>
    <label>E-mail: </label><br/>
    <input type="text" name="email" id="email" /><br/><br/>
    <label>Senha: </label><br/>
    <input type="password" name="senha" id="senha" /><br/><br/>
    <label>Data de Nascimento: </label><br/>
    <input type="date" name="data_nascimento" id="data_nascimento" /><br/><br/>
    <select id="faixa_salarial" name="faixa_salarial">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>
    <input type="submit" value="Cadastrar" />
</form>