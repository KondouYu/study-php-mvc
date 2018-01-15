<div class="container">
    <div class="row mt-150">
        <div class="col-md-12">
            <h1 class="text-center">Panel zarządzania klientami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <a href="/dashboard" class="btn btn-block btn-secondary btn-lg">Panel główny</a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="#" data-toggle="modal" data-target="#dodajKlienta" class="btn btn-block btn-secondary btn-lg">Dodaj klienta</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-hover table-striped dT" style="background-color: white;">
                        <thead>
                            <tr>
                                <th>SYMBOL</th>
                                <th>IMIĘ</th>
                                <th>NAZWISKO</th>
                                <th>PESEL</th>
                                <th>EMAIL</th>
                                <th>NR UMOWY</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data as $row) {
                        ?>
                            <tr onclick="window.location.replace('/customers/read/<?= $row['id'] ?>');">
                                <td><span class="badge badge-info"><?= $row['symbol'] ?></span></td>
                                <td><?= $row['imie'] ?></td>
                                <td><?= $row['nazwisko'] ?></td>
                                <td><?= $row['pesel'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['nrUmowy'] ?></td>
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