<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Panel zarządzania rozliczeniami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/dashboard" class="btn btn-block btn-secondary btn-lg">Panel główny</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="/settlements/print" class="btn btn-block btn-secondary btn-lg">Drukuj</a>
                    <a href="#" data-toggle="modal" data-target="#dodajRozliczenie" class="btn btn-block btn-secondary btn-lg">Dodaj rozliczenie</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-hover table-striped dT" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>SPRAWA</th>
                                <th>KWOTA</th>
                                <th>OPIS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($settlementData as $row) {
                        ?>
                            <tr>
                                <td><span class="badge badge-warning"><?= $row['sprawa'] ?></span></td>
                                <td><?= $row['kwota'] ?> PLN</td>
                                <td><?= $row['opis'] ?></td>
                                <td><a href="/settlements/delete/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć rozliczenie?');"><i class="fa fa-trash-o"></i></a></td>
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