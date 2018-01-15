<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Klient: <?= $customerData['imie'].' '.$customerData['nazwisko'] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/customers" class="btn btn-block btn-secondary btn-lg">Klienci</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#edytujKlienta" class="btn btn-block btn-secondary btn-lg">Edytuj klienta</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Symbol</h4>
                        <p><span class="badge badge-info"><?= $customerData['symbol'] ?></span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Pesel</h4>
                        <p><?= $customerData['pesel'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Imię</h4>
                        <p><?= $customerData['imie'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Adres email</h4>
                        <p><?= $customerData['email'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Nazwisko</h4>
                        <p><?= $customerData['nazwisko'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Numer umowy</h4>
                        <p><?= $customerData['nrUmowy'] ?></p>
                    </div>
                </div>

                <div class="col-md-12 mt-50">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Sprawy klienta:</h3>
                        </div>
                        <div class="col-md-3 offset-md-6">
                        <a href="#" data-toggle="modal" data-target="#addCustomerCase" class="btn btn-block btn-secondary btn-lg">Połącz klienta ze sprawą</a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-50" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Nazwa</th>
                                <th>Dziedzina</th>
                                <th>Nazwa instytucji</th>
                                <th>Adres instytucji</th>
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