<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Panel zarządzania sprawami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/dashboard" class="btn btn-block btn-secondary btn-lg">Panel główny</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#dodajSprawe" class="btn btn-block btn-secondary btn-lg">Dodaj sprawę</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-hover table-striped dT" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>SYMBOL</th>
                                <th>NAZWA</th>
                                <th>DZIEDZINA</th>
                                <th>NAZWA INSTYTUCJI</th>
                                <th>ADRES INSTYTUCJI</th>
                                <th>KLIENT</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($caseData as $row) {
                        ?>
                            <tr onclick="window.location.replace('/cases/read/<?= $row['id'] ?>');">
                                <td><span class="badge badge-warning"><?= $row['symbol'] ?></span></td>
                                <td><?= $row['nazwa'] ?></td>
                                <td><?= $row['dziedzinaNazwa'] ?></td>
                                <td><?= $row['nazwaInstytucji'] ?></td>
                                <td><?= $row['adresInstytucji'] ?></td>
                                <td><?= $row['klient'] ?></td>
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