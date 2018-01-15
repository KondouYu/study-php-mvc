<!-- Połącz klienta ze sprawą -->
<div class="modal fade" id="addCustomerCase">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Połącz klienta ze sprawą</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addCustomerCaseForm" action="/customers/read/<?= $customerData['id'] ?>" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="sprawa">Wybierz sprawę</label>
                <select name="sprawa" id="sprawa" class="form-control">
                <?php
                foreach ($caseList as $row) {
                ?>
                    <option value="<?= $row['id'] ?>">[<?= $row['symbol'] ?>] <?= $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addCustomerCaseButton" value="Połącz" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>