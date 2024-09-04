<h1>Lista de Artigos</h1>
<a class="btn btn-primary" href="novo">Novo</a>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Categoria</th>
        <th scope="col">Data</th>
        <th scope="col">Autor</th>
        <th scope="col">Título</th>
        <th scope="col">Excluir</th>
        <th scope="col">Editar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($dados as $forum) {
        $data = date('d/m/Y', strtotime($forum['data']));
        echo "
        <tr>
            <th scope='row'>{$forum['id']}</th>
            <td>{$forum['categoria_descricao']}</td>
            <td>$data</td>
            <td>{$forum['autor']}</td>
            <td>{$forum['titulo']}</td>
            <td>
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal{$forum['id']}'>
                    Ver Descrição
                </button>
            </td>
            <td><a href='excluir/{$forum['id']}' class='btn btn-danger'>-</a></td>
            <td><a href='alterar/{$forum['id']}' class='btn btn-primary'>+</a></td>
        </tr>
        
        <!-- Modal -->
        <div class='modal fade' id='modal{$forum['id']}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='staticBackdropLabel'>{$forum['titulo']}</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        {$forum['descricao']}
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
    </tbody>
</table>
