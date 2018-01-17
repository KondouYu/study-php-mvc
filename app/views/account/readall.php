<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Panel zarządzania kontami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/dashboard" class="btn btn-block btn-secondary btn-lg">Panel główny</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#dodajKonto" class="btn btn-block btn-secondary btn-lg">Dodaj konto</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-hover table-striped dT" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>LOGIN</th>
                                <th>TYP</th>
                                <th>AKTYWNE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($accountData as $row) {
                        ?>
                            <tr>
                                <td><?= $row['login'] ?></td>
                                <td><span class="badge badge-secondary"><?= $row['typNazwa'] ?></span></td>
                                <td><?= $row['aktywne'] ? 'TAK' : 'NIE' ?></td>
                                <td><a href="/account/delete/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć konto <?= $row['login'] ?>?');"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>