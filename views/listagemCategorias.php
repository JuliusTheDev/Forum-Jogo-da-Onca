    <?php
        if ($mensagem != "") {
            echo " 
            <div class='alert alert-success' >
                $mensagem
            </div>                    
            ";
        }
    ?>

    <h1>Lista de Categorias</h1>
    <a class="btn btn-primary" href="novo">Novo</a>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Descrição</th>
        <th scope="col">Excluir</th>
        <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
                foreach ($dados as $categoria) {
                    echo "
                    <tr>
                        <th scope='row'>{$categoria['id']}</th>
                        <td>{$categoria['descricao']}</td>
                        <td><a href='excluir/{$categoria['id']}' class='btn btn-danger'>-</a></td>
                        <td><a href='alterar/{$categoria['id']}' class='btn btn-primary'>+</a></td>
                    </tr>";                          
                }
            ?>
            
    </tbody>
    </table>    
