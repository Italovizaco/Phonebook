<?php 
include_once("templates/header.php")
?>
    <div class="container" id="container-create-contact">
    <?php include_once("templates/backbtn.php");?>
        <h1 id="main-title">Criar contato</h1>
        <form action="<?= $BASE_URL ?>config/process.php" method="POST" id="create-form">
            <input type="hidden" name="type" value="crate">
            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do contato:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text" class="form-control" id="observations" name="observations" rows="3"> </textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-create-contact">Cadastrar</button>
        </form>
    </div>
<?php 
include_once("templates/footer.php")
?>