<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Panel zarządzania czynnościami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/dashboard" class="btn btn-block btn-secondary btn-lg">Panel główny</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#dodajCzynnosc" class="btn btn-block btn-secondary btn-lg">Dodaj czynność</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-hover table-striped dT" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>KOSZT</th>
                                <th>SYMBOL</th>
                                <th>NAZWA</th>
                                <th>MIEJSCE</th>
                                <th>TYP CZYNNOŚCI</th>
                                <th>DATA ROZPOCZĘCIA</th>
                                <th>DATA ZAKOŃCZENIA</th>
                                <th>SPRAWA</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($actionData as $row) {
                        ?>
                            <tr onclick="window.location.replace('/actions/read/<?= $row['id'] ?>');">
                                <td><?= $row['koszt'] ?></td>
                                <td><span class="badge badge-danger"><?= $row['symbol'] ?></span></td>
                                <td><?= $row['nazwa'] ?></td>
                                <td><?= $row['miejsce'] ?></td>
                                <td><?= $row['typCzynnosciNazwa'] ?></td>
                                <td><?= date_format(date_create($row['dataRozpoczecia']), 'd.m.Y') ?></td>
                                <td><?= date_format(date_create($row['dataZakonczenia']), 'd.m.Y') ?></td>
                                <td><?= $row['sprawa'] ?></td>
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