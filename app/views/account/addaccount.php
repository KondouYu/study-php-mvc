<!-- Dodaj czynność -->
<div class="modal fade" id="dodajKonto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Dodaj konto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addAccountForm" action="/account" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="typ">Typ konta</label>
                <select name="typ" id="typ" class="form-control">
                <?php
                foreach ($accountType as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="text" class="form-control" id="password" name="password" required />
            </div>
            <div class="form-group">
                <input type="checkbox" id="aktywne" name="aktywne" value="1" />
                <label for="aktywne"> Zaznacz jeśli konto ma być aktywne, posiadać możliwość zalogowania.</label>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addAccountButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>