<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Sprawa: <?= $caseData['nazwa'] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/cases" class="btn btn-block btn-secondary btn-lg">Sprawy</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#edytujSprawe" class="btn btn-block btn-secondary btn-lg">Edytuj sprawę</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Symbol</h4>
                        <p><span class="badge badge-warning"><?= $caseData['symbol'] ?></span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Nazwa</h4>
                        <p><?= $caseData['nazwa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Dziedzina</h4>
                        <p><?= $caseData['dziedzinaNazwa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Nazwa Instytucji</h4>
                        <p><?= $caseData['nazwaInstytucji'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Adres instytucji</h4>
                        <p><?= $caseData['adresInstytucji'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Klient</h4>
                        <h5><a href="/customers/read/<?= $caseData['klientID'] ?>" class="badge badge-info"><?= $caseData['klient'] ?></a></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Uwagi</h4>
                        <p><?= $caseData['uwagi'] ?></p>
                    </div>
                </div>

            </div>

            <div class="col-md-12 mt-50">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Czynności w sprawie:</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php
                        if ($balance >= 0) {
                        ?>
                        <span class="btn btn-success">Bilans: <?= $balance ?> PLN</span>
                        <?php
                        } else {
                        ?>
                        <span class="btn btn-danger">Bilans: <?= $balance ?> PLN</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-3 offset-md-6">
                    </div>
                </div>
                <table class="table table-striped table-hover mt-50" style="background-color: white;">
                    <thead>
                        <tr>
                            <th>Koszt</th>
                            <th>Symbol</th>
                            <th>Nazwa</th>
                            <th>Miejsce</th>
                            <th>Typ czynności</th>
                            <th>Data rozpoczęcia</th>
                            <th>Data zakończenia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($actionData as $row) {
                        ?>
                        <tr onclick="window.location.replace('/actions/read/<?= $row['id'] ?>');">
                            <td style="color: red;">-<?= $row['koszt'] ?> PLN</td>
                            <td><span class="badge badge-danger"><?= $row['symbol'] ?></span></td>
                            <td><?= $row['nazwa'] ?></td>
                            <td><?= $row['miejsce'] ?></td>
                            <td><?= $row['typCzynnosciNazwa'] ?></td>
                            <td><?= date_format(date_create($row['dataRozpoczecia']), 'd.m.Y') ?></td>
                            <td><?= date_format(date_create($row['dataZakonczenia']), 'd.m.Y') ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <table class="table table-hover table-striped" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>KWOTA</th>
                                <th>OPIS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($settlementData as $row) {
                        ?>
                            <tr>
                                <td style="color: green;"><?= $row['kwota'] ?> PLN</td>
                                <td><?= $row['opis'] ?></td>
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