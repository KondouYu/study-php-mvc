<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Czynność: <?= $actionData['nazwa'] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/actions" class="btn btn-block btn-secondary btn-lg">Czynności</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#edytujCzynnosc" class="btn btn-block btn-secondary btn-lg">Edytuj czynność</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Symbol</h4>
                        <p><span class="badge badge-danger"><?= $actionData['symbol'] ?></span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Koszt</h4>
                        <p><?= $actionData['koszt'] ?> PLN</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Nazwa</h4>
                        <p><?= $actionData['nazwa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Typ czynności</h4>
                        <p><?= $actionData['typCzynnosciNazwa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Miejsce</h4>
                        <p><?= $actionData['miejsce'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Podtyp czynności</h4>
                        <p><?= $actionData['podtypCzynnosciNazwa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Data rozpoczęcia</h4>
                        <h3><span class="badge badge-secondary"><?= date_format(date_create($actionData['dataRozpoczecia']), 'H:i, d.m.Y') ?></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Data zakończenia</h4>
                        <h3><span class="badge badge-secondary"><?= date_format(date_create($actionData['dataZakonczenia']), 'H:i, d.m.Y') ?></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Sprawa</h4>
                        <p><?= $actionData['sprawa'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Opis</h4>
                        <p><?= $actionData['opis'] ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>